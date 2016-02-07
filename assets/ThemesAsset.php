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
class ThemesAsset extends AssetBundle {

    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'web/themes/Even/css/preloader.css',
        'web/themes/Even/css/style.css',
        'web/themes/Even/bootstrap/css/bootstrap.min.css',
        'web/themes/Even/css/responsive.css',
        'web/themes/Even/css/animate.css',
        'web/themes/Even/css/simple-line-icons.css',
       'web/themes/Even/css/folio.css',
    ];
    public $js = [
        'web/themes/Even/js/jquery.nicescroll.min.js',
        'web/themes/Even/js/jquery.jribbble-1.0.1.ugly.js',
        'web/themes/Even/bootstrap/js/bootstrap.min.js',
        'web/themes/Even/js/drifolio.js',
        'web/themes/Even/js/wow.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

}
