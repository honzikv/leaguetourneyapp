<?php

namespace app\controller;

use app\core\BaseController;
use app\core\Request;

class HomeController extends BaseController {

    private static string $VIEW = 'home';

    function show() {
        $this->render(self::$VIEW); # echo provede render html
    }
}