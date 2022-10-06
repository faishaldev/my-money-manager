<?php

namespace app\src\core\form;

use app\src\core\Model;

class Field {
  public const TYPE_TEXT = 'text';
  public const TYPE_EMAIL = 'email';
  public const TYPE_PASSWORD = 'password';
  public const TYPE_NUMBER = 'number';

  public string $type;
  public Model $model;
  public string $attribute;

  public function __construct(\app\src\core\Model $model, string $attribute) {
    $this->type = self::TYPE_TEXT;
    $this->model = $model;
    $this->attribute = $attribute;
  }

  public function __toString() {
    return sprintf('
      <div>
        <label for="%s">%s</label>
        <input type="%s" name="%s" id="%s" value="%s" class="%s" />
        <p>%s</p>
      </div>',
      $this->attribute,
      $this->attribute,
      $this->type,
      $this->attribute,
      $this->attribute,
      $this->model->{$this->attribute},
      $this->model->hasError($this->attribute) ? 'is-invalid' : '',
      $this->model->getFirstError($this->attribute)
    );
  }

  public function passwordField() {
    $this->type = self::TYPE_PASSWORD;

    return $this;
  }

  public function emailField() {
    $this->type = self::TYPE_EMAIL;

    return $this;
  }
}