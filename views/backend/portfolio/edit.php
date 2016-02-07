<?php

use yii\helpers\Url;

/* @var $this yii\web\View */
$this->title = $port['title'];
$this->params['breadcrumbs'][] = ['label' => 'ผลงานทั้งหมด', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<script src="<?php echo Url::to('@web/web/assets/ckeditor/ckeditor.js') ?>"></script>

<form>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <i class="fa fa-edit"></i> แก้ไขข้อมูล (<?php echo $port['title'] ?>)
        </div>
        <div class="panel-body">
            <div id="queue"></div>
            <input type="hidden" id="id" name="id" value="<?php echo $port['id'] ?>"/>
            <label>เรื่อง/ชื่อ</label>
            <input type="text" id="title" name="title" class=" form-control" value="<?php echo $port['title'] ?>"/><br/>
            <label>รายละเอียด</label>
            <textarea cols="80" id="detail" name="detail" rows="10"><?php echo $port['detail'] ?></textarea><br/>
            <input id="file_upload" name="file_upload" type="file" multiple="true">
            <a href="javascript:dialog_images('/portfolio/<?php echo $port['img'] ?>');">
                <img src="<?php echo Url::to('@web/upload/portfolio/' . $port['img']); ?>"  class="img-thumbnail" style=" height: 150px;"/>
            </a>
        </div>
        <div class="panel-footer">
            <button type="button" class="btn btn-success" onclick="edit_portfolio()">บันทึกข้อมูล</button>
        </div>
    </div>
</form>


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
    });</script>

<script type="text/javascript">

    function edit_portfolio() {
        var url = "<?php echo Yii::$app->urlManager->createUrl('backend_portfolio/edit_portfolio') ?>";
        var title = $("#title").val();
        var detail = CKEDITOR.instances.detail.getData();
        var id = $("#id").val();
        var data = {id: id, title: title, detail: detail};
        if (title == '' || detail == '') {
            alert("กรอกข้อมูลไม่ครบ ...");
            return false;
        }

        $.post(url, data, function (datas) {
            window.location.reload();
            //var portfilio_id = datas.id;
            //window.location = "index.php?r=backend_portfolio/detail&id=" + portfilio_id;
        });
    }


</script>

<?php
$this->registerJs(
        "$(document).ready(function(){
            $('#file_upload').uploadify({
                'buttonText' : 'แก้ไขรูปภาพ...',
                'fileTypeExts' : '*.gif; *.jpg; *.png',
                'fileSizeLimit' : '800KB',
                'uploadLimit' : 1,
                'auto'     : true,
                'method'   : 'post',
                'swf' : '" . Url::to('@web/web/assets/uploadify/uploadify.swf') . "',
                'uploader' : '" . Yii::$app->urlManager->createUrl(['backend_portfolio/upload_edit', 'id' => $port['id']]) . "',
                'onUploadSuccess' : function(file, data, response) {
                   window.location.reload();
                }
            });
        });
"
);
?>





