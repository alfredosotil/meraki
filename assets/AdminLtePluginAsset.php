<?php
/**
 * @see      http://www.yiiframework.com/
 *
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license   http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 *
 * @since  2.0
 */
class AdminLtePluginAsset extends AssetBundle
{
    public $sourcePath = '@vendor/almasaeed2010/adminlte/plugins';

    public $js = [
        'bootstrap-slider/bootstrap-slider.js',
        'bootstrap-wysihtml5/bootstrap3-wysihtml5.all.js',
        'iCheck/icheck.js',
        'input-mask/jquery.inputmask.date.extensions.js',
        'input-mask/jquery.inputmask.extensions.js',
        'input-mask/jquery.inputmask.js',
        'input-mask/jquery.inputmask.numeric.extensions.js',
        'input-mask/jquery.inputmask.phone.extensions.js',
        'input-mask/jquery.inputmask.regex.extensions.js',
        'jQueryUI/jquery-ui.js',
        'jvectormap/jquery-jvectormap-1.2.2.min.js',
        'jvectormap/jquery-jvectormap-usa-en.js',
        'jvectormap/jquery-jvectormap-world-mill-en.js',
        'pace/pace.js',
        'timepicker/bootstrap-timepicker.js'
    ];

    public $css = [
        'bootstrap-slider/slider.css',
        'bootstrap-wysihtml5/bootstrap3-wysihtml5.css',
        'iCheck/all.css',
        'jvectormap/jquery-jvectormap-1.2.2.css',
        'pace/pace.css',
        'timepicker/bootstrap-timepicker.css'
        // more plugin CSS here
    ];

    public $depends = [
        'dmstr\web\AdminLteAsset',
    ];
}
