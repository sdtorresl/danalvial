<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class Initial extends AbstractMigration
{
    /**
     * Up Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-up-method
     * @return void
     */
    public function up()
    {
        $this->table('answers')
            ->addColumn('question_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('answer', 'string', [
                'default' => null,
                'limit' => 500,
                'null' => true,
            ])
            ->addColumn('result', 'boolean', [
                'default' => null,
                'limit' => 4,
                'null' => false,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addIndex(
                [
                    'question_id',
                ]
            )
            ->create();

        $this->table('branches')
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => false,
            ])
            ->addColumn('image', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('image_dir', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('image_size', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => false,
            ])
            ->addColumn('image_type', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => false,
            ])
            ->addColumn('address', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('contact_number_1', 'integer', [
                'default' => null,
                'limit' => 15,
                'null' => false,
            ])
            ->addColumn('contact_number_2', 'integer', [
                'default' => null,
                'limit' => 15,
                'null' => true,
            ])
            ->addColumn('schedule', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('location', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => false,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addIndex(
                [
                    'name',
                ],
                ['unique' => true]
            )
            ->create();

        $this->table('contacts')
            ->addColumn('first_name', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => false,
            ])
            ->addColumn('last_name', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => false,
            ])
            ->addColumn('email', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => false,
            ])
            ->addColumn('message', 'text', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('telephone', 'integer', [
                'default' => null,
                'limit' => 15,
                'null' => false,
            ])
            ->addColumn('course_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('branch_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('viewed', 'boolean', [
                'default' => '0',
                'limit' => 4,
                'null' => false,
            ])
            ->addIndex(
                [
                    'branch_id',
                ]
            )
            ->addIndex(
                [
                    'course_id',
                ]
            )
            ->create();

        $this->table('contents')
            ->addColumn('identifier', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => false,
            ])
            ->addColumn('title', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => false,
            ])
            ->addColumn('text', 'text', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('primary_image', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('primary_image_dir', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('primary_image_size', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => true,
            ])
            ->addColumn('primary_image_type', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => true,
            ])
            ->addColumn('secondary_image', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('secondary_image_dir', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('secondary_image_size', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => true,
            ])
            ->addColumn('secondary_image_type', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => true,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->create();

        $this->table('courses')
            ->addColumn('branch_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('title', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => false,
            ])
            ->addColumn('short_description', 'string', [
                'default' => null,
                'limit' => 150,
                'null' => false,
            ])
            ->addColumn('long_description', 'text', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('category', 'string', [
                'default' => null,
                'limit' => 3,
                'null' => false,
            ])
            ->addColumn('type', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => false,
            ])
            ->addColumn('schedule', 'string', [
                'default' => null,
                'limit' => 100,
                'null' => false,
            ])
            ->addColumn('medical_exam', 'string', [
                'default' => null,
                'limit' => 150,
                'null' => false,
            ])
            ->addColumn('requirements', 'text', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('price', 'integer', [
                'default' => null,
                'limit' => 8,
                'null' => true,
            ])
            ->addColumn('image', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('image_dir', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('image_size', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => true,
            ])
            ->addColumn('image_type', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => true,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addIndex(
                [
                    'branch_id',
                ],
                ['unique' => true]
            )
            ->addIndex(
                [
                    'branch_id',
                ]
            )
            ->create();

        $this->table('frequent_questions')
            ->addColumn('question', 'string', [
                'default' => null,
                'limit' => 100,
                'null' => false,
            ])
            ->addColumn('answer', 'text', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->create();

        $this->table('questions')
            ->addColumn('test_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('question', 'string', [
                'default' => null,
                'limit' => 400,
                'null' => false,
            ])
            ->addColumn('category', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => false,
            ])
            ->addColumn('title', 'string', [
                'default' => null,
                'limit' => 20,
                'null' => false,
            ])
            ->addColumn('image', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('image_dir', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('image_size', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => true,
            ])
            ->addColumn('image_type', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => true,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addIndex(
                [
                    'title',
                ],
                ['unique' => true]
            )
            ->addIndex(
                [
                    'test_id',
                ]
            )
            ->create();

        $this->table('tests')
            ->addColumn('branch_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => false,
            ])
            ->addColumn('description', 'string', [
                'default' => null,
                'limit' => 150,
                'null' => false,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addIndex(
                [
                    'branch_id',
                ]
            )
            ->create();

        $this->table('users')
            ->addColumn('first_name', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => false,
            ])
            ->addColumn('last_name', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => false,
            ])
            ->addColumn('email', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('password', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('role', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => false,
            ])
            ->addColumn('token', 'string', [
                'default' => null,
                'limit' => 36,
                'null' => true,
            ])
            ->addColumn('token_expiry_date', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('token_used', 'boolean', [
                'default' => '0',
                'limit' => 4,
                'null' => false,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addIndex(
                [
                    'email',
                ],
                ['unique' => true]
            )
            ->addIndex(
                [
                    'token',
                ],
                ['unique' => true]
            )
            ->create();

        $this->table('answers')
            ->addForeignKey(
                'question_id',
                'questions',
                'id',
                [
                    'update' => 'NO_ACTION',
                    'delete' => 'NO_ACTION',
                ]
            )
            ->update();

        $this->table('contacts')
            ->addForeignKey(
                'branch_id',
                'branches',
                'id',
                [
                    'update' => 'NO_ACTION',
                    'delete' => 'NO_ACTION',
                ]
            )
            ->addForeignKey(
                'course_id',
                'courses',
                'id',
                [
                    'update' => 'NO_ACTION',
                    'delete' => 'NO_ACTION',
                ]
            )
            ->update();

        $this->table('courses')
            ->addForeignKey(
                'branch_id',
                'branches',
                'id',
                [
                    'update' => 'NO_ACTION',
                    'delete' => 'NO_ACTION',
                ]
            )
            ->update();

        $this->table('questions')
            ->addForeignKey(
                'test_id',
                'tests',
                'id',
                [
                    'update' => 'NO_ACTION',
                    'delete' => 'NO_ACTION',
                ]
            )
            ->update();

        $this->table('tests')
            ->addForeignKey(
                'branch_id',
                'branches',
                'id',
                [
                    'update' => 'NO_ACTION',
                    'delete' => 'NO_ACTION',
                ]
            )
            ->update();
    }

    /**
     * Down Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-down-method
     * @return void
     */
    public function down()
    {
        $this->table('answers')
            ->dropForeignKey(
                'question_id'
            )->save();

        $this->table('contacts')
            ->dropForeignKey(
                'branch_id'
            )
            ->dropForeignKey(
                'course_id'
            )->save();

        $this->table('courses')
            ->dropForeignKey(
                'branch_id'
            )->save();

        $this->table('questions')
            ->dropForeignKey(
                'test_id'
            )->save();

        $this->table('tests')
            ->dropForeignKey(
                'branch_id'
            )->save();

        $this->table('answers')->drop()->save();
        $this->table('branches')->drop()->save();
        $this->table('contacts')->drop()->save();
        $this->table('contents')->drop()->save();
        $this->table('courses')->drop()->save();
        $this->table('frequent_questions')->drop()->save();
        $this->table('questions')->drop()->save();
        $this->table('tests')->drop()->save();
        $this->table('users')->drop()->save();
    }
}
