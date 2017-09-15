<?php
/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Fitur';

use frontend\assets\AppAsset;

$assets = AppAsset::register($this);
$baseUrl = $assets->baseUrl;
?>
<div class="site-about">
    <section id="whyus" class="grey">
        <div class="container">
            <!-- Features Extra 1 Content Inner -->
            <div class="row margin-lg text-center">
                <div class="col-lg-12 text-center sub-title-margin">
                    <span class="sub-title-top">What is HealthFull ?</span>
                    <span class="sub-title-bottom">HealthFull is web based application that allow user to maintain our health condition
                        from your daily report. Healthfull have some feature like  life style tracking, statistic report, health report. You can
						also get Health, Doctor and Insurance suggestion.
                </span>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 visible-lg visible-md visible-sm">
                    <div class="overview-device-wrapper">
                        <img src="<?= $baseUrl; ?>/img/landing/landing-app-left-overview.png" class="img-responsive" alt="">
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 margin-lg">
                    <div class="feature-extra-box text-left">
                        <h2 class="overview-title">HealthFull, to elevate humanity and health concern </h2>
                        <p class="overview-text">The advantages of HealthFull <ul class="list-unstyled feature-extra-list">
                            <li>
                                <i class="fa fa-check"></i> Easy to use
                            </li>
                            <li>
                                <i class="fa fa-check"></i> Simple
                            </li>
                            <li>
                                <i class="fa fa-check"></i> Fast
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Features Extra 1 Content Inner -->
        </div>
    </section>

    <!-- /cta section -->
    <!-- Features Extra 2 section -->
    <section id="information">
        <div class="container">
            <!-- Features Extra 2 Content Inner -->
            <div class="row margin-lg text-center">
                <div class="col-lg-12 text-center sub-title-margin">
                    <span class="sub-title-top">Another Feature</span>
                    <span class="sub-title-bottom">Some interesting feature from HealthFul</span>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 margin-lg">
                    <div class="feature-extra-box text-left">
                        <ul class="list-unstyled feature-extra-list">
                            <li>
                                <i class="fa fa-phone"></i> Health Suggestion 
                            </li>
                            <li>
                                <i class="fa fa-thumbs-up"></i> Doctor Suggestion
                            </li>
                            <li>
                                <i class="fa fa-microphone"></i> Insurance Suggestion
                            </li>
                            <li>
                                <i class="fa fa-bookmark"></i> Tripotek
                            </li>
                            <li>
                                <i class="fa fa-sun-o"></i> Article
                            </li>
                            <li>
                                <i class="fa fa-paint-brush"></i>  Discussion
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 visible-lg visible-md visible-sm">
                    <div class="overview-device-wrapper">
                        <img src="<?= $baseUrl; ?>/img/landing/landing-app-right-overview.png" class="img-responsive" alt="">
                    </div>
                </div>
            </div>
            <!-- /Features Extra 2 Content Inner -->
        </div>
    </section>
</div>
