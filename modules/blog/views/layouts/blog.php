<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\assets\BackendAsset;
use app\models\Blog;
use yii\web\Session;

/* @var $this \yii\web\View */
/* @var $content string */
AppAsset::register($this);
BackendAsset::register($this);
$Menu = new Blog();
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

    <body class="skin-green layout-boxed">
        <?php $this->beginBody() ?>
        <div class="wrapper">

            <header class="main-header">
                <!-- Logo -->
                <a href="<?php echo Yii::$app->urlManager->createUrl('site') ?>" class="logo">
                    <img src="<?php echo Url::to('@web/images/A_LOGO_W_full.png') ?>" height="50"/>
                    <!--
                    <b>Admin</b> Assembler</a>
                    -->
                </a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top" role="navigation">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>
                    <!-- Navbar Right Menu -->
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <!-- Messages: style can be found in dropdown.less-->
                            <li class="dropdown messages-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="glyphicon glyphicon-menu-hamburger"></i>
                                    CATEGORY
                                </a>
                                <ul class="dropdown-menu">
                                    <?php
                                    $cat = $Menu->GetCategoryAll();
                                    foreach ($cat as $cats):
                                        ?>
                                        <li><!-- start message -->
                                            <a href="<?php echo Yii::$app->urlManager->createUrl(['blog/blog/blog_page', 'category_id' => $cats['id']]) ?>" 
                                               style=" color: #000;">
                                                <p style=" padding-top: 10px;"><?php echo $cats['blog_category'] ?></p>
                                            </a>
                                        </li><!-- end message --> 
                                    <?php endforeach; ?>
                                </ul>
                            </li>

                            <!-- User Account: style can be found in dropdown.less -->
                            <li class="dropdown user user-menu">
                                 <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="<?php echo Url::to('@web/web/themes/AdminLTE2/dist/img/user2-160x160.jpg') ?>" class="user-image" alt="User Image"/>
                                    <span class="hidden-xs">
                                        <?php echo Yii::$app->session['assembler']['name'] . ' ' . Yii::$app->session['assembler']['lname'] ?>
                                    </span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header">
                                        <img src="<?php echo Url::to('@web/web/themes/AdminLTE2/dist/img/user2-160x160.jpg') ?>" class="img-circle" alt="User Image" />
                                        <p>
                                            <?php echo Yii::$app->session['assembler']['name'] . ' ' . Yii::$app->session['assembler']['lname'] ?> - Web Developer
                                            <small><?php echo date('Y-m-d'); ?></small>
                                        </p>
                                    </li>
                                    <!-- Menu Body -->
                                    <li class="user-body">
                                        <div class="col-xs-12 text-center">
                                            <a href="#">Assembler</a>
                                        </div>
                                    </li>
                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <a href="#" class="btn btn-default btn-flat">Profile</a>
                                        </div>
                                        <div class="pull-right">
                                            <a href="<?php echo Yii::$app->urlManager->createUrl('backend/logout') ?>" class="btn btn-default btn-flat">Sign out</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="<?php echo Url::to('@web/web/themes/AdminLTE2/dist/img/user2-160x160.jpg') ?>" class="img-circle" alt="User Image" />
                        </div>
                        <div class="pull-left info">
                            <p><?php echo Yii::$app->session['assembler']['name'] . ' ' . Yii::$app->session['assembler']['lname'] ?></p>

                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    <!-- search form -->
                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search..."/>
                            <span class="input-group-btn">
                                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="header">หมวดบทความ</li>
                        <?php
                        $Menu_As = $Menu->GetCategoryAll();
                        $i = 0;
                        foreach ($Menu_As as $menus):
                            $i++;
                            if ($i == 1) {
                                $class = "active treeview";
                            } else {
                                $class = "active treeview";
                            }
                            ?>

                            <li class="<?php echo $class; ?>">
                                <a href="#">
                                    <i class="fa fa-angle-left pull-right"></i>
                                    <span><?php echo $menus['blog_category'] ?></span>
                                </a>
                                <ul class="treeview-menu">
                                    <?php
                                    $Submenu = $Menu->GetBlogPageByCategoryId($menus['id']);
                                    foreach ($Submenu as $sub):
                                        ?>
                                        <li>
                                            <a href="<?php echo Yii::$app->urlManager->createUrl(['blog/blog/blog_detail', 'id' => $sub['id'], 'category_id' => $menus['id']]) ?>"><i class="fa fa-angle-right"></i> <?php echo $sub['title'] ?></a>
                                        </li> 
                                    <?php endforeach; ?>
                                </ul>
                            </li>
                        <?php endforeach; ?>  
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h4>
                        <?=
                        Breadcrumbs::widget([
                            'homeLink' => [
                                'label' => 'หน้าแรก',
                                'url' => Yii::$app->urlManager->createUrl(['blog']),
                            ],
                            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                        ])
                        ?>
                    </h4>
                </section>

                <!-- Main content -->
                <section class="content">
                    <?php echo $content; ?>
                </section><!-- /.content -->
            </div><!-- /.content-wrapper -->

            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    <b>Version</b> 2.0
                </div>
                <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved.
            </footer>

        </div><!-- ./wrapper -->
        <?php
        if (YII_DEBUG) {
            $this->off(\yii\web\View::EVENT_END_BODY, [\yii\debug\Module::getInstance(), 'renderToolbar']);
        }
        ?>
        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>

<!-- Modal Add Menu -->

<div class="modal modal-primary" id="dialog_add_menu" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><span class=" glyphicon glyphicon-list"></span> เพิ่มเมนู</h4>
            </div>
            <div class="modal-body">
                <label>ชื่อเมนู</label>
                <input type="text" id="menu_name" name="menu_name" class=" form-control"/><br/>
                <label>Url</label>
                <input type="text" id="menu_url" name="menu_url" class=" form-control"/>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-outline" onclick="save_menu()">บันทึก</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- LiteBox Images -->
<div class="modal" id="dialog_images" role="dialog" style=" background: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style=" background: none;">
            <div class="modal-body">
                <div id="img_name"></div>
            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script type="text/javascript">
    function dialog_add_menu() {
        $("#dialog_add_menu").modal();
    }

    function save_menu() {
        var url = "<?php echo Yii::$app->urlManager->createUrl('backend/save_menu') ?>";
        var menu_name = $("#menu_name").val();
        var menu_url = $("#menu_url").val();
        var data = {menu_name: menu_name, menu_url: menu_url};
        if (menu_name == '' || menu_url == '') {
            alert("กรอกข้อมูลไม่ครบ ...");
            return false;
        }

        $.post(url, data, function (success) {
            window.location.reload();
        });
    }

    function dialog_images(img_name) {
        var link = "<button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">"
                + "<span class=\"glyphicon glyphicon-remove\" style=\" color: #FFF;\"></span></button>"
                + "<center><img src='<?php echo Url::base(); ?>      /upload/" + img_name + "' class=\"img-responsive img-thumbnail\"/></center>";
        $("#img_name").html(link);
        $("#dialog_images").modal();
    }
</script>
