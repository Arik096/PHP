<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SubmissionCategories Model
 *
 * @property \App\Model\Table\SubmissionCategoriesTable&\Cake\ORM\Association\BelongsTo $ParentSubmissionCategories
 * @property \App\Model\Table\ModelTypesTable&\Cake\ORM\Association\BelongsTo $ModelTypes
 * @property \App\Model\Table\StatusesTable&\Cake\ORM\Association\BelongsTo $Statuses
 * @property \App\Model\Table\SubmissionCategoriesTable&\Cake\ORM\Association\HasMany $ChildSubmissionCategories
 * @property \App\Model\Table\SubmissionsTable&\Cake\ORM\Association\HasMany $Submissions
 *
 * @method \App\Model\Entity\SubmissionCategory newEmptyEntity()
 * @method \App\Model\Entity\SubmissionCategory newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\SubmissionCategory[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SubmissionCategory get($primaryKey, $options = [])
 * @method \App\Model\Entity\SubmissionCategory findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\SubmissionCategory patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SubmissionCategory[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\SubmissionCategory|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SubmissionCategory saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SubmissionCategory[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\SubmissionCategory[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\SubmissionCategory[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\SubmissionCategory[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SubmissionCategoriesTable extends Table
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

        $this->setTable('submission_categories');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('ParentSubmissionCategories', [
            'className' => 'SubmissionCategories',
            'foreignKey' => 'parent_id',
        ]);
        $this->belongsTo('ModelTypes', [
            'foreignKey' => 'model_type_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Statuses', [
            'foreignKey' => 'status_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('ChildSubmissionCategories', [
            'className' => 'SubmissionCategories',
            'foreignKey' => 'parent_id',
        ]);
        $this->hasMany('Submissions', [
            'foreignKey' => 'submission_category_id',
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
            ->scalar('code')
            ->maxLength('code', 255)
            ->requirePresence('code', 'create')
            ->notEmptyString('code');

        $validator
            ->scalar('title')
            ->maxLength('title', 255)
            ->requirePresence('title', 'create')
            ->notEmptyString('title');

        $validator
            ->scalar('description')
            ->allowEmptyString('description');

        $validator
            ->boolean('approved_yn')
            ->notEmptyString('approved_yn');

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
        $rules->add($rules->existsIn(['parent_id'], 'ParentSubmissionCategories'));
        $rules->add($rules->existsIn(['model_type_id'], 'ModelTypes'));
        $rules->add($rules->existsIn(['status_id'], 'Statuses'));

        return $rules;
    }
}
