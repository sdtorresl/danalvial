<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class AddDetailsToCourses extends AbstractMigration
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
        $table->addColumn('practical_time', 'integer', [
            'default' => null,
            'limit' => 3,
            'null' => false,
        ]);

        $table->addColumn('theoretical_time', 'integer', [
            'default' => null,
            'limit' => 3,
            'null' => false,
        ]);

        $table->addColumn('workshop_time', 'integer', [
            'default' => null,
            'limit' => 3,
            'null' => false,
        ]);

        $table->update();
    }
}
