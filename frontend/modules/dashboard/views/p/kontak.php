<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Contact';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <section id="contact">
        <div class="container">
            <!-- footer Content Inner -->
            <div class="row margin-lg">
                <div class="col-lg-12 text-center margin-lg no-margin-top">
                    <span class="section-dark section-title">contact</span>
                </div>
                <div class="col-lg-12 margin-lg no-margin-top">
                    <form id="contactForm" action="php/contact-form.php" method="POST">
                        <div class="contact-form-inner text-left">
                            <div class="alert alert-success hidden" id="contactSuccess">
                                <strong>Success!</strong> Your message has been sent to us.
                            </div>

                            <div class="alert alert-danger hidden" id="contactError">
                                <strong>Error!</strong> There was an error sending your message.
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group input-fields">
                                        <input type="text" value="" data-msg-required="Please enter your name." placeholder="Your Name" maxlength="100" class="form-control fc-contact" name="name" id="name" required>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group input-fields">
                                        <input type="email" value="" data-msg-required="Please enter your email address." placeholder="Your Email" data-msg-email="Please enter a valid email address." maxlength="100" class="form-control fc-contact" name="email" id="email" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group input-fields">
                                        <textarea maxlength="5000" data-msg-required="Please enter your message." placeholder="Your Message Here..." rows="10" class="form-control fc-contact" name="message" id="message" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
   
                                    <input type="submit" value="Send Message" class="btn btn-submit btn-block btn-i-sm uppercase txt-sm" data-loading-text="Loading...">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /footer Content Inner -->
        </div>
    </section>
</div>
