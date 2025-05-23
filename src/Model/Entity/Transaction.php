<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Transaction Entity
 *
 * @property string $id
 * @property string $payer_id
 * @property string $payee_id
 * @property string $amount
 * @property string $status
 * @property \Cake\I18n\DateTime $created
 *
 * @property \App\Model\Entity\User $payer
 * @property \App\Model\Entity\User $payee
 */
class Transaction extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'payer_id' => true,
        'payee_id' => true,
        'amount' => true,
        'status' => true,
        'created' => true,
        'payer' => true,
        'payee' => true,
    ];
}
