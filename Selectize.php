<?php
/**
 * @link https://github.com/2amigos/yii2-selectize-widget
 * @copyright Copyright (c) 2013 2amigOS! Consulting Group LLC
 * @license http://opensource.org/licenses/BSD-3-Clause
 */
namespace dosamigos\selectize;

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\Json;
use yii\web\JsExpression;
use yii\widgets\InputWidget;

/**
 * Selectize renders a text input Selectize.js plugin widget. Selectize.js is the hybrid of textbox and select box.
 *
 * @author Antonio Ramirez <amigo.cobos@gmail.com>
 * @link http://www.ramirezcobos.com/
 * @link http://2amigos.us/
 */
class Selectize extends InputWidget
{
	/**
	 * @var string the Selectize.js theme. This refers to an asset bundle class
	 * representing the Selectize.js theme. The default theme is the official "Bootstrap 3" theme.
	 */
	public static $theme = 'dosamigos\selectize\SelectizeBootstrapAsset';
	/**
	 * @var array|null $items the option data items.
	 */
	public $items;
	/**
	 * @var array|string the URL where to get the new options to be loaded into the plugin. This attribute is for basic
	 * usage of the `load` configuration option of the plugin. For a more advanced usage of the `load` option, please
	 * refer to the Selectize.js usage documentation. The URL will receive a parameter "q" set with the value that
	 * should be use to query and build datasets. It is also important to note, that [[url]] must call an action that
	 * will return formatted datasets as specified on Selectize.js usage documentation.
	 * @see https://github.com/brianreavis/selectize.js/blob/master/docs/usage.md
	 */
	public $url;
	/**
	 * @var array the options for the Selectize.js plugin.
	 * Please refer to the Selectize.js plugin web page for possible options.
	 * @see https://github.com/brianreavis/selectize.js/blob/master/docs/usage.md#options
	 */
	public $clientOptions = [];
	/**
	 * @var array the event handlers for the Selectize.js plugin.
	 * Please refer to the Selectize.js plugin web page for possible options.
	 * @see https://github.com/brianreavis/selectize.js/blob/master/docs/events.md#list-of-events
	 */
	public $clientEvents = [];

	/**
	 * @inheritdoc
	 */
	public function run()
	{
		if ($this->hasModel()) {
			if ($this->items === null) {
				echo Html::activeTextInput($this->model, $this->attribute, $this->options);
			} else {
				echo Html::activeDropDownList($this->model, $this->attribute, $this->items, $this->options);
			}
		} else {
			if ($this->items === null) {
				echo Html::textInput($this->name, $this->value, $this->options);
			} else {
				echo Html::dropDownList($this->name, $this->value, $this->items, $this->options);
			}
		}

		$view = $this->getView();

		/** @var \yii\web\AssetBundle $themeAsset */
		$themeAsset = static::$theme;
		$themeAsset::register($view);

		$id = $this->options['id'];

		if ($this->url !== null) {
			$url = Url::to($this->url);
			$this->clientOptions['load'] = new JsExpression("
function (query, callback) {
	if (!query.length) return callback();
	$.getJSON('$url', { query: encodeURIComponent(query) }, function (data) { callback(data); })
	.fail(function () { callback();	});
}
");
		}

		$options = Json::encode($this->clientOptions);
		$js = "jQuery('#$id').selectize($options);";
		$view->registerJs($js);

		if (!empty($this->clientEvents)) {
			$js = [];
			foreach ($this->clientEvents as $event => $handler) {
				$js[] = "jQuery('#$id').on('$event', $handler);";
			}
			$view->registerJs(implode("\n", $js));
		}
	}
}
