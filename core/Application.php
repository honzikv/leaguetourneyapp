<?php

namespace app\core;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class Application {

    public Router $router; # router pro routing v aplikaci
    public Request $request; # request pri spusteni aplikace
    public Response $response; # response pro zobrazeni 404 apod.
    public static string $ROOT_PATH; # root path
    public static string $FILES_PATH;

    private static Application $instance; # instance aplikace, pro globalni referenci
    private FilesystemLoader $loader; # loader instance
    private Environment $twig; # twig instance pro rendering
    private BaseController $controller; # aktualne pouzivany controller
    private Database $database; # instance databaze
    private Session $session; # session objekt pro snazsi manipulaci

    function __construct(string $rootPath) {
        self::$ROOT_PATH = $rootPath;
        self::$FILES_PATH = "$rootPath/userdata/";
        self::$instance = $this;

        $this->request = new Request(); # vytvoreni request objektu
        $this->response = new Response(); # vytvoreni response objektu
        $this->router = new Router($this->request, $this->response); # vytvoreni routeru

        # Inicializace Twigu
        $this->loader = new FilesystemLoader("$rootPath/view/");
        $this->twig = new Environment($this->loader, []);

        $this->database = new Database(); # inicializace databaze
        $this->session = new Session();
    }

    static function getInstance(): Application {
        return self::$instance;
    }

    function run() {
        echo $this->router->resolve();
    }

    /**
     * @return BaseController
     */
    public function getController(): BaseController {
        return $this->controller;
    }

    /**
     * @return FilesystemLoader
     */
    public function getLoader(): FilesystemLoader {
        return $this->loader;
    }

    /**
     * @return Environment
     */
    public function getTwig(): Environment {
        return $this->twig;
    }

    /**
     * @return Database
     */
    public function getDatabase(): Database {
        return $this->database;
    }

    /**
     * @param BaseController $controller
     */
    public function setController(BaseController $controller): void {
        $this->controller = $controller;
    }

    /**
     * @return Session
     */
    public function getSession(): Session {
        return $this->session;
    }


}