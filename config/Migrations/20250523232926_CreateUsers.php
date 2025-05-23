<?php
declare(strict_types=1);

use Migrations\BaseMigration;

class CreateUsers extends BaseMigration
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
        $table = $this->table('users', ['id' => false, 'primary_key' => 'id']);
        $table
            ->addColumn('id', 'uuid')
            ->addColumn('name', 'string', ['limit' => 255, 'null' => false])
            ->addColumn('email', 'string', ['limit' => 255, 'null' => false])
            ->addColumn('document', 'string', ['limit' => 20, 'null' => false])
            ->addColumn('type', 'enum', [
                'values' => ['common', 'shopkeeper'],
                'null' => false
            ])
            ->addColumn('password', 'string', ['limit' => 255, 'null' => false])
            ->addColumn('balance', 'decimal', [
                'precision' => 15,
                'scale' => 2,
                'default' => 0,
                'null' => false
            ])
            ->addTimestamps()
            ->addIndex(['email'], ['unique' => true])
            ->addIndex(['document'], ['unique' => true])
            ->create();
    }
}
