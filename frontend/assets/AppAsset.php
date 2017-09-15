<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $sourcePath = '@bower/infinity/';
    public $css = [
        //'css/site.css',
        'style.css',
        'custom.css',
        'css/animate.css',
        'css/owl.carousel.css',
        'css/owl.theme.css',
        'css/owl.transitions.css',
        'vendor/push-menu/css/jasny-bootstrap.min.css',
        'vendor/push-menu/css/push-menu.css',
        'vendor/animated-text/css/style.css',
        'vendor/lightbox/css/lightbox.css',
        'css/devices/style.css',
        'css/landing/landing.css',
        'css/fonts/font-awesome.css',
    ];

    public $js = [
        'js/bootstrap.min.js',
        'js/main.js',
        'js/owl.carousel.js',
        'js/modernizr.js',
        'js/wow.min.js',
        'js/jquery.validation.js',
        'js/contact.js',
        'js/landing/owl-landing.js',
        'vendor/push-menu/js/jasny-bootstrap.min.js',
        'vendor/animated-text/js/main.js',
        'vendor/lightbox/js/lightbox.min.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
    
}
