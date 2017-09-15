<?php
/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'HealthFull';

use frontend\assets\AppAsset;

$assets = AppAsset::register($this);
$baseUrl = $assets->baseUrl;
?>
<div class="site-about">
    <section id="testimonials">
        <div class="container">
            <!-- testimonials Content Inner -->
            <div class="row margin-lg text-center">
                <div class="col-lg-12 text-center margin-lg no-margin-top">
                    <span class="section-dark section-title">Team HealthFull</span>
                </div>
                <div class="col-lg-12">
                    <div id="app-testimonials-landing" class="owl-carousel owl-theme">
                        <!-- /testimonials item -->
                        <div class="item">
                            <div class="testimonial-box text-center">
                                <div class="testimonial-img">
                                    <img src="<?= $baseUrl; ?>/img/landing/team.png" class="img-responsive" alt="person">
                                </div>
                                <div class="testimonial-text margin-md">
                                    <p class="txt-md">We've just met</div>
                                <div class="testimonial-name">
                                    <span class="name uppercase txt-md">Team HealthFull</span>
                                    
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- /testimonials Content Inner -->
        </div>
    </section>
</div>
