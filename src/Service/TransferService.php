<?php
// src/Service/TransferService.php
namespace App\Service;

use App\Dto\TransferDto;
use Cake\ORM\Locator\LocatorAwareTrait;
use Cake\Datasource\Exception\RollbackException;
use Cake\Datasource\ConnectionManager;
use Cake\Http\Exception\BadRequestException;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\InternalErrorException;
use Cake\Http\Client;

class TransferService
{
    use LocatorAwareTrait;

    public function execute(TransferDto $dto): void
    {
        $Users = $this->getTableLocator()->get('Users');
        $Transactions = $this->getTableLocator()->get('Transactions');

        $payer = $Users->get($dto->payerId);
        $payee = $Users->get($dto->payeeId);

        if ($payer->type !== 'common') {
            throw new ForbiddenException('Lojistas não podem enviar dinheiro.');
        }

        if ($payer->balance < $dto->amount) {
            throw new BadRequestException('Saldo insuficiente.');
        }

        // Validação externa (mock)
        $http = new Client();
        $response = $http->get('https://util.devi.tools/api/v2/authorize');
        if (!$response->getJson()['data']['authorization']) {
            throw new BadRequestException('Transferência não autorizada.');
        }


        // Transação
        $connection = ConnectionManager::get('default');
        $connection->begin();

        try {
            $payer->balance -= $dto->amount;
            $payee->balance += $dto->amount;

            if (!$Users->saveMany([$payer, $payee])) {
                throw new RollbackException('Erro ao atualizar saldos.');
            }

            $transaction = $Transactions->newEntity([
                'payer_id' => $dto->payerId,
                'payee_id' => $dto->payeeId,
                'amount' => $dto->amount,
            ]);

            if (!$Transactions->save($transaction)) {
                throw new RollbackException('Erro ao salvar transação.');
            }

            $connection->commit();

            // Mock de notificação
            $notify = $http->post('https://util.devi.tools/api/v1/notify');
            // caso haja previsibilidade de indisponibilidade pode-se implementar um sistema de fila de processamentos,
            // para que quando o serviço retorne as notificações sejam enviadas
        } catch (\Throwable $e) {
            $connection->rollback();
            throw new InternalErrorException('Transferência falhou: ' . $e->getMessage());
        }
    }
}
