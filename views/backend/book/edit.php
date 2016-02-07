<?php

use yii\helpers\Url;

/* @var $this yii\web\View */
$this->title = $book['book_name'];
$this->params['breadcrumbs'][] = ['label' => 'ประเภท', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $typename, 'url' => ['book', 'type_id' => $type_id]];
$this->params['breadcrumbs'][] = $this->title;
?>

<script src="<?php echo Url::to('@web/web/assets/ckeditor/ckeditor.js') ?>"></script>

<form>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <i class="fa fa-edit"></i> แก้ไขข้อมูล (<?php echo $book['book_name'] ?>)
        </div>
        <div class="panel-body">
            <div id="queue"></div>
            <input type="hidden" id="id" name="id" value="<?php echo $book['id'] ?>"/>
            <label>ชื่อหนังสือ</label>
            <input type="text" id="book_name" name="book_name" class=" form-control" value="<?php echo $book['book_name'] ?>"/><br/>
            <label>รายละเอียด</label>
            <textarea cols="80" id="book_detail" name="book_detail" rows="10"><?php echo $book['book_detail'] ?></textarea><br/>
            <input id="file_upload" name="file_upload" type="file" multiple="true">
            <a href="javascript:dialog_images('/book/<?php echo $book['img'] ?>');">
                <img src="<?php echo Url::to('@web/upload/book/' . $book['img']); ?>"  class="img-thumbnail" style=" height: 150px;"/>
            </a>
        </div>
        <div class="panel-footer">
            <button type="button" class="btn btn-success" onclick="edit_book()">บันทึกข้อมูล</button>
        </div>
    </div>
</form>


<script>
//Modify By Kimniyom
CKEDITOR.replace('book_detail', {
    image_removeLinkByEmptyURL: true,
    filebrowserBrowseUrl: '<?php echo Url::to('@web/web/assets/ckeditor/ckfinder/ckfinder.html'); ?>',
    filebrowserImageBrowseUrl: '<?php echo Url::to('@web/web/assets/ckeditor/ckfinder/ckfinder.html?Type=Images'); ?>',
    filebrowserFlashBrowseUrl: '<?php echo Url::to('@web/web/assets/ckeditor/ckfinder/ckfinder.html?Type=Flash'); ?>',
    filebrowserUploadUrl: '<?php echo Url::to('@web/web/assets/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'); ?>',
    filebrowserImageUploadUrl: '<?php echo Url::to('@web/web/assets/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images'); ?>',
    filebrowserFlashUploadUrl: '<?php echo Url::to('@web/web/assets/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'); ?>'
});
</script>

<script type="text/javascript">

    function edit_book() {
        var url = "<?php echo Yii::$app->urlManager->createUrl('backend_book/save_edit_book') ?>";
        var book_name = $("#book_name").val();
        var book_detail = CKEDITOR.instances.book_detail.getData();
        var id = "<?php echo $book['id']?>";
        var data = {id: id, book_name: book_name, book_detail: book_detail};
        if (book_name == '' || book_detail == '') {
            alert("กรอกข้อมูลไม่ครบ ...");
            return false;
        }

        $.post(url, data, function (datas) {
            window.location.reload();
            //var bookfilio_id = datas.id;
            //window.location = "index.php?r=backend_bookfolio/detail&id=" + bookfilio_id;
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
            'uploader' : '" . Yii::$app->urlManager->createUrl(['backend_book/upload_edit', 'id' => $book['id']]) . "',
            'onUploadSuccess' : function(file, data, response) {
               window.location.reload();
           }
       });
    });"
);
?>





