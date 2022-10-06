<?php

namespace app\src\controllers;

use app\src\core\Controller;
use app\src\core\Request;

class SiteController extends Controller {
  public function home() {
    $params = [
      'name' => "My Money Manager"
    ];

    return $this->render('home/index', $params);
  }

  public function contact() {
    return $this->render('contact/index');
  }

  public function handleContact(Request $request) {
    $body = $request->getBody();
    var_dump($body); 
    return "Handling submitted data";
  }
}