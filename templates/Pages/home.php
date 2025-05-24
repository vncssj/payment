<div class="content">
    <h2>Realizar Transferência</h1>
        <?= $this->Form->create($transaction, ['url' => ['controller' => 'Users', 'action' => 'transfer']]) ?>
        <fieldset>
            <?php
            echo $this->Form->control('payee_id', ['options' => $payees, 'label' => 'Beneficiário']);
            echo $this->Form->control('amount', ['label' => 'Valor', 'type' => 'number', 'min' => '0.1']);
            ?>
        </fieldset>
        <?= $this->Form->button(__('Transferir')) ?>
        <?= $this->Form->end() ?>
</div>
<div class="content" style="margin-top: 3rem;">
    <h2>Extrato pessoal</h1>
        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th><?= $this->Paginator->sort('id') ?></th>
                        <th><?= $this->Paginator->sort('payer_id') ?></th>
                        <th><?= $this->Paginator->sort('payee_id') ?></th>
                        <th><?= $this->Paginator->sort('amount') ?></th>
                        <th><?= $this->Paginator->sort('status') ?></th>
                        <th><?= $this->Paginator->sort('created') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($transactions as $transaction): ?>
                        <tr>
                            <td><?= h($transaction->id) ?></td>
                            <td><?= $transaction->hasValue('payer') ? $this->Html->link($transaction->payer->name, ['controller' => 'Users', 'action' => 'view', $transaction->payer->id]) : '' ?></td>
                            <td><?= $transaction->hasValue('payee') ? $this->Html->link($transaction->payee->name, ['controller' => 'Users', 'action' => 'view', $transaction->payee->id]) : '' ?></td>
                            <td><?= $this->Number->format($transaction->amount) ?></td>
                            <td><?= h($transaction->status) ?></td>
                            <td><?= h($transaction->created) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="paginator">
            <ul class="pagination">
                <?= $this->Paginator->first('<< ' . __('first')) ?>
                <?= $this->Paginator->prev('< ' . __('previous')) ?>
                <?= $this->Paginator->numbers() ?>
                <?= $this->Paginator->next(__('next') . ' >') ?>
                <?= $this->Paginator->last(__('last') . ' >>') ?>
            </ul>
            <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
        </div>
</div>