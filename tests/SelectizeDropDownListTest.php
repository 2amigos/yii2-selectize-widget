<?php
/**
 * @link https://github.com/2amigos/yii2-selectize-widget
 * @copyright Copyright (c) 2013-2015 2amigOS! Consulting Group LLC
 * @license http://opensource.org/licenses/BSD-3-Clause
 */

namespace tests;

use tests\models\Model;
use Yii;

/**
 * SelectizeDropDownListTest
 */
class SelectizeDropDownListTest extends \PHPUnit_Framework_TestCase
{
    public function testWidget()
    {
        $model = new Model();
        $view = Yii::$app->getView();
        $content = $view->render('//selectize-drop-down-list', ['model' => $model]);
        $actual = $view->render('//layouts/main', ['content' => $content]);
        $expected = file_get_contents(__DIR__ . '/data/test-selectize-drop-down-list.bin');
        $this->assertEquals($expected, $actual);
    }
}
