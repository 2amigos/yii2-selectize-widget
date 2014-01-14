<?php
/**
 * @copyright Copyright (c) 2013 2amigOS! Consulting Group LLC
 * @link http://2amigos.us
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 */
namespace dosamigos\widgets;

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\widgets\InputWidget;

/**
 *
 * SelectizeInput renders a text input Selectize.js widget plugin. Selectize.js is the hybrid of textbox and select box.
 *
 * @author Antonio Ramirez <amigo.cobos@gmail.com>
 * @link http://www.ramirezcobos.com/
 * @link http://www.2amigos.us/
 * @package dosamigos\widgets
 */
class Selectize extends InputWidget
{
	/**
	 * @var string the theme to use to render the widget
	 */
	public $bundleClass = 'dosamigos\widgets\SelectizeBootstrap3Asset';
	/**
	 * @var array $items the option data items. If this value is not empty, [[Selectize]] will assume that requires to
	 * render a 'select' box. If you wish to force this behavior, set the [[$tag]] type to input.
	 */
	public $items = [];
	/**
	 * @var array the options for the Selectize JS plugin.
	 * Please refer to the Selectize plugin Web page for possible options.
	 * @see https://github.com/brianreavis/selectize.js/blob/master/docs/usage.md#options
	 */
	public $clientOptions = [];
	/**
	 * @var array the event handlers for the underlying Selectize JS plugin.
	 * Please refer to the [Selectize](https://github.com/brianreavis/selectize.js/blob/master/docs/events.md#list-of-events) plugin
	 * Web page for possible events.
	 */
	public $clientEvents = [];


	/**
	 * @inheritdoc
	 */
	public function init()
	{
		if (!empty($this->items)) {
			$this->options['tag'] = 'select';
		}
		parent::init();
	}

	/**
	 * @inheritdoc
	 */
	public function run()
	{
		$tag = ArrayHelper::remove($this->options, 'tag', 'input');
		if ($tag == 'select') {
			if ($this->hasModel()) {
				echo Html::activeDropDownList($this->model, $this->attribute, $this->items, $this->options);
			} else {
				echo Html::dropDownList($this->name, $this->value , $this->items, $this->options);
			}
		} else {
			if ($this->hasModel()) {
				echo Html::activeTextInput($this->model, $this->attribute, $this->options);
			} else {
				echo Html::textInput($this->name, $this->value, $this->options);
			}
		}
		$this->registerPlugin();
	}

	/**
	 * Registers Selectize Bootstrap plugin and the related events
	 */
	protected function registerPlugin()
	{
		$view = $this->getView();
		if($this->bundleClass !== null)
		{
			call_user_func([$this->bundleClass, 'register'], $view);
		}
		SelectizePluginAsset::register($view);

		$id = $this->options['id'];

		$options = $this->clientOptions !== false && !empty($this->clientOptions)
			? Json::encode($this->clientOptions)
			: '';

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