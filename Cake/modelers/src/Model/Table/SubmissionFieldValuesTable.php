<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SubmissionFieldValues Model
 *
 * @property \App\Model\Table\SubmissionsTable&\Cake\ORM\Association\BelongsTo $Submissions
 * @property \App\Model\Table\SubmissionFieldsTable&\Cake\ORM\Association\BelongsTo $SubmissionFields
 *
 * @method \App\Model\Entity\SubmissionFieldValue newEmptyEntity()
 * @method \App\Model\Entity\SubmissionFieldValue newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\SubmissionFieldValue[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SubmissionFieldValue get($primaryKey, $options = [])
 * @method \App\Model\Entity\SubmissionFieldValue findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\SubmissionFieldValue patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SubmissionFieldValue[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\SubmissionFieldValue|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SubmissionFieldValue saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SubmissionFieldValue[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\SubmissionFieldValue[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\SubmissionFieldValue[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\SubmissionFieldValue[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SubmissionFieldValuesTable extends Table
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

        $this->setTable('submission_field_values');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Submissions', [
            'foreignKey' => 'submission_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('SubmissionFields', [
            'foreignKey' => 'submission_field_id',
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
            ->nonNegativeInteger('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('value')
            ->requirePresence('value', 'create')
            ->notEmptyString('value');

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
        $rules->add($rules->existsIn(['submission_id'], 'Submissions'));
        $rules->add($rules->existsIn(['submission_field_id'], 'SubmissionFields'));

        return $rules;
    }
}
