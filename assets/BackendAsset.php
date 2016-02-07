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
class BackendAsset extends AssetBundle {

    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'web/themes/AdminLTE2/bootstrap/css/bootstrap.min.css',
        'web/css/font-awesome-4.3.0/css/font-awesome.min.css',
        'web/themes/AdminLTE2/dist/css/AdminLTE.min.css',
        'web/themes/AdminLTE2/dist/css/skins/skin-red.min.css',
        'web/themes/AdminLTE2/dist/css/skins/skin-green.min.css',
        'web/themes/AdminLTE2/dist/css/skins/skin-blue.min.css',
        'web/themes/AdminLTE2/plugins/daterangepicker/daterangepicker-bs3.css',
        'web/themes/AdminLTE2/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css',
        'web/themes/AdminLTE2/plugins/datatables/dataTables.bootstrap.css',
        'web/themes/Even/css/folio.css',
    ];
    public $js = [

        'web/themes/AdminLTE2/plugins/datatables/jquery.dataTables.js',
        'web/themes/AdminLTE2/plugins/datatables/dataTables.bootstrap.js',
        'web/themes/AdminLTE2/bootstrap/js/bootstrap.min.js',
        'web/themes/AdminLTE2/plugins/fastclick/fastclick.min.js',
        'web/themes/AdminLTE2/dist/js/app.min.js',
        'web/themes/AdminLTE2/plugins/sparkline/jquery.sparkline.min.js',
        'web/themes/AdminLTE2/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js',
        'web/themes/AdminLTE2/plugins/jvectormap/jquery-jvectormap-world-mill-en.js',
        'web/themes/AdminLTE2/plugins/daterangepicker/daterangepicker.js',
        'web/themes/AdminLTE2/plugins/datepicker/bootstrap-datepicker.js',
        'web/themes/AdminLTE2/plugins/iCheck/icheck.min.js',
        'web/themes/AdminLTE2/plugins/slimScroll/jquery.slimscroll.min.js',
        'web/themes/AdminLTE2/plugins/chartjs/Chart.min.js',
        //'web/assets/ckeditor/ckeditor.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

}
