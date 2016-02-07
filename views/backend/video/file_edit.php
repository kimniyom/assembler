<?php

use yii\helpers\Url;

if (strlen($file['file_name']) > 50) {
    $title = substr($file['file_name'], 0, 50).'...';
} else {
    $title = $file['file_name'];
}

$this->title = "แก้ไข " . $title;
$this->params['breadcrumbs'][] = ['label' => 'หมวดวีดีโอ', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $cat['category'], 'url' => ['video', 'category_id' => $cat['id']]];
$this->params['breadcrumbs'][] = ['label' => $video['video_title'], 'url' => ['filevideo', 'category_id' => $cat['id'], 'video_id' => $video['id']]];
$this->params['breadcrumbs'][] = $title;
?>
<script src="<?php echo Url::to('@web/web/assets/ckeditor/ckeditor.js') ?>"></script>

<div class="panel panel-primary">
    <div class="panel-heading">
        <i class="fa fa-edit"></i> แก้ไขข้อมูล (<?php echo $file['file_name'] ?>)
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-2 col-md-2 col-sm-12">
                <img src="http://img.youtube.com/vi/<?php echo $file['youtube_id'] ?>/hqdefault.jpg" class="img-responsive"/>
            </div>
            <div class="col-lg-10 col-md-10 col-sm-12">
                <input type="hidden" id="id" name="id" value="<?php echo $file['id'] ?>"/>
                <label>ชื่อ video</label>
                <input type="text" id="file_name" name="file_name" class=" form-control" value="<?php echo $file['file_name'] ?>"/><br/>
                <label>Youtube Id</label>
                <input type="text" id="youtube_id" name="youtube_id" class=" form-control" value="<?php echo $file['youtube_id'] ?>"/><br/>
                <label>รายละเอียด</label>
                <textarea cols="80" id="detail" name="detail" rows="10"><?php echo $file['detail'] ?></textarea><br/>
            </div>
        </div>
    </div>
    <div class="panel-footer">
        <button type="button" class="btn btn-success" onclick="edit_filevideo()">บันทึกข้อมูล</button>
    </div>
</div>

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

    function edit_filevideo() {
        var url = "<?php echo Yii::$app->urlManager->createUrl('backend_video/edit_filevideo') ?>";
        var id = $("#id").val();
        var file_name = $("#file_name").val();
        var youtube_id = $("#youtube_id").val();
        var detail = CKEDITOR.instances.detail.getData();
        var data = {id: id, file_name: file_name, youtube_id: youtube_id, detail: detail};
        if (file_name == '' || youtube_id == '') {
            alert("กรอกข้อมูลไม่ครบ ...");
            return false;
        }

        $.post(url, data, function (datas) {
            window.location.reload();
        });
    }
</script>