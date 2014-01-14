<?php
/**
 * @copyright Copyright (c) 2013 2amigOS! Consulting Group LLC
 * @link http://2amigos.us
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 */
namespace dosamigos\widgets;

use yii\web\AssetBundle;

/**
 * @author Antonio Ramirez <amigo.cobos@gmail.com>
 * @link http://www.ramirezcobos.com/
 * @link http://www.2amigos.us/
 * @package dosamigos\yii2\widgets
 */
class SelectizeBootstrapAsset extends AssetBundle
{
	public $sourcePath = '@vendor/2amigos/selectize.js/dist/css';

	public $css = [
		'selectize.bootstrap3.css'
	];

	public $depends = [
		'yii\bootstrap\BootstrapAsset'
	];
}