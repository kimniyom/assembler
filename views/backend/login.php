<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\assets\BackendAsset;

/* @var $this \yii\web\View */
/* @var $content string */
//AppAsset::register($this);
BackendAsset::register($this);
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

    <body class="login-page">
        <?php $this->beginBody() ?>

        <div class="login-box">
            <div class="login-logo">
                <a href="../../index2.html"><b>Admin</b>Assembler</a>
            </div><!-- /.login-logo -->
            <div class="login-box-body">
                <p class="login-box-msg">Sign in to start your session</p>

                <div class="form-group has-feedback">
                    <input type="text" id="username" name="username" class="form-control" placeholder="Username"/>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" id="password" name="password" class="form-control" placeholder="Password"/>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-8">    
                        <div class="checkbox icheck">

                        </div>                        
                    </div><!-- /.col -->
                    <div class="col-xs-4">
                        <button type="button" class="btn btn-primary btn-block btn-flat" onclick="login();">Sign In</button>
                    </div><!-- /.col -->
                </div>

            </div><!-- /.login-box-body -->
        </div><!-- /.login-box -->


        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>


<script type="text/javascript">

    function login() {
        var url = "<?php echo Yii::$app->urlManager->createUrl('backend/login') ?>";
        var username = $("#username").val();
        var password = $("#password").val();
        var data = {username: username, password: password};
        if (username == '' || password == '') {
            alert("กรอกข้อมูลไม่ครบ ...");
            return false;
        }

        $.post(url, data, function (success) {
            if (success == '0') {
                window.location.reload();
            } else {
                alert("Longin Wrong ...");
                window.location.reload();
            }

        });
    }
</script>

