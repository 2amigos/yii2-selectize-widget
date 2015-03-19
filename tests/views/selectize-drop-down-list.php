<?php

use dosamigos\selectize\SelectizeDropDownList;

/* @var $this \yii\web\View */
/* @var $model tests\models\Post */
?>

<?= SelectizeDropDownList::widget([
    'model' => $model,
    'attribute' => 'tags',
]) ?>

<?= SelectizeDropDownList::widget([
    'name' => 'tags',
]) ?>

<?= SelectizeDropDownList::widget([
    'id' => 'custom-id',
    'name' => 'tags',
]) ?>

<?= SelectizeDropDownList::widget([
    'name' => 'tags',
    'items' => ['love', 'this', 'game'],
]) ?>

<?= SelectizeDropDownList::widget([
    'name' => 'tags',
    'items' => ['love', 'this', 'game'],
    'loadUrl' => 'http://example.com/data.json',
]) ?>
