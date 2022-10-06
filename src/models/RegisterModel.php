<?php

namespace app\src\models;

use app\src\core\Model;

class RegisterModel extends Model {
  public string $firstname = '';
  public string $lastname = '';
  public string $email = '';
  public string $password = '';
  public string $password_confirm = '';

  public function register() {
    echo "Creating new user";
  }

  public function rules(): array {
    return [
      'firstname' => [self::RULE_REQUIRED],
      'lastname' => [self::RULE_REQUIRED],
      'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
      'password' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 8]],
      'password_confirm' => [self::RULE_REQUIRED, [self::RULE_MATCH, 'match' => 'password']]
    ];
  }
}