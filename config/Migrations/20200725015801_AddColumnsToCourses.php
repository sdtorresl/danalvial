<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class AddColumnsToCourses extends AbstractMigration
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
        $table = $this->table('courses');
        $table->addColumn('schedule_dir', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('schedule_size', 'string', [
            'default' => null,
            'limit' => 45,
            'null' => false,
        ]);
        $table->addColumn('schedule_type', 'string', [
            'default' => null,
            'limit' => 45,
            'null' => false,
        ]);
        $table->addColumn('curriculum', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('curriculum_dir', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('curriculum_size', 'string', [
            'default' => null,
            'limit' => 45,
            'null' => false,
        ]);
        $table->addColumn('curriculum_type', 'string', [
            'default' => null,
            'limit' => 45,
            'null' => false,
        ]);
        $table->addColumn('curriculum_content', 'text', [
            'default' => null,
            'null' => false,
        ]);
        $table->update();
    }
}
