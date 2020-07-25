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
        $this->addBehavior('File', [
            'image' => [
                'file' => 'image',
                'file_dir' => 'image_dir',
                'file_type' => 'image_type'
            ],
            'schedule' => [
                'file' => 'schedule',
                'file_dir' => 'schedule_dir',
                'file_type' => 'schedule_type'
            ],
            'curriculum' => [
                'file' => 'curriculum',
                'file_dir' => 'curriculum_dir',
                'file_type' => 'curriculum_type'
            ]
        ]);

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
            ->scalar('profile')
            ->requirePresence('profile', 'create')
            ->notEmptyString('profile');

        $validator
            ->scalar('category')
            ->maxLength('category', 3)
            ->requirePresence('category', 'create')
            ->notEmptyString('category');

        $validator
            ->requirePresence('schedule', 'create')
            ->notEmptyFile('schedule');

        $validator
            ->maxLength('schedule_dir', 255)
            ->allowEmptyString('schedule_dir');

        $validator
            ->maxLength('schedule_size', 45)
            ->allowEmptyString('schedule_size');

        $validator
            ->maxLength('schedule_type', 45)
            ->allowEmptyString('schedule_type');

        $validator
            ->scalar('requirements')
            ->requirePresence('requirements', 'create')
            ->notEmptyString('requirements');

        $validator
            ->requirePresence('image', 'create')
            ->notEmptyFile('image');

        $validator
            ->maxLength('image_dir', 255)
            ->allowEmptyString('image_dir');

        $validator
            ->maxLength('image_size', 45)
            ->allowEmptyString('image_size');

        $validator
            ->maxLength('image_type', 45)
            ->allowEmptyString('image_type');

        $validator
            ->integer('practical_time')
            ->maxLength('practical_time', 3)
            ->notEmptyString('practical_time');

        $validator
            ->integer('theoretical_time')
            ->maxLength('theoretical_time', 3)
            ->notEmptyString('theoretical_time');

        $validator
            ->integer('workshop_time')
            ->maxLength('workshop_time', 3)
            ->notEmptyString('workshop_time');

        $validator
            ->requirePresence('curriculum', 'create')
            ->notEmptyFile('curriculum');

        $validator
            ->maxLength('curriculum_dir', 255)
            ->allowEmptyString('curriculum_dir');

        $validator
            ->maxLength('curriculum_size', 45)
            ->allowEmptyString('curriculum_size');

        $validator
            ->maxLength('curriculum_type', 45)
            ->allowEmptyString('curriculum_type');

        $validator
            ->scalar('curriculum_content')
            ->requirePresence('curriculum_content', 'create')
            ->notEmptyString('curriculum_content');

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
