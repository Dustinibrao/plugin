<?php

/**
 * @package DustinPlugin
 */

namespace Includes\Pages;

use Includes\Api\SettingsApi;
use Includes\Base\BaseController;
use Includes\Api\Callbacks\AdminCallbacks;
use Includes\Api\Callbacks\ManagerCallbacks;

class Dashboard extends BaseController
{
    public $settings;

    public $callbacks;

    public $callbacks_mngr;

    public $pages = [];

    public function register()
    {
        $this->settings = new SettingsApi();

        $this->callbacks = new AdminCallbacks();

        $this->callbacks_mngr = new ManagerCallbacks();

        $this->setPages();

        $this->setSettings();

        $this->setSections();

        $this->setFields();

        $this->settings
            ->addPages($this->pages)
            ->withSubPage("Dashboard")
            ->register();
    }
    public function setPages() {
        $this->pages = [
            [
                "page_title" => "Dustin Plugin",
                "menu_title" => "Dustin",
                "capability" => "manage_options",
                "menu_slug" => "dustin_plugin",
                "callback" => [$this->callbacks, "adminDashboard"],
                "icon_url" => "dashicons-store",
                "position" => 110,
            ],
        ];
    }

    public function setSettings() {
        $args = [
            [
                "option_group" => "dustin_plugin_settings",
                "option_name" => "dustin_plugin",
                "callback" => [$this->callbacks_mngr, "checkboxSanitize"],
            ],
        ];

        $this->settings->setSettings($args);
    }

    public function setSections() {
        $args = [
            [
                "id" => "dustin_admin_index",
                "title" => "Settings Manager",
                "callback" => [$this->callbacks_mngr, "adminSectionManager"],
                "page" => "dustin_plugin",
            ],
        ];

        $this->settings->setSections($args);
    }

    public function setFields()
    {
        $args = [];

        foreach ($this->managers as $key => $value) {
            $args[] = [
                "id" => $key,
                "title" => $value,
                "callback" => [$this->callbacks_mngr, "checkboxField"],
                "page" => "dustin_plugin",
                "section" => "dustin_admin_index",
                "args" => [
                    "option_name" => "dustin_plugin",
                    "label_for" => $key,
                    "class" => "ui-toggle",
                ],
            ];
        }

        $this->settings->setFields($args);
    }
}
