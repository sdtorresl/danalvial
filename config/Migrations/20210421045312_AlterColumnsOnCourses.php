<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class AlterColumnsOnCourses extends AbstractMigration
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
        $table->changeColumn('schedule_size', 'string', [
            'null' => true,
        ]);
        $table->changeColumn('curriculum_size', 'string', [
            'null' => true,
        ]);
        $table->update();
    }
}
