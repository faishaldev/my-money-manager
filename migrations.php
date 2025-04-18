<?php

use app\src\controllers\AuthController;
use app\src\controllers\SiteController;
use app\src\core\Application;

require_once __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$config = [
    'db' => [
      'dsn' => $_ENV['DB_DSN'],
      'user' => $_ENV['DB_USER'],
      'password' => $_ENV['DB_PASSWORD']
    ]
  ];

$app = new Application(__DIR__, $config);

$app->db->applyMigrations();