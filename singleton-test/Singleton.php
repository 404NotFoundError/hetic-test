<?php 

namespace Singleton;

/**
 * Singleton Class
 * 
 * @todo-singleton
 * 
 * @author HOUNTONDHI A. <hountondjigodwill@gmail.com>
 */
final class Singleton
{

    public $name;

    private static $isInstantiated = false;

    public static function getInstance()
    {

        if (Singleton::$isInstantiated === false) {
            Singleton::$isInstantiated = true;
            return new Singleton;
        }

       echo "Cette ne peut être instancer qu'une seule fois";
        
    }

    private function __construct()
    {
       
    }

    private function __clone()
    {
        
    }
    
}
