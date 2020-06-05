<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Contents Model
 *
 * @method \App\Model\Entity\Content newEmptyEntity()
 * @method \App\Model\Entity\Content newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Content[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Content get($primaryKey, $options = [])
 * @method \App\Model\Entity\Content findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Content patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Content[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Content|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Content saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Content[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Content[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Content[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Content[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ContentsTable extends Table
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

        $this->setTable('contents');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->addBehavior('File', [
            'primary_image' => [
                'file' => 'primary_image',
                'file_dir' => 'primary_image_dir',
                'file_type' => 'primary_image_type'
            ],
            'secondary_image' => [
                'file' => 'secondary_image',
                'file_dir' => 'secondary_image_dir',
                'file_type' => 'secondary_image_type'
            ]
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
            ->scalar('identifier')
            ->maxLength('identifier', 45)
            ->requirePresence('identifier', 'create')
            ->notEmptyString('identifier');

        $validator
            ->scalar('title')
            ->maxLength('title', 45)
            ->requirePresence('title', 'create')
            ->notEmptyString('title');

        $validator
            ->scalar('text')
            ->requirePresence('text', 'create')
            ->notEmptyString('text');

        $validator
            ->requirePresence('primary_image', 'create')
            ->allowEmptyFile('primary_image');

        $validator
            ->maxLength('primary_image_dir', 255)
            ->allowEmptyString('primary_image_dir');

        $validator
            ->maxLength('primary_image_size', 45)
            ->allowEmptyString('primary_image_size');

        $validator
            ->maxLength('primary_image_type', 45)
            ->allowEmptyString('primary_image_type');

        $validator
            ->requirePresence('secondary_image', 'create')
            ->allowEmptyFile('secondary_image');

        $validator
            ->maxLength('secondary_image_dir', 255)
            ->allowEmptyString('secondary_image_dir');

        $validator
            ->maxLength('secondary_image_size', 45)
            ->allowEmptyString('secondary_image_size');

        $validator
            ->maxLength('secondary_image_type', 45)
            ->allowEmptyString('secondary_image_type');

        return $validator;
    }
}
