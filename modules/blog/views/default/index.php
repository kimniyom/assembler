<?php

use yii\helpers\Url;

$this->registerJs(
        "$('#blog_page').dataTable({
            'iDisplayLength': 10, // กำหนดค่า default ของจำนวน record 
        });"
);

?>
<div class="well" style=" background: #FFF;">

    <table id="blog_page" class="table table-striped table-hover table-bordered" style=" background: #FFF; font-size: 18px; font-weight: bold;">
        <thead>
            <tr>
                <th style=" display: none;"></th>
                <th>บทความ</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 0;
            foreach ($blog_page as $rs): $i++;
                ?>
                <tr>
                    <td style=" display: none;"><?php echo $i; ?></td>
                    <td>
                        <a href="<?php echo Url::to(['blog/blog_detail', 'id' => $rs['id'], 'category_id' => $rs['category_id']]) ?>">
                            <img src="<?php echo Url::to('@web/images/Blog-icon.png') ?>"/>
                            <?php echo $rs['title']; ?>
                            <span style=" font-size: 12px; color: #666666;">
                                <i class="fa fa-user"></i> โดย <?php echo $rs['username'] . ' ' . $rs['d_update'] ?> </span>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
