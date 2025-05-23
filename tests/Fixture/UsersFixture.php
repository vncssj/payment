<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UsersFixture
 */
class UsersFixture extends TestFixture
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
                'id' => '2a5979de-301c-4044-aefb-9e0fd8e0ec2d',
                'name' => 'Lorem ipsum dolor sit amet',
                'email' => 'Lorem ipsum dolor sit amet',
                'document' => 'Lorem ipsum dolor ',
                'type' => 'Lorem ipsum dolor sit amet',
                'password' => 'Lorem ipsum dolor sit amet',
                'balance' => 1.5,
                'created' => 1748043724,
                'updated' => 1748043724,
            ],
        ];
        parent::init();
    }
}
