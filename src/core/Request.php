<?php

namespace app\src\core;

class Request {
  public function getPath() {
    $path = $_SERVER['REQUEST_URI'] ?? '/';
    $posititon = strpos($path, '?');

    if ($posititon === false) {
      return $path;
    }

    return $path = substr($path, 0, $posititon);
  }

  public function method() {
    return strtolower($_SERVER['REQUEST_METHOD']);
  }

  public function isGet() {
    return $this->method() === 'get';
  }

  public function isPost() {
    return $this->method() === 'post';
  }

  public function getBody() {
    $body = [];

    if ($this->method() === 'get') {
      foreach ($_GET as $key => $value) {
        $body[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
      }
    }

    if ($this->method() === 'post') {
      foreach ($_POST as $key => $value) {
        $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
      }
    }
    
    return $body;
  }
}