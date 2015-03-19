<?php

use dosamigos\selectize\SelectizeTextInput;

/* @var $this yii\web\View */
/* @var $model tests\models\Post */
?>

<?= SelectizeTextInput::widget([
    'model' => $model,
    'attribute' => 'tags',
]) ?>

<?= SelectizeTextInput::widget([
    'name' => 'tags',
]) ?>

<?= SelectizeTextInput::widget([
    'id' => 'custom-id',
    'name' => 'tags',
]) ?>

<?= SelectizeTextInput::widget([
    'name' => 'tags',
    'loadUrl' => 'http://example.com/data.json',
]) ?>
