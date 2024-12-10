<?php

namespace Rtwpvsp\Controllers\Admin; 

use Rtwpvsp\Controllers\Admin\Meta\MetaController;

class AdminController {

    public function __construct() {  
        new MetaController();
        new ScriptLoader(); 
        new AdminFilter(); 
    } 
}