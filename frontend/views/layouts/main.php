<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

$asset = AppAsset::register($this);
$baseUrl = $asset->baseUrl;
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <Link rel="shortcut icon" href="/fav.png" height="20" width="20">
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>
        <?php $this->beginBody() ?>

        <nav id="infinityNav" class="navmenu menu-side navmenu-default navmenu-fixed-left offcanvas" role="navigation">
            <ul class="list-unstyled push-menu-items pm-title text-center">
                <li class="push-menu-title">
                    <span>HEALTH FULL</span>
                </li>
            </ul>
            <ul class="list-unstyled push-menu-items push-menu-social text-center">

                <li class="push-menu-social-item">
                    <a href="#" class="cbutton cbutton--effect-ivana">
                        <i class="cbutton__icon fa fa-facebook"></i>
                    </a>
                </li>
                <li class="push-menu-social-item">
                    <a href="#" class="cbutton cbutton--effect-ivana">
                        <i class="cbutton__icon fa fa-google-plus"></i>
                    </a>
                </li>

            </ul>
            <div id="push-menu-nav">
                <ul class="list-unstyled push-menu-items text-center">
                    <?php
                    echo '<li class="push-menu-item">';
                    echo Html::a('Home', ['/dashboard/p']);
                    echo '</li>';
                    echo '<li class="push-menu-item">';
                    echo Html::a('Fitur`', ['/dashboard/p/fitur']);
                    echo '</li>';
                    echo '<li class="push-menu-item">';
                    echo Html::a('Tentang Kami', ['/dashboard/p/tentang']);
                    echo '</li>';
                    echo '<li class="push-menu-item">';
                    echo Html::a('Kontak', ['/dashboard/p/kontak']);
                    echo '</li>';
                    echo '<li class="push-menu-item">';
                    echo Html::a('Pola Makan', ['/pm/pola-makan/index']);
                    echo '</li>';
//                    if ((Mimin::checkRoute($this->context->id . 'admin'))) {
//                        echo '<li class="push-menu-item">';
//                        echo Html::a('Adminstrator', ['/administrator/user']);
//                        echo '</li>';
//                        echo '<li class="push-menu-item">';
//                        echo Html::a('Gereja', ['/ribdh/gereja/']);
//                        echo '</li>';
//                        echo '<li class="push-menu-item">';
//                        echo Html::a('User', ['/user']);
//                        echo '</li>';
//                        echo '<li class="push-menu-item">';
//                        echo Html::a('Pendeta', ['/pndt/pendeta']);
//                        echo '</li>';
//                        echo '<li class="push-menu-item">';
//                        echo Html::a('Konten Ibadah', ['/tataibadah/konten-ibadah']);
//                        echo '</li>';
//                    }
                    if (!Yii::$app->user->isGuest) {
                        echo '<li class="push-menu-item">';
                        echo Html::a('Profile', ['/u/people/profil','q'=>Yii::$app->user->identity->id]);
                        echo '</li>';
                        echo '<li class="push-menu-item">';
                        echo Html::a('Logout(' . Yii::$app->user->identity->username . ')', ['/site/logout'], [
                            'data' => [
                                'confirm' => 'Anda Yakin untuk keluar?',
                                'method' => 'post',
                            ], 
                        ]);
                        echo '</li>';
                    } else{
                        echo '<li class="push-menu-item">';
                        echo Html::a('Register', ['/u/people/daftar']);
                        echo '</li>';
                        echo '<li class="push-menu-item">';
                        echo Html::a('Login', ['/site/login']);
                        echo '</li>';
                    }
                    ?>
                </ul>
            </div>
            
        </nav>
        <div class="push-menu-container">
            <div class="navbar navbar-default navbar-fixed-top push-wrapper">
                <div class="push-menu-button" data-toggle="offcanvas" data-target="#infinityNav" data-canvas="body">
                    <button type="button" class="navbar-toggle">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <span class="menu-text">Menu</span>
                </div>
            </div>
        </div>

        <?= $content ?>

        <!-- Footer start -->
        <footer id="footer">
            <div class="container">
                <!-- footer Content Inner -->
                <div class="row margin-sm">
                    <div class="col-lg-12 text-center">
                        <ul class="list-unstyled footer-items footer-social no-margin">
                            <li class="footer-social-item">
                                <a href="#" class="cbutton cbutton--effect-ivana">
                                    <i class="cbutton__icon fa fa-facebook"></i>
                                </a>
                            </li>
                            <li class="footer-social-item">
                                <a href="#" class="cbutton cbutton--effect-ivana">
                                    <i class="cbutton__icon fa fa-google-plus"></i>
                                </a>
                            </li>
                        </ul>
                        <span>Copyright © 2017 <a href="http://OnanOnan.com">OnanOnan.com</a></span>
                    </div>
                </div>
                <!-- /footer Content Inner -->
            </div>
        </footer>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
