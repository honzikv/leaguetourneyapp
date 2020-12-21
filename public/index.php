<?php

require_once __DIR__ . '/../vendor/autoload.php';

use app\controller\CreateGuideController;
use app\controller\GuideListController;
use app\controller\MainPageController;
use app\controller\ManageUsersController;
use app\controller\ProfileController;
use app\core\Application;
use app\controller\AuthenticationController;
use app\controller\RegistrationController;

$application = new Application(dirname(__DIR__));
$router = $application->router;

# nastaveni routeru pro metody, pri triggeru jedne z metod zavola dany controller a obslouzi request

$router->setGetMethod('/', [MainPageController::class, 'render']);
$router->setGetMethod('/login', [AuthenticationController::class, 'renderLoginPage']);
$router->setGetMethod('/register', [RegistrationController::class, 'render']);
$router->setGetMethod('/createguide', [CreateGuideController::class, 'render']);
$router->setGetMethod('/guidelist', [GuideListController::class, 'render']);
$router->setGetMethod('/profile', [ProfileController::class, 'render']);
$router->setGetMethod('/manageusers', [ManageUsersController::class, 'render']);

$application->router->setPostMethod('/register', [RegistrationController::class, 'processRegistration']);
$application->router->setPostMethod('/login', [AuthenticationController::class, 'processLogin']);
$application->router->setPostMethod('/logout', [AuthenticationController::class, 'processLogout']);
$application->router->setPostMethod('/createguide', [CreateGuideController::class, 'processGuideUpload']);


$application->run();
