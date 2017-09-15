<?php
/* @var $this yii\web\View */

$this->title = 'HealthFull';

use frontend\assets\AppAsset;
use yii\bootstrap\Html;
$assets = AppAsset::register($this);
$baseUrl = $assets->baseUrl;
?>
<!-- Landing section -->
<section id="landing">
    <div class="container">
        <!-- Main Content Inner -->
        <div class="row margin-lg no-margin-bottom">
            <div class="col-lg-4 col-md-4 col-sm-6 visible-lg visible-md visible-sm">
                <!--Device Container-->
                <img src="<?= $baseUrl; ?>/img/landing/landing-app-top.png" class="img-responsive" alt="">
                <!--/Device Container-->
            </div>
            <!--Main landing content-->
            <div class="landing-content col-lg-8 col-md-8 col-sm-6 col-xs-12">
                <div class="landing-heading">
                    <span class="txt-xlg"> <font color="white"> Welcome to </span><span class="txt-xlg txt-strong">HealthFull</span>  </font  >
                </div>
                <div class="landing-text">
                    <p class="txt-md"> HealthFull is web based application that allow user to maintain our health condition
                        from your daily report. Healthfull have some feature like  life style tracking, statistic report, health report and others.
                </div>
                <div class="app-availability no-padding">
                    <ul class="landing-available-on list-unstyled block">
                        <li>
                            <span class="landing-availability txt-sm    ">Available for</span>
                        </li>
                        <li>
                            <i class="fa fa-tablet"></i>
                        </li>
                        <li>
                            <i class="fa fa-mobile-phone"></i>
                        </li>
                    </ul>
                    
                </div>
            </div>
            <!--/Main landing content-->
        </div>
        <!-- /Main Content Inner -->
    </div>      
</section>
<!-- /Landing section -->
<!-- Features section -->
<section id="features">
    <div class="container">
        <!-- Features Content Inner -->
        <div class="row margin-lg text-center">
            <div class="col-lg-12 text-center margin-lg no-margin-top">
                <span class="section-light section-title">Web Application</span>
                <span class="sub-title-bottom">Main Feature of the apps</span>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="app-feature-box">
                    <div class="icon-box">
                        <i class="fa fa-male"></i>
                    </div>
                    <h3><?= Html::a("<font color='#000000'>Pola Makan</font>", ['/pm/pola-makan/index','style'=>'success']) ?></h3>
                    <p>Monitor your daily consumption</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 cgol-xs-12">
                <div class="app-feature-box">
                    <div class="icon-box">
                        <i class="fa fa-line-chart"></i>
                    </div>
                    <h3><?= Html::a("<font color='#000000'>Statistik Report</font>", ['/pm/pola-makan/statistik','style'=>'success']) ?></h3>
                    <p>Get your statistic daily or weekly</p> 
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 cgol-xs-12">
                <div class="app-feature-box">
                    <div class="icon-box">
                        <i class="fa fa-heart"></i>
                    </div>
                    <h3><?= Html::a("<font color='#000000'>Health Report</font>", ['/pm/pola-makan/export','style'=>'success']) ?></h3>
                    <p>Know your diseases and how to handle it</p> 
                </div>
            </div>
        
        </div>
        
        <!-- /Features Content Inner -->
    </div>
</section>

