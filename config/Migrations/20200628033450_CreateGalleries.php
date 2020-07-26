<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateGalleries extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('galleries');
        $table->addColumn('branch_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('title', 'string', [
            'default' => null,
            'limit' => 50,
            'null' => false,
        ]);
        $table->addColumn('image', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('image_dir', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('image_size', 'string', [
            'default' => null,
            'limit' => 45,
            'null' => false,
        ]);
        $table->addColumn('image_type', 'string', [
            'default' => null,
            'limit' => 45,
            'null' => false,
        ]);
        $table->addColumn('created', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('modified', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addIndex(
            [
                'branch_id',
            ]
        );
        $table->create();

        $table->addForeignKey(
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

    public function down()
    {
        $this->table('galleries')
            ->dropForeignKey(
                'branch_id'
            )->save();

            
        $this->table('galleries')->drop()->save();
    }
}
