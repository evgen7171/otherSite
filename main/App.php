<?php
/**
 * Created by PhpStorm.
 * User: UserUser
 * Date: 18.04.2020
 * Time: 20:49
 */

namespace App\main;

use App\services\Request;

class App
{
    private static $config;
    private $componentsData;
    private $components = [];

    /*
     * Singleton---
     */
    private static $items;

    protected function __construct()
    {
    }

    protected function __clone()
    {
    }

    protected function __wakeup()
    {
    }

    /**
     * Создание одного единственного экземпляра класса
     * @return mixed
     */
    public static function getInstance()
    {
        if (empty(static::$items)) {
            static::$items = new static();
        }
        return static::$items;
    }
    /*
     * ---Singleton
     */

    static public function call(): App
    {
        static::$config = include($_SERVER['DOCUMENT_ROOT'] . '/main/config.php');
        return static::getInstance();
    }

    public function run()
    {
        $this->componentsConfig = static::$config['components'];
        $this->runController();
    }

    private function runController()
    {
        $request = new Request();

        $defaultControllerName = static::$config['defaultControllerName'];

        $controllerName = $request->getControllerName() ?: $defaultControllerName;
        $actionName = $request->getActionName();

        $params = compact($controllerName, $actionName, $id, $postParams);

        $controllerClass = 'App\\controllers\\' .
            ucfirst($controllerName) . 'Controller';
        if (class_exists($controllerClass)) {
            /**@var \App\controllers\Controller $controller */
            $controller = new $controllerClass(
                new TmplRenderService(),
                $request
            );
            $controller->run($params);
        }
    }

    /**
     * метод, который срабатывает когда вызывается свойство, которого нет
     * @param string $name
     * @return mixed|null
     */
    public function __get(string $name)
    {
        if (array_key_exists($name, $this->components)) {
            return $this->components[$name];
        }

        if (array_key_exists($name, $this->componentsData)) {
            $class = $this->componentsData[$name]['class'];
            if (!class_exists($class)) {
                return null;
            }

            if (array_key_exists('config', $this->componentsData[$name])) {
                $config = $this->componentsData[$name]['config'];
                $component = new $class($config);
            } else {
                $component = new $class();
            }
            $this->components[$name] = $component;
            return $component;
        }
        return null;
    }
}