<?php

use yii\helpers\Url;

/* @var $this yii\web\View */
$this->title = $cat['category'];
$this->params['breadcrumbs'][] = ['label' => 'หมวดวีดีโอ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="btn btn-success" onclick="dialog_add_video();">
    <i class="fa fa-video-camera"></i>
    <i class="fa fa-plus"></i>
    สร้างเรื่องวีดีโอในหมวด <?php echo $cat['category'] ?>
</div><br/><br/>

<div class="row">
    <?php
    $videoModel = new \app\models\Video();
    $i = 0;
    foreach ($video as $rs): $i++;
        $total = $videoModel->CountFileByVideoId($rs['id']);
        ?>
        <div class="col-lg-12 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-blue-gradient"><i class="fa fa-file-movie-o"></i></span>
                <div class="info-box-content">
                    <span class="info-box-number"><?php echo $rs['video_title'] ?></span>
                    <span class="info-box-text"><?php echo $rs['video_detail'] ?></span>
                    <a href="<?php echo Yii::$app->urlManager->createUrl(['backend_video/filevideo', 'category_id' => $cat['id'], 'video_id' => $rs['id']]) ?>">
                        <div class="btn btn-info btn-sm">จำนวนวีดีโอ <div class="badge"><?php echo $total; ?></div></div></a>
                    <div class="btn btn-warning btn-sm" 
                         onclick="dialog_edit_video('<?php echo $rs['id'] ?>', '<?php echo $rs['video_title'] ?>', '<?php echo $rs['video_detail'] ?>')">แก้ไข</div>
                    <div class="btn btn-danger btn-sm">ลบ</div>
                </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
        </div><!-- ./col -->
    <?php endforeach; ?>  
</div>


<!-- Modal Add portfolio -->
<div class="modal modal-primary" id="dialog_add_video" role="dialog">
    <div class="modal-dialog modal-lg">
        <form>
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><span class="fa fa-file-movie-o"></span> เรื่องวีดีโอ</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="id" name="id"/>
                    <div id="queue"></div>
                    <label>เรื่อง</label>
                    <input type="text" id="video_title" name="video_title" class=" form-control"/><br/>
                    <label>รายละเอียด</label>
                    <textarea cols="80" id="video_detail" name="video_detail" rows="10" class="form-control"></textarea><br/>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                    <button type="button" id="btn_save" class="btn btn-outline" onclick="save_video()">บันทึก</button>
                    <button type="button" id="btn_edit" class="btn btn-outline" onclick="edit_video()">แก้ไข</button>
                </div>
            </div><!-- /.modal-content -->
        </form>
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script type="text/javascript">
    function dialog_add_video() {
        $("#btn_save").show();
        $("#btn_edit").hide();
        $("#video_title").val('');
        $("#video_detail").val('');
        $("#dialog_add_video").modal();
    }

    function dialog_edit_video(id, video, detail) {
        $("#btn_save").hide();
        $("#btn_edit").show();
        $("#dialog_add_video").modal();
        $("#id").val(id);
        $("#video_title").val(video);
        $("#video_detail").val(detail);
    }

    function save_video() {
        var url = "<?php echo Yii::$app->urlManager->createUrl('backend_video/save_video') ?>";
        var video_title = $("#video_title").val();
        var video_detail = $("#video_detail").val();
        var category_id = "<?php echo $cat['id'] ?>";
        var data = {video_title: video_title, video_detail: video_detail, category_id: category_id};
        if (video_title == '') {
            alert("กรอกข้อมูลไม่ครบ ...");
            return false;
        }

        $.post(url, data, function (datas) {
            window.location.reload();
        });
    }

    function edit_video() {
        var url = "<?php echo Yii::$app->urlManager->createUrl('backend_video/edit_video') ?>";
        var id = $("#id").val();
        var video_title = $("#video_title").val();
        var video_detail = $("#video_detail").val();
        var data = {id: id, video_title: video_title, video_detail: video_detail};
        if (video_title == '') {
            alert("กรอกข้อมูลไม่ครบ ...");
            return false;
        }

        $.post(url, data, function (datas) {
            window.location.reload();
        });
    }
</script>