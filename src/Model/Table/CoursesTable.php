<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Courses Model
 *
 * @property \App\Model\Table\BranchesTable&\Cake\ORM\Association\BelongsTo $Branches
 * @property \App\Model\Table\ContactsTable&\Cake\ORM\Association\HasMany $Contacts
 *
 * @method \App\Model\Entity\Course newEmptyEntity()
 * @method \App\Model\Entity\Course newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Course[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Course get($primaryKey, $options = [])
 * @method \App\Model\Entity\Course findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Course patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Course[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Course|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Course saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Course[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Course[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Course[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Course[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CoursesTable extends Table
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

        $this->setTable('courses');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Branches', [
            'foreignKey' => 'branch_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Contacts', [
            'foreignKey' => 'course_id',
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
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('title')
            ->maxLength('title', 45)
            ->requirePresence('title', 'create')
            ->notEmptyString('title');

        $validator
            ->scalar('short_description')
            ->maxLength('short_description', 150)
            ->requirePresence('short_description', 'create')
            ->notEmptyString('short_description');

        $validator
            ->scalar('long_description')
            ->requirePresence('long_description', 'create')
            ->notEmptyString('long_description');

        $validator
            ->scalar('category')
            ->maxLength('category', 3)
            ->requirePresence('category', 'create')
            ->notEmptyString('category');

        $validator
            ->scalar('type')
            ->maxLength('type', 45)
            ->requirePresence('type', 'create')
            ->notEmptyString('type');

        $validator
            ->scalar('schedule')
            ->maxLength('schedule', 100)
            ->requirePresence('schedule', 'create')
            ->notEmptyString('schedule');

        $validator
            ->scalar('medical_exam')
            ->maxLength('medical_exam', 150)
            ->requirePresence('medical_exam', 'create')
            ->notEmptyString('medical_exam');

        $validator
            ->scalar('requirements')
            ->requirePresence('requirements', 'create')
            ->notEmptyString('requirements');

        $validator
            ->integer('price')
            ->allowEmptyString('price');

        $validator
            ->scalar('image')
            ->maxLength('image', 255)
            ->allowEmptyFile('image');

        $validator
            ->scalar('image_dir')
            ->maxLength('image_dir', 255)
            ->allowEmptyFile('image_dir');

        $validator
            ->scalar('image_size')
            ->maxLength('image_size', 45)
            ->allowEmptyFile('image_size');

        $validator
            ->scalar('image_type')
            ->maxLength('image_type', 45)
            ->allowEmptyFile('image_type');

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
        $rules->add($rules->existsIn(['branch_id'], 'Branches'));

        return $rules;
    }
}
