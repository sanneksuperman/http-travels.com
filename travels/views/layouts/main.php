<?php
/* @var $this \yii\web\View */
/* @var $content string */
use app\assets\PublicAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
PublicAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<nav class="navbar main-menu navbar-default">
    <div class="container">
        <div class="menu-content">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/"><img src="/public/images/travel-logo.png" width="110px"  alt=""></a>
            </div>


            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                <ul class="nav navbar-nav text-uppercase">
                    <li><a data-toggle="dropdown" class="dropdown-toggle" href="/">Home</a>

                    </li>
                </ul>
                <div class="i_con">
                    <ul class="nav navbar-nav text-uppercase">
                        <?php if(Yii::$app->user->isGuest):?>
                            <li><a href="<?= Url::toRoute(['auth/login'])?>">Login</a></li>
                            <li><a href="<?= Url::toRoute(['auth/signup'])?>">Register</a></li>
                        <?php else: ?>
                            <?= Html::beginForm(['/auth/logout'], 'post')
                            . Html::submitButton(
                                'Logout (' . Yii::$app->user->identity->name . ')',
                                ['class' => 'btn btn-link logout', 'style'=>"padding-top:10px;"]
                            )
                            . Html::endForm() ?>
                        <?php endif;?>
                    </ul>
                </div>

            </div>
            <!-- /.navbar-collapse -->
        </div>
    </div>
    <!-- /.container-fluid -->
</nav>


<?= $content ?>


<footer class="footer-widget-section">
    <div class="container">
        <div class="row">

            <div class="col-md-4">
                <aside class="footer-widget">
                  <h3 class="widget-title text-uppercase">contact Info</h3>
                    <div class="about-img"><img src="/public/images/logo2.png" alt=""></div>

                        <p> Adress: Ukraine, Sumy str. Illinska 18/2</p>

                        <p> Phone: +38 (093) 179-93-87</p>

                        <p> Skype: sannek197</p>

                        <p> Facebook: Aleksandr Nizovoj</p>

                        <p>Site: travels.com</p>

                </aside>
            </div>

            <div class="col-md-4">
                <aside class="footer-widget">
                  <h3 class="widget-title text-uppercase">about us</h3>
                    <div class="about-img"><img src="/public/images/logo2.png" alt=""></div>

                        <p> Our blog has many interesting travel articles.
                            Articles are divided into categories. By selecting
                            a separate category, you can see a list of its articles.
                            You can view all existing articles in this blog. And if
                            you are a registered user, you can also leave comments.</p>

                </aside>
            </div>

            <div class="col-md-4">
                <aside class="footer-widget">
                  <h3 class="widget-title text-uppercase">Travel around the world</h3>
                    <div class="about-img"><img src="/public/images/logo2.png" alt=""></div>
                    <div>
                        <a href="#" class="text-uppercase"><img src="/public/images/map.jpg" width="200px"></a>
                    </div>
                </aside>
            </div>

        </div>
    </div>
    <div class="footer-copy">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-center">&copy; 2019 <a href="#">Travels, </a> by <a href="#">Sannek</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
