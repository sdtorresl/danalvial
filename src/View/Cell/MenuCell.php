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
            "courses" => [
                "label" => __("Courses-label"),
                "icon" => "fal fa-book",
                "actions" => [
                    "index" => __("Listar"),
                    "add" => __("Crear")
                ]
            ],
            "podcasts" => [
                "label" => __("Podcasts"),
                "icon" => "fal fa-podcast",
                "actions" => [
                    "index" => __("Listar"),
                    "add" => __("Crear")
                ]
            ],
            "products" => [
                "label" => __("Products"),
                "icon" => "fal fa-shopping-bag",
                "actions" => [
                    "index" => __("Listar"),
                    "add" => __("Crear")
                ]
            ],
            "discounts" => [
                "label" => __("Discounts"),
                "icon" => "fal fa-percent",
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
            "settings" => [
                "label" => __("Settings"),
                "icon" => "fal fa-cog",
                "action" => "index"
            ],
        ];

        $this->set(compact('menuItems'));
    }
}
