<style type="text/css">
    .dp-highlighter{}
    .dp-highlighter > ol{ background: #e7e5dc; border: #e7e5dc solid 1px;}
    .dp-highlighter > ol .alt{ background: #FFF;}
    .dp-highlighter > ol > li { border-left: solid 3px #6ce26c; background: #f8f8f8;}
    .dp-highlighter > ol > li .string{ color: #0000cc;}

</style>
<?php

use yii\helpers\Url;

$this->title = $page['id'];
$this->params['breadcrumbs'][] = ['label' => 'หมวด', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $category['blog_category'], 'url' => ['blog_page', 'category_id' => $category['id']]];
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="well" style=" background: #FFF;">
    <div style=" float: right">
        <a href="<?php echo Url::to(['edit_blog', 'id' => $page['id'], 'category_id' => $category['id']]) ?>">
            <div class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i> แก้ไข</div>
        </a>
        <div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> ลบ</div>
    </div>
    <h1 style=" color: #6ce26c;">
        <i class="fa fa-bookmark"></i>
        <?php echo $page['title']; ?></h1>
    <br/>
    <?php echo $page['detail']; ?>
</div>

<?php
$this->registerJs(
        "
            $('.well img').addClass('img-responsive');
        "
);
?>
