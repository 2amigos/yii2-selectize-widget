<?php
/**
 * @link https://github.com/2amigos/yii2-selectize-widget
 * @copyright Copyright (c) 2013 2amigOS! Consulting Group LLC
 * @license http://opensource.org/licenses/BSD-3-Clause
 */
namespace dosamigos\widgets;

use yii\helpers\Html;

/**
 * SelectizeTagInput
 *
 * selectizejs requires an input tag in order to create a tagging input field. Is a special case. Please refer to its
 * (examples)[] for further information.
 *
 * @author Antonio Ramirez <amigo.cobos@gmail.com>
 * @link http://www.ramirezcobos.com/
 * @link http://www.2amigos.us/
 * @package dosamigos\widgets
 */
class SelectizeTagInput extends Selectize
{
	/**
	 * @inheritdoc
	 */
	public function run()
	{
		if ($this->hasModel()) {
			echo Html::activeTextInput($this->model, $this->attribute, $this->options);
		} else {
			echo Html::textInput($this->name, $this->value, $this->options);
		}
		$this->registerPlugin();
	}
}