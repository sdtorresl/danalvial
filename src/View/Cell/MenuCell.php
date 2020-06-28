<?php
declare(strict_types=1);

namespace App\View\Cell;

use Cake\View\Cell;

/**
 * Menu cell
 */
class MenuCell extends Cell
{
    /**
     * List of valid options that can be passed into this
     * cell's constructor.
     *
     * @var array
     */
    protected $_validCellOptions = [];

    /**
     * Initialization logic run at the end of object construction.
     *
     * @return void
     */
    public function initialize(): void
    {
    }
    
    /**
     * Default display method.
     *
     * @return void
     */
    public function display()
    {
        $menuItems = [
            "branches" => [
                "label" => __("Branches"),
                "icon" => "fal fa-building",
                "actions" => [
                    "index" => __("Listar"),
                    "add" => __("Crear")
                ]
            ],
            "contents" => [
                "label" => __("Content"),
                "icon" => "fal fa-th-list",
                "actions" => [
                    "index" => __("Ver"),
                    "add" => __("Crear")
                ]
            ],
            "gallery" => [
                "label" => __("Gallery"),
                "icon" => "fal fa-images",
                "actions" => [
                    "index" => __("Listar"),
                    "add" => __("Crear")
                ]
            ],
            "advantages" => [
                "label" => __("Advantages"),
                "icon" => "fal fa-th-list",
                "actions" => [
                    "index" => __("Ver"),
                    "add" => __("Crear")
                ]
            ],
            "courses" => [
                "label" => __("Courses"),
                "icon" => "fal fa-road",
                "actions" => [
                    "index" => __("Ver"),
                    "add" => __("Crear")
                ]
            ],
            "users" => [
                "label" => __("Users"),
                "icon" => "fal fa-users",
                "actions" => [
                    "index" => __("Listar"),
                    "add" => __("Crear")
                ]
            ],
            "tests" => [
                "label" => __("Tests"),
                "icon" => "fal fa-book-open",
                "actions" => [
                    "index" => __("Listar"),
                    "add" => __("Crear")
                ]
            ],
            "contacts" => [
                "label" => __("Contacts"),
                "icon" => "fal fa-comment-alt-dots",
                "action" => "index"
            ],
            "frequent_questions" => [
                "label" => __("Frequent questions"),
                "icon" => "fal fa-question",
                "actions" => [
                    "index" => __("Ver"),
                    "add" => __("Crear")
                ]
            ],
            "settings" => [
                "label" => __("Settings"),
                "icon" => "fal fa-cog",
                "action" => "index"
            ],
        ];

        $this->set(compact('menuItems'));
    }
}
