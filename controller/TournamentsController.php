<?php


namespace app\controller;


use app\core\BaseController;

class TournamentsController extends BaseController {

    private const VIEW = 'tournaments.twig';

    function render() {
        $this->__render(self::VIEW);
    }
}