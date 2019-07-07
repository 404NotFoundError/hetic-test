<?php 

namespace Tests\Helpers\Poo;

use Poo\Helpers\DefaultModel;

class User extends DefaultModel
{

    /**
     * @return void
     */
    public function unless(): void
    {
        echo 'This is cool';
    }
    
}
