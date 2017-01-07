<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/jquery-scrollbar.css',
        'css/bootstrap-grid-3.3.1.min.css',
        'css/font-awesome.min.css',
        'css/owl.carousel.css',
        'css/fonts.css',
        'css/main.css',
        'css/media.css',
    ];
    public $js = [
        'js/jquery-1.11.1.min.js',
        'js/jquery.scrollbar.min.js',
        'js/owl.carousel.min.js',
	    'js/common.js',
    ];
    public $depends = [
    ];
}
