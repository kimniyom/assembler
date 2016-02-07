<?php

use yii\helpers\Url;

/* @var $this yii\web\View */
$this->title = 'ผลงานทั้งหมด' . $portfolio_id;
$this->params['breadcrumbs'][] = ['label' => 'ผลงานทั้งหมด', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<!--[if gte IE 7]><!-->
<!--
<link rel="stylesheet" media="screen, projection" href="https://d13yacurqjgara.cloudfront.net/assets/master-8b6cff77670d4e325d704b907284a82d.css" />
-->
<div style=" text-align: center;">
    <ol class="dribbbles group" style="padding-left: 0px;">
        <?php for ($i = 0; $i <= 10; $i++): ?>
            <li id="screenshot-<?php echo $i; ?>" class="col-lg-3 col-md-4 col-sm-6" style=" margin-bottom: 10px;">
                <div class="dribbble">
                    <div class="dribbble-shot">
                        <div class="dribbble-img">
                            <a class="dribbble-link" href="/shots/2166663-Retinabbble-Chrome-extension-for-dribbble">
                                <div data-picture data-alt="Retinabbble - Chrome extension for dribbble">
                                    <img src="<?php echo Url::to('web/themes/Even/img/hero-img.png') ?>"/>
                                </div>
                            </a>
                            <a class="dribbble-over" href="#">    
                                <h4>ชื่อผลงาน ทดสอบเว็บไซต์ Assembler</h4>
                            </a>
                        </div>
                        <div class="btn btn-primary">รายละเอียด</div>
                        <div class="btn btn-warning"><i class="fa fa-edit"></i> แก้ไข</div>
                        <div class="btn btn-danger"><i class="fa fa-trash"></i> ลบ</div>
                    </div>
                </div>
            </li>
        <?php endfor; ?>

    </ol>
</div>






