<?php

use dosamigos\selectize\SelectizeDropDownList;

/* @var $this \yii\web\View */
/* @var $model tests\models\Model */
?>

<?= SelectizeDropDownList::widget([
    'model' => $model,
    'attribute' => 'test',
]) ?>

<?= SelectizeDropDownList::widget([
    'name' => 'test',
]) ?>

<?= SelectizeDropDownList::widget([
    'id' => 'custom-id',
    'name' => 'test',
]) ?>

<?= SelectizeDropDownList::widget([
    'name' => 'test',
    'items' => ['item1', 'item2', 'item3'],
]) ?>

<?= SelectizeDropDownList::widget([
    'name' => 'test',
    'items' => ['item1', 'item2', 'item3'],
    'loadUrl' => 'http://example.com/data.json',
]) ?>
