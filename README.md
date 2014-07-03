Selectize.js widget for Yii2
============================

[![Latest Stable Version](https://poser.pugx.org/2amigos/yii2-selectize-widget/v/stable.svg)](https://packagist.org/packages/2amigos/yii2-selectize-widget) [![Total Downloads](https://poser.pugx.org/2amigos/yii2-selectize-widget/downloads.svg)](https://packagist.org/packages/2amigos/yii2-selectize-widget) [![Latest Unstable Version](https://poser.pugx.org/2amigos/yii2-selectize-widget/v/unstable.svg)](https://packagist.org/packages/2amigos/yii2-selectize-widget) [![License](https://poser.pugx.org/2amigos/yii2-ckeditor-widget/license.svg)](https://packagist.org/packages/2amigos/yii2-selectize-widget)

Renders a [Selectize.js plugin](http://brianreavis.github.io/selectize.js/) widget.

Installation
------------
The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require 2amigos/yii2-selectize-widget "*"
```
or add

```json
"2amigos/yii2-selectize-widget" : "*"
```

to the require section of your application's `composer.json` file.

Usage
-----
Using a model:

```
use dosamigos\selectize\Selectize;
use yii\web\JsExpression;

<?= Selectize::widget([
    'name' => 'test',
    'value' => 'love, this, game',
    'clientOptions' => [
        'delimiter' => ',',
        'plugins' => ['remove_button'],
        'persist' => false,
        'create' => new JsExpression("function(input) { return { value: input, text: input }; }"),
    ],
]) ?>
```
Selectize.js has lots of configuration options. For further information, please check the
[Selectize.js plugin](http://brianreavis.github.io/selectize.js/) website.

> [![2amigOS!](http://www.gravatar.com/avatar/55363394d72945ff7ed312556ec041e0.png)](http://www.2amigos.us)  
<i>Web development has never been so fun!</i>  
[www.2amigos.us](http://www.2amigos.us)
