<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Scales Model
 *
 * @property \App\Model\Table\ModelTypesTable&\Cake\ORM\Association\BelongsTo $ModelTypes
 * @property \App\Model\Table\SubmissionsTable&\Cake\ORM\Association\HasMany $Submissions
 *
 * @method \App\Model\Entity\Scale newEmptyEntity()
 * @method \App\Model\Entity\Scale newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Scale[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Scale get($primaryKey, $options = [])
 * @method \App\Model\Entity\Scale findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Scale patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Scale[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Scale|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Scale saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Scale[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Scale[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Scale[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Scale[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ScalesTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('scales');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('ModelTypes', [
            'foreignKey' => 'model_type_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Submissions', [
            'foreignKey' => 'scale_id',
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
            ->nonNegativeInteger('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('scale')
            ->maxLength('scale', 10)
            ->requirePresence('scale', 'create')
            ->notEmptyString('scale');

        $validator
            ->boolean('approved_yn')
            ->notEmptyString('approved_yn');

        $validator
            ->allowEmptyString('sort_order');

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
        $rules->add($rules->existsIn(['model_type_id'], 'ModelTypes'));

        return $rules;
    }
}
