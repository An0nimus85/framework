<?php

namespace core\base\settings;
use core\base\settings\Settings;

class ShopSettings
{
    static private $_instance;
    private $baseSettings;

    private function __construct($baseSettings){

        $this->baseSettings = $baseSettings;
    }
    private function __clone(){

    }
    static public function get($property){
        return self::$_instance->$property;
    }

    static public function instance(): ShopSettings
    {
        if (self::$_instance instanceof self){
            return self::$_instance;
        }
        self::$_instance=new self();
        self::$_instance->baseSettings = Settings::instance();
        $baseProperties =self::instance()->baseSettings->clueProperties(get_class());
        self::$_instance->setProperty($baseProperties);

        return self::$_instance = new self();
    }
    private array $routes  =[
        'admin'=>'sudo',
    ];
    private array $templateArr=[
        'text'=>['price','short'],
        'textarea'=>['goods_content']
    ];
    protected function setProperty($properties): void
    {
        if ($properties){
            foreach ($properties as $name=> $property){
                $this->$name = $property;
            }
        }
    }


}