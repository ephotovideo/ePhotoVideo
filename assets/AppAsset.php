<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $depends = [
        'yii\web\JqueryAsset',
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapPluginAsset',    
    ];
    public $css = [
        'css/site.css',
        'css/owl.carousel.css',
        'css/style.css',
        'css/jquery-ui.css',
        'css/admin.css',
        'css/vacancy.css',
        'css/responsive.css',
        'css/form-reg.css',
        'css/raiting.css',
        'css/jquery-ui.css',
        'css/index.css',
        'css/view.css',

    ];
    public $js = [
        'js/jquery-ui.js',
        'js/owl.carousel.min.js',
        'https://code.jquery.com/ui/1.12.1/jquery-ui.js',
        'js/jquery.sticky.js',
        'js/jquery.easing.1.3.min.js',
        'js/main.js',
        'js/crop.js',
        'js/croppie.js'
    ];
}
