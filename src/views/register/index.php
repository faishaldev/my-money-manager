<h1>Register</h1>
<?php $form = \app\src\core\form\Form::begin('', 'POST'); ?>
  <?= $form->field($model, 'firstname'); ?>
  <?= $form->field($model, 'lastname'); ?>
  <?= $form->field($model, 'email')->emailField(); ?>
  <?= $form->field($model, 'password')->passwordField(); ?>
  <?= $form->field($model, 'password_confirm')->passwordField(); ?>
  <button type="submit">Submit</button>
<?php \app\src\core\form\Form::end(); ?>