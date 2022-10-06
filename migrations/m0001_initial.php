<?php

class m0001_initial {
  public function up() {
    $db = \app\src\core\Application::$app->db;

    $db->pdo->exec();
  }

  public function down() {
    $db = \app\src\core\Application::$app->db;

    $db->pdo->exec();
  }
}