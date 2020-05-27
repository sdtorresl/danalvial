<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Branches Model
 *
 * @property \App\Model\Table\ContactsTable&\Cake\ORM\Association\HasMany $Contacts
 * @property \App\Model\Table\CoursesTable&\Cake\ORM\Association\HasMany $Courses
 * @property \App\Model\Table\TestsTable&\Cake\ORM\Association\HasMany $Tests
 *
 * @method \App\Model\Entity\Branch newEmptyEntity()
 * @method \App\Model\Entity\Branch newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Branch[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Branch get($primaryKey, $options = [])
 * @method \App\Model\Entity\Branch findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Branch patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Branch[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Branch|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Branch saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Branch[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Branch[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Branch[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Branch[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class BranchesTable extends Table
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

        $this->setTable('branches');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('File', [
            'image' => [
                'file' => 'image',
                'file_dir' => 'image_dir',
                'file_type' => 'image_type'
            ]
        ]);

        $this->hasMany('Contacts', [
            'foreignKey' => 'branch_id',
        ]);
        $this->hasMany('Courses', [
            'foreignKey' => 'branch_id',
        ]);
        $this->hasMany('Tests', [
            'foreignKey' => 'branch_id',
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
            ->scalar('name')
            ->maxLength('name', 45)
            ->requirePresence('name', 'create')
            ->notEmptyString('name')
            ->add('name', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

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
            ->scalar('address')
            ->maxLength('address', 255)
            ->requirePresence('address', 'create')
            ->notEmptyString('address');

        $validator
            ->scalar('contact_number_1')
            ->maxLength('contact_number_1', 15)
            ->requirePresence('contact_number_1', 'create')
            ->notEmptyString('contact_number_1');

        $validator
            ->scalar('contact_number_2')
            ->maxLength('contact_number_2', 15)
            ->allowEmptyString('contact_number_2');

        $validator
            ->scalar('schedule')
            ->maxLength('schedule', 255)
            ->requirePresence('schedule', 'create')
            ->notEmptyString('schedule');

        $validator
            ->scalar('location')
            ->maxLength('location', 45)
            ->requirePresence('location', 'create')
            ->notEmptyString('location');

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
        $rules->add($rules->isUnique(['name']));

        return $rules;
    }
}
