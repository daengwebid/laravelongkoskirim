<?php

namespace Daengweb\OngkosKirim;

use Illuminate\Support\Facades\Facade;

class RuangApiFacade extends Facade {
	protected static function getFacadeAccessor() { 
        return 'ruangApi'; 
    }
}