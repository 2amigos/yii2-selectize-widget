<?php

use dosamigos\selectize\SelectizeTextInput;

/* @var $this yii\web\View */
/* @var $model tests\models\Model */
?>

<?= SelectizeTextInput::widget([
    'model' => $model,
    'attribute' => 'test',
]) ?>

<?= SelectizeTextInput::widget([
    'name' => 'test',
]) ?>

<?= SelectizeTextInput::widget([
    'id' => 'custom-id',
    'name' => 'test',
]) ?>

<?= SelectizeTextInput::widget([
    'name' => 'test',
    'loadUrl' => 'http://example.com/data.json',
]) ?>
