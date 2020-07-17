<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SubmissionFields Model
 *
 * @property \App\Model\Table\ModelTypesTable&\Cake\ORM\Association\BelongsTo $ModelTypes
 * @property \App\Model\Table\StatusesTable&\Cake\ORM\Association\BelongsTo $Statuses
 * @property \App\Model\Table\SubmissionFieldValuesTable&\Cake\ORM\Association\HasMany $SubmissionFieldValues
 *
 * @method \App\Model\Entity\SubmissionField newEmptyEntity()
 * @method \App\Model\Entity\SubmissionField newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\SubmissionField[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SubmissionField get($primaryKey, $options = [])
 * @method \App\Model\Entity\SubmissionField findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\SubmissionField patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SubmissionField[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\SubmissionField|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SubmissionField saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SubmissionField[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\SubmissionField[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\SubmissionField[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\SubmissionField[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SubmissionFieldsTable extends Table
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

        $this->setTable('submission_fields');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('ModelTypes', [
            'foreignKey' => 'model_type_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Statuses', [
            'foreignKey' => 'status_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('SubmissionFieldValues', [
            'foreignKey' => 'submission_field_id',
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
            ->scalar('field_name')
            ->maxLength('field_name', 255)
            ->requirePresence('field_name', 'create')
            ->notEmptyString('field_name');

        $validator
            ->scalar('label')
            ->requirePresence('label', 'create')
            ->notEmptyString('label');

        $validator
            ->scalar('element_type')
            ->maxLength('element_type', 255)
            ->requirePresence('element_type', 'create')
            ->notEmptyString('element_type');

        $validator
            ->scalar('enum_options')
            ->allowEmptyString('enum_options');

        $validator
            ->boolean('required_yn')
            ->notEmptyString('required_yn');

        $validator
            ->boolean('admin_yn')
            ->notEmptyString('admin_yn');

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
        $rules->add($rules->existsIn(['status_id'], 'Statuses'));

        return $rules;
    }
}
