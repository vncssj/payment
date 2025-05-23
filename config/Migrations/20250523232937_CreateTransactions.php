<?php
declare(strict_types=1);

use Migrations\BaseMigration;

class CreateTransactions extends BaseMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/migrations/4/en/migrations.html#the-change-method
     * @return void
     */
    public function change(): void
    {
        $table = $this->table('transactions', ['id' => false, 'primary_key' => 'id']);

        $table
            ->addColumn('id', 'uuid')
            ->addColumn('payer_id', 'uuid', ['null' => false])
            ->addColumn('payee_id', 'uuid', ['null' => false])
            ->addColumn('amount', 'decimal', [
                'precision' => 15,
                'scale' => 2,
                'null' => false
            ])
            ->addColumn('status', 'string', ['limit' => 20, 'default' => 'pending'])
            ->addColumn('created', 'datetime', ['default' => 'CURRENT_TIMESTAMP'])
            ->addForeignKey('payer_id', 'users', 'id', [
                'delete'=> 'CASCADE',
                'update'=> 'NO_ACTION'
            ])
            ->addForeignKey('payee_id', 'users', 'id', [
                'delete'=> 'CASCADE',
                'update'=> 'NO_ACTION'
            ])
            ->create();
    }
}
