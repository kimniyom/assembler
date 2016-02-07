<?php

use yii\helpers\Url;

/* @var $this yii\web\View */
$this->title = $typename;
$this->params['breadcrumbs'][] = ['label' => 'ประเภท', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<script src="<?php echo Url::to('@web/web/assets/ckeditor/ckeditor.js') ?>"></script>

<div class="btn btn-success" onclick="dialog_add_book()" style=" margin-left: 15px; margin-bottom: 10px;">
    <span class="fa fa-book"></span> สร้างหนังสือ ในประเภท <?php echo $typename; ?>
</div>

<ol class="dribbbles group" style="padding-left: 0px;">
    <?php
    $books = new \app\models\Book();
    $a = 0;
    foreach ($book as $rs):
        $a++;
        ?>
        <li id="screenshot-<?php echo $a; ?>" class="col-lg-3 col-md-4 col-sm-6" style=" margin-bottom: 10px;">
            <div class="dribbble">
                <div class="dribbble-shot">
                    <div class="dribbble-img" style=" text-align: center;">
                        <a class="dribbble-link" href="#">
                            <div data-picture data-alt="Retinabbble - Chrome extension for dribbble">
                                <img src="<?php echo Url::to('@web/upload/book/' . $rs['img']) ?>"/>
                            </div>
                        </a>
                        <a class="dribbble-over" href="#">
                            <h4><?php echo $rs['book_name'] ?></h4>
                        </a>
                    </div><br/>
                    <h4><?php echo $rs['book_name'] ?></h4>
                    จำนวนไฟล์ <div class="badge"><?php echo $books->CountFileByBookId($rs['id']); ?></div><br/>
                    วันที่ <?php echo $rs['d_update'] ?><br/>
                    <a href="<?php echo Yii::$app->urlManager->createUrl(['backend_book/detail_book', 'type_id' => $type_id, 'book_id' => $rs['id']]); ?>">
                        <div class="btn btn-primary btn-sm"><i class="fa fa-book"></i> เปิด</div></a>
                    <a href="<?php echo Yii::$app->urlManager->createUrl(['backend_book/book_edit', 'type_id' => $type_id, 'book_id' => $rs['id']]); ?>">
                        <div class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> แก้ไข</div></a>
                    <div class="btn btn-danger btn-sm" onclick="Delete_book('<?php echo $rs['id'] ?>')"><i class="fa fa-trash"></i> ลบ</div>
                </div>
            </div>
        </li>
    <?php endforeach; ?>
</ol>



<!-- Modal Add Menu -->

<div class="modal modal-success" id="dialog_add_book" role="dialog">
    <div class="modal-dialog modal-lg">
        <form>
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><span class=" glyphicon glyphicon-book"></span> สร้างหนังสือ ในประเภท <?php echo $typename; ?></h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="img" name="img"/>
                    <div class="row">
                        <div class="col-lg-2">
                            <input type="text" id="type_id" name="type_id" class=" form-control" value="<?php echo $type_id; ?>" readonly="readonly"/>
                        </div>
                        <div class="col-lg-10">
                            <input type="text" id="typename" name="typename" class=" form-control" value="<?php echo $typename; ?>" readonly="readonly"/>
                        </div>
                    </div><br/>

                    <label>ชื่อหนังสือ</label>
                    <input type="text" id="bookname" name="bookname" class=" form-control"/>

                    <label>รายละเอียด</label>
                    <textarea cols="80" id="book_detail" name="book_detail" rows="10">ใส่ข้อความที่นี้</textarea><br/>
                    <input id="file_upload" name="file_upload" type="file" multiple="true">
                    *ไฟล์ขนาดไม่เกิน 2 MB เลือกได้ครั้งละ 1 ไฟล์
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-outline" onclick="save_book()">บันทึก</button>
                </div>
            </div><!-- /.modal-content -->
        </form>
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>
    //Modify By Kimniyom
    CKEDITOR.replace('book_detail', {
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
    function dialog_add_book() {
        $("#dialog_add_book").modal();
    }

    function save_book() {
        var url = "<?php echo Yii::$app->urlManager->createUrl('backend_book/save_book') ?>";
        var type_id = $("#type_id").val();
        var book_name = $("#bookname").val();
        var book_detail = CKEDITOR.instances.book_detail.getData();
        var img = $("#img").val();
        var data = {type_id: type_id, book_name: book_name, book_detail: book_detail};
        if (book_name == '' || book_detail == '') {
            alert("กรอกข้อมูลไม่ครบ ...");
            return false;
        }
        if (img == '') {
            alert("ยังไม่ได้เลือกรูปภาพ ...");
            return false;
        }

        $.post(url, data, function (datas) {
            $('#file_upload').uploadify('upload');
            //var portfilio_id = datas.id;
            //window.location = "index.php?r=backend_portfolio/detail&id=" + portfilio_id;
        });
    }

    function Delete_book(id) {
        var r = confirm("คุณแน่ใจหรือไม่ ... ?");
        if (r == true) {
            var url = "<?php echo Yii::$app->urlManager->createUrl('backend_book/delete_book') ?>";
            var data = {book_id: id};

            $.post(url, data, function (datas) {
                window.location.reload();
            });
        }
    }
</script>

<?php
$this->registerJs(
        "$(document).ready(function(){
        $('#file_upload').uploadify({
            'buttonText' : 'เลือกรูปหน้าปก...',
            'fileTypeExts' : '*.gif; *.jpg; *.png',
            'fileSizeLimit' : '2MB',
            'uploadLimit' : 1,
            'auto'     : false,
            'swf' : '" . Url::to('@web/web/assets/uploadify/uploadify.swf') . "',
            'uploader' : '" . Yii::$app->urlManager->createUrl('backend_book/upload') . "',
            'onSelect' : function(file) {
                $('#img').val(file.name);
            },
            'onUploadSuccess' : function(file, data, response) {
               window.location.reload();
           }
       });
    });"
);
?>
