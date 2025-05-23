<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Transactions Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Payers
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Payees
 *
 * @method \App\Model\Entity\Transaction newEmptyEntity()
 * @method \App\Model\Entity\Transaction newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Transaction> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Transaction get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Transaction findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Transaction patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Transaction> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Transaction|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Transaction saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Transaction>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Transaction>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Transaction>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Transaction> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Transaction>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Transaction>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Transaction>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Transaction> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class TransactionsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('transactions');
        $this->setDisplayField('status');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Payers', [
            'foreignKey' => 'payer_id',
            'className' => 'Users',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Payees', [
            'foreignKey' => 'payee_id',
            'className' => 'Users',
            'joinType' => 'INNER',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->uuid('payer_id')
            ->notEmptyString('payer_id');

        $validator
            ->uuid('payee_id')
            ->notEmptyString('payee_id');

        $validator
            ->decimal('amount')
            ->requirePresence('amount', 'create')
            ->notEmptyString('amount');

        $validator
            ->scalar('status')
            ->maxLength('status', 20)
            ->notEmptyString('status');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['payer_id'], 'Payers'), ['errorField' => 'payer_id']);
        $rules->add($rules->existsIn(['payee_id'], 'Payees'), ['errorField' => 'payee_id']);

        return $rules;
    }
}
