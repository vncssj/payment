<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TransactionsFixture
 */
class TransactionsFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 'c8556798-5fa7-4aca-ba45-52d1853b28bb',
                'payer_id' => '5a73339b-7440-45e8-b1e9-2e2eba22a011',
                'payee_id' => '0d3c376e-40a7-41ac-afaf-f2dfcccdcf6b',
                'amount' => 1.5,
                'status' => 'Lorem ipsum dolor ',
                'created' => '2025-05-23 23:42:10',
            ],
        ];
        parent::init();
    }
}
