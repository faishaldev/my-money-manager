<?php

namespace app\src\core;

class Application {
  public static string $ROOT_DIR;
  public Router $router;
  public Request $request;
  public Response $response;
  public Database $database;
  public static Application $app;
  public Controller $controller;

  public function __construct($rootPath, array $config) {
    self::$ROOT_DIR = $rootPath;
    self::$app = $this;

    $this->request = new Request();
    $this->response = new Response();
    $this->router = new Router($this->request, $this->response);
    $this->db = new Database($config['db']);
  }

  public function run() {
    echo $this->router->resolve();
  }

  public function getController() {

  }

  public function setController() {

  }
}