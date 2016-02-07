<?php

use yii\helpers\Url;

/* @var $this yii\web\View */
$this->title = 'หมวด';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="btn btn-success" onclick="dialog_add_category();">
    <i class="fa fa-book"></i>
    <i class="fa fa-plus"></i>
    สร้างหมวดบทความ
</div><br/><br/>

<div class="row">
    <?php
    $Blogpage = new \app\models\Blog();

    $i = 0;
    foreach ($category as $rs): $i++;
        $total = $Blogpage->CountBlogPage($rs['id']);
        ?>
        <div class="col-lg-6 col-xs-6">
            <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="fa fa-book"></i></span>
                <div class="info-box-content">
                    <span class="info-box-number"><?php echo $rs['blog_category'] ?></span>
                    <a href="<?php echo Yii::$app->urlManager->createUrl(['backend_blog/blog_page', 'category_id' => $rs['id']]); ?>">
                        <div class="btn btn-info btn-sm">จำนวน <div class=" badge"> <?php echo $total; ?> </div></div></a>
                    <div class="btn btn-warning btn-sm" 
                         onclick="dialog_edit_category('<?php echo $rs['id'] ?>', '<?php echo $rs['blog_category'] ?>')">แก้ไข</div>
                    <div class="btn btn-danger btn-sm">ลบ</div>
                </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
        </div><!-- ./col -->
    <?php endforeach; ?>  
</div>


<!-- Modal Add portfolio -->
<div class="modal modal-success" id="dialog_add_category" role="dialog">
    <div class="modal-dialog modal-lg">
        <form>
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><span class=" glyphicon glyphicon-upload"></span> หมวดบทความ</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="id" name="id"/>
                    <div id="queue"></div>
                    <label>หมวด</label>
                    <input type="text" id="blog_category" name="blog_category" class=" form-control"/><br/>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                    <button type="button" id="btn_save" class="btn btn-outline" onclick="save_category()">บันทึก</button>
                    <button type="button" id="btn_edit" class="btn btn-outline" onclick="edit_category()">แก้ไข</button>
                </div>
            </div><!-- /.modal-content -->
        </form>
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script type="text/javascript">
    function dialog_add_category() {
        $("#btn_save").show();
        $("#btn_edit").hide();
        $("#blog_category").val('');
        $("#detail").val('');
        $("#dialog_add_category").modal();
    }

    function dialog_edit_category(id, category) {
        $("#btn_save").hide();
        $("#btn_edit").show();
        $("#dialog_add_category").modal();
        $("#id").val(id);
        $("#blog_category").val(category);
    }

    function save_category() {
        var url = "<?php echo Yii::$app->urlManager->createUrl('backend_blog/save_category') ?>";
        var blog_category = $("#blog_category").val();
        var data = {blog_category: blog_category};
        if (blog_category == '') {
            alert("กรอกข้อมูลไม่ครบ ...");
            return false;
        }

        $.post(url, data, function (datas) {
            window.location.reload();
        });
    }

    function edit_category() {
        var url = "<?php echo Yii::$app->urlManager->createUrl('backend_blog/edit_category') ?>";
        var id = $("#id").val();
        var blog_category = $("#blog_category").val();
        var data = {id: id, blog_category: blog_category};
        if (blog_category == '') {
            alert("กรอกข้อมูลไม่ครบ ...");
            return false;
        }

        $.post(url, data, function (datas) {
            window.location.reload();
        });
    }
</script>