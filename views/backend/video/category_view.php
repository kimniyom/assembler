<?php

use yii\helpers\Url;

/* @var $this yii\web\View */
$this->title = 'หมวดวีดีโอ';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="btn btn-success" onclick="dialog_add_category();">
    <i class="fa fa-video-camera"></i>
    <i class="fa fa-plus"></i>
    สร้างหมวดวีดีโอ
</div><br/><br/>

<div class="row">
    <?php
    $video = new \app\models\Video();

    $i = 0;
    foreach ($category as $rs): $i++;
        $total = $video->CountVideoByCategory($rs['id']);
        ?>
        <div class="col-lg-6 col-xs-6">
            <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-video-camera"></i></span>
                <div class="info-box-content">
                    <span class="info-box-number"><?php echo $rs['category'] ?></span>
                    <span class="info-box-text"><?php echo $rs['detail'] ?></span>
                    <a href="<?php echo Yii::$app->urlManager->createUrl(['backend_video/video', 'category_id' => $rs['id']]); ?>">
                        <div class="btn btn-info btn-sm">จำนวนเรื่อง <div class=" badge"> <?php echo $total; ?> </div></div></a>
                    <div class="btn btn-warning btn-sm" 
                         onclick="dialog_edit_category('<?php echo $rs['id'] ?>', '<?php echo $rs['category'] ?>', '<?php echo $rs['detail'] ?>')">แก้ไข</div>
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
                    <h4 class="modal-title"><span class=" glyphicon glyphicon-upload"></span> หมวดวีดีโอ</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="id" name="id"/>
                    <div id="queue"></div>
                    <label>หมวด</label>
                    <input type="text" id="category" name="category" class=" form-control"/><br/>
                    <label>รายละเอียด</label>
                    <textarea cols="80" id="detail" name="detail" rows="10" class="form-control"></textarea><br/>
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
        $("#category").val('');
        $("#detail").val('');
        $("#dialog_add_category").modal();
    }

    function dialog_edit_category(id, category, detail) {
        $("#btn_save").hide();
        $("#btn_edit").show();
        $("#dialog_add_category").modal();
        $("#id").val(id);
        $("#category").val(category);
        $("#detail").val(detail);
    }

    function save_category() {
        var url = "<?php echo Yii::$app->urlManager->createUrl('backend_video/save_category') ?>";
        var category = $("#category").val();
        var detail = $("#detail").val();
        var data = {category: category, detail: detail};
        if (category == '') {
            alert("กรอกข้อมูลไม่ครบ ...");
            return false;
        }

        $.post(url, data, function (datas) {
            window.location.reload();
        });
    }

    function edit_category() {
        var url = "<?php echo Yii::$app->urlManager->createUrl('backend_video/edit_category') ?>";
        var id = $("#id").val();
        var category = $("#category").val();
        var detail = $("#detail").val();
        var data = {id: id, category: category, detail: detail};
        if (category == '') {
            alert("กรอกข้อมูลไม่ครบ ...");
            return false;
        }

        $.post(url, data, function (datas) {
            window.location.reload();
        });
    }
</script>