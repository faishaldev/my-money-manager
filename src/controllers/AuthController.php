<?php

namespace app\src\controllers;

use app\src\core\Controller;
use app\src\core\Request;
use app\src\models\RegisterModel;

class AuthController extends Controller {
  public function login() {
    $this->setLayout('auth');

    return $this->render('login/index');
  }

  public function register(Request $request) {
    $registerModel = new RegisterModel();
    
    if ($request->isPost()) {
      $registerModel->loadData($request->getBody());

      if ($registerModel->validate() && $registerModel->register()) {
        return 'Success';
      }

      return $this->render('register/index', [
        'model' => $registerModel
      ]);
    }

    $this->setLayout('auth');

    return $this->render('register/index', [
      'model' => $registerModel
    ]);
  }
}