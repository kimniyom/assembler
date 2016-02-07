<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\assets\BackendAsset;
use app\assets\UploadifyAsset;
use app\models\Menu;
use yii\web\Session;

/* @var $this \yii\web\View */
/* @var $content string */
AppAsset::register($this);
BackendAsset::register($this);
UploadifyAsset::register($this);
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

    <body class="skin-blue">
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
                                    <i class="fa fa-envelope-o"></i>
                                    <span class="label label-success">4</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="header">You have 4 messages</li>
                                    <li>
                                        <!-- inner menu: contains the actual data -->
                                        <ul class="menu">
                                            <li><!-- start message -->
                                                <a href="#">
                                                    <div class="pull-left">
                                                        <img src="<?php echo Url::to('@web/web/themes/AdminLTE2/dist/img/user2-160x160.jpg') ?>" class="img-circle" alt="User Image"/>
                                                    </div>
                                                    <h4>
                                                        Support Team
                                                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                                    </h4>
                                                    <p>Why not buy a new awesome theme?</p>
                                                </a>
                                            </li><!-- end message -->
                                            <li>
                                                <a href="#">
                                                    <div class="pull-left">
                                                        <img src="<?php echo Url::to('@web/web/themes/AdminLTE2/dist/img/user3-128x128.jpg') ?>" class="img-circle" alt="user image"/>
                                                    </div>
                                                    <h4>
                                                        AdminLTE Design Team
                                                        <small><i class="fa fa-clock-o"></i> 2 hours</small>
                                                    </h4>
                                                    <p>Why not buy a new awesome theme?</p>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <div class="pull-left">
                                                        <img src="<?php echo Url::to('@web/web/themes/AdminLTE2/dist/img/user4-128x128.jpg') ?>" class="img-circle" alt="user image"/>
                                                    </div>
                                                    <h4>
                                                        Developers
                                                        <small><i class="fa fa-clock-o"></i> Today</small>
                                                    </h4>
                                                    <p>Why not buy a new awesome theme?</p>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <div class="pull-left">
                                                        <img src="<?php echo Url::to('@web/web/themes/AdminLTE2/dist/img/user3-128x128.jpg') ?>" class="img-circle" alt="user image"/>
                                                    </div>
                                                    <h4>
                                                        Sales Department
                                                        <small><i class="fa fa-clock-o"></i> Yesterday</small>
                                                    </h4>
                                                    <p>Why not buy a new awesome theme?</p>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <div class="pull-left">
                                                        <img src="<?php echo Url::to('@web/web/themes/AdminLTE2/dist/img/user4-128x128.jpg') ?>" class="img-circle" alt="user image"/>
                                                    </div>
                                                    <h4>
                                                        Reviewers
                                                        <small><i class="fa fa-clock-o"></i> 2 days</small>
                                                    </h4>
                                                    <p>Why not buy a new awesome theme?</p>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="footer"><a href="#">See All Messages</a></li>
                                </ul>
                            </li>
                            <!-- Notifications: style can be found in dropdown.less -->
                            <li class="dropdown notifications-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-bell-o"></i>
                                    <span class="label label-warning">10</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="header">You have 10 notifications</li>
                                    <li>
                                        <!-- inner menu: contains the actual data -->
                                        <ul class="menu">
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-users text-aqua"></i> 5 new members joined today
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the page and may cause design problems
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-users text-red"></i> 5 new members joined
                                                </a>
                                            </li>

                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-user text-red"></i> You changed your username
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="footer"><a href="#">View all</a></li>
                                </ul>
                            </li>
                            <!-- Tasks: style can be found in dropdown.less -->
                            <li class="dropdown tasks-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-flag-o"></i>
                                    <span class="label label-danger">9</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="header">You have 9 tasks</li>
                                    <li>
                                        <!-- inner menu: contains the actual data -->
                                        <ul class="menu">
                                            <li><!-- Task item -->
                                                <a href="#">
                                                    <h3>
                                                        Design some buttons
                                                        <small class="pull-right">20%</small>
                                                    </h3>
                                                    <div class="progress xs">
                                                        <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                            <span class="sr-only">20% Complete</span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li><!-- end task item -->
                                            <li><!-- Task item -->
                                                <a href="#">
                                                    <h3>
                                                        Create a nice theme
                                                        <small class="pull-right">40%</small>
                                                    </h3>
                                                    <div class="progress xs">
                                                        <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                            <span class="sr-only">40% Complete</span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li><!-- end task item -->
                                            <li><!-- Task item -->
                                                <a href="#">
                                                    <h3>
                                                        Some task I need to do
                                                        <small class="pull-right">60%</small>
                                                    </h3>
                                                    <div class="progress xs">
                                                        <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                            <span class="sr-only">60% Complete</span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li><!-- end task item -->
                                            <li><!-- Task item -->
                                                <a href="#">
                                                    <h3>
                                                        Make beautiful transitions
                                                        <small class="pull-right">80%</small>
                                                    </h3>
                                                    <div class="progress xs">
                                                        <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                            <span class="sr-only">80% Complete</span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li><!-- end task item -->
                                        </ul>
                                    </li>
                                    <li class="footer">
                                        <a href="#">View all tasks</a>
                                    </li>
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
                        <li class="header">Menu Assembler</li>
                        <?php
                        $Menu = new Menu();
                        $Menu_As = $Menu->GetmenuAll();
                        $i = 0;
                        foreach ($Menu_As as $menus):
                            $i++;
                            if ($i == 1) {
                                $class = "active treeview";
                            } else {
                                $class = "treeview";
                            }
                            ?>
                            <li class="<?php echo $class; ?>">
                                <a href="<?php echo Yii::$app->urlManager->createUrl($menus['menu_url']) ?>">
                                    <i class="fa fa-circle-o text-danger"></i> <span><?php echo $menus['menu_name'] ?></span>
                                </a>
                            </li>
                        <?php endforeach; ?>  
                    </ul>
                    <a href="#" class="btn" style=" border-radius: 0px; width: 100%;" onclick="dialog_add_menu()">
                        <i class="fa fa-plus"></i> <span>เพิ่มเมนู</span>
                    </a>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Assembler Admin
                        <small>Version 1.0</small>
                    </h1>
                    <?=
                    Breadcrumbs::widget([
                        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                    ])
                    ?>
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
                + "<center><img src='<?php echo Url::base(); ?>/upload/" + img_name + "' class=\"img-responsive img-thumbnail\"/></center>";
        $("#img_name").html(link);
        $("#dialog_images").modal();
    }
</script>
