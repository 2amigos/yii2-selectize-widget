<?php

use dosamigos\selectize\SelectizeDropDownList;

/* @var $this \yii\web\View */
/* @var $model \tests\models\Post */
?>

<?= SelectizeDropDownList::widget([
    'name' => 'tags',
    'items' => ['love', 'this', 'game'],
]) ?>

<?= SelectizeDropDownList::widget([
    'model' => $model,
    'attribute' => 'tags',
    'items' => ['love', 'this', 'game'],
]) ?>
