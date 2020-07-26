<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class RemoveSecondaryImageFromContents extends AbstractMigration
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
        $table = $this->table('contents');
        $table->removeColumn('secondary_image');
        $table->removeColumn('secondary_image_dir');
        $table->removeColumn('secondary_image_size');
        $table->removeColumn('secondary_image_type');
        $table->update();
    }
}
