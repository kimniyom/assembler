<?php

use yii\helpers\Url;

$this->title = $video['video_title'];
$this->params['breadcrumbs'][] = ['label' => 'หมวดวีดีโอ', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $cat['category'], 'url' => ['video', 'category_id' => $cat['id']]];
$this->params['breadcrumbs'][] = $this->title;
?>
<script src="<?php echo Url::to('@web/web/assets/ckeditor/ckeditor.js') ?>"></script>

<div class="btn btn-success" onclick="dialog_add_filevideo();">
    <i class="fa fa-video-camera"></i>
    <i class="fa fa-plus"></i>
    เพิ่มวีดีโอ <?php echo $video['video_title'] ?>
</div><br/><br/>

<div class="row">
    <?php
    $i = 0;
    foreach ($file as $rs): $i++;
        ?>
        <div class="col-lg-12 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-black-gradient">
                    <img src="http://img.youtube.com/vi/<?php echo $rs['youtube_id'] ?>/hqdefault.jpg" class="img-responsive"/>
                </span>
                <div class="info-box-content">
                    <span class="info-box-number">
                        <a href="javascript:Play_video('<?php echo $rs['id'] ?>','<?php echo $rs['youtube_id'] ?>','<?php echo $rs['file_name'] ?>')"/>
                        <?php echo $rs['file_name'] ?></a>
                    </span>
                    <span class="info-box-text">
                        <i class="fa fa-user"></i> โดย <?php echo $rs['username'] ?> <i class="fa fa-clock-o"></i> <?php echo $rs['d_update'] ?>
                    </span>
                    <a href="<?php
                    echo Yii::$app->urlManager->createUrl([
                        'backend_video/form_edit_filevideo', 'category_id' => $cat['id'], 'video_id' => $rs['video_id'], 'id' => $rs['id']
                    ])
                    ?>">
                        <div class="btn btn-warning btn-sm">แก้ไข</div></a>
                    <div class="btn btn-danger btn-sm">ลบ</div>
                </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
        </div><!-- ./col -->
    <?php endforeach; ?>  
</div>


<!-- Modal Add portfolio -->
<div class="modal modal-primary" id="dialog_add_filevideo" role="dialog">
    <div class="modal-dialog modal-lg">
        <form>
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><span class="fa fa-file-movie-o"></span> วีดีโอ</h4>
                </div>
                <div class="modal-body">
                    <div id="queue"></div>
                    <label>หัวข้อ</label>
                    <input type="text" id="file_name" name="file_name" class=" form-control"/><br/>
                    <label>YouTube ID</label>
                    <input type="text" id="youtube_id" name="youtube_id" class=" form-control"/><br/>
                    <label>รายละเอียด</label>
                    <textarea cols="80" id="detail" name="detail" rows="10">ใส่ข้อความที่นี้</textarea><br/>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                    <button type="button" id="btn_save" class="btn btn-outline" onclick="save_filevideo()">บันทึก</button>
                </div>
            </div><!-- /.modal-content -->
        </form>
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Dialog sHow Video -->
<div class="modal" id="dialog_show_video" role="dialog" data-backdrop='static'>
    <div class="modal-dialog modal-lg">

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><span class="fa fa-file-movie-o"></span> 
                    <font id="v_title"></font>
                </h4>
            </div>
            <div class="modal-body" style=" padding: 0px;">
                <div class="row">
                    <div class="col-lg-9 col-md-12 col-sm-12">
                        <div id="video_play"></div>
                    </div>
                    <div class="col-lg-3 col-md-12 col-sm-12" style=" margin-left: 0px; padding-left: 0px;">
                        <label>ไฟล์ประกอบวีดีโอ</label>
                        <div id="video_detail" style=" overflow: auto; max-height: 450px;"></div>
                    </div>
                </div>

            </div>

        </div><!-- /.modal-content -->

    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>
    //Modify By Kimniyom
    CKEDITOR.replace('detail', {
        image_removeLinkByEmptyURL: true,
        //extraPlugins: 'image',
        //removeDialogTabs: 'link:upload;image:Upload',
        //filebrowserBrowseUrl: 'imgbrowse/imgbrowse.php',
        //filebrowserUploadUrl: 'ckupload.php',
        //uiColor: '#AADC6E',
        filebrowserBrowseUrl: '<?php echo Url::to('@web/web/assets/ckeditor/ckfinder/ckfinder.html'); ?>',
        filebrowserImageBrowseUrl: '<?php echo Url::to('@web/web/assets/ckeditor/ckfinder/ckfinder.html?Type=Images'); ?>',
        filebrowserFlashBrowseUrl: '<?php echo Url::to('@web/web/assets/ckeditor/ckfinder/ckfinder.html?Type=Flash'); ?>',
        filebrowserUploadUrl: '<?php echo Url::to('@web/web/assets/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'); ?>',
        filebrowserImageUploadUrl: '<?php echo Url::to('@web/web/assets/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images'); ?>',
        filebrowserFlashUploadUrl: '<?php echo Url::to('@web/web/assets/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'); ?>'
    });
</script>

<script type="text/javascript">
    function dialog_add_filevideo() {
        $("#dialog_add_filevideo").modal();
    }

    function save_filevideo() {
        var url = "<?php echo Yii::$app->urlManager->createUrl('backend_video/save_filevideo') ?>";
        var file_name = $("#file_name").val();
        var youtube_id = $("#youtube_id").val();
        var detail = CKEDITOR.instances.detail.getData();
        var video_id = "<?php echo $video['id'] ?>";
        var data = {file_name: file_name, youtube_id: youtube_id, video_id: video_id, detail: detail};
        if (file_name == '' || youtube_id == '') {
            alert("กรอกข้อมูลไม่ครบ ...");
            return false;
        }

        $.post(url, data, function (datas) {
            window.location.reload();
        });
    }

    function Play_video(id, youtube_id, title) {
        var box_video = '<iframe width="100%" height="500" src="http://www.youtube.com/embed/' + youtube_id + '?theme=light&modestbranding=1" frameborder="0" allowfullscreen></iframe>';
        $("#v_title").text(title);
        $("#video_play").html(box_video);
        $("#dialog_show_video").modal();
        var loadding = "<i class=\"fa fa-spinner fa-spin\"></i>";
        $("#video_detail").html(loadding);
        var url = "<?php echo Yii::$app->urlManager->createUrl('backend_video/get_detail') ?>";
        var data = {id: id};
        $.post(url, data, function (result) {
            $("#video_detail").html(result);
        });
    }
</script>