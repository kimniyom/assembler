<?php

use yii\helpers\Url;

/* @var $this yii\web\View */
$this->title = 'ผลงานทั้งหมด';
$this->params['breadcrumbs'][] = $this->title;
?>

<script src="<?php echo Url::to('@web/web/assets/ckeditor/ckeditor.js') ?>"></script>

<div class="btn" style=" padding: 5px; margin-left: 10px;" onclick="dialog_add_portfolio()">
    <h4><i class="fa fa-plus"></i> เพิ่มผลงานใหม่</h4>
</div>
<div style=" text-align: center;">

    <ol class="dribbbles group" style="padding-left: 0px;">
        <?php
        $a = 0;
        foreach ($port as $rs):
            $a++;
            ?>
            <li id="screenshot-<?php echo $a; ?>" class="col-lg-3 col-md-4 col-sm-6" style=" margin-bottom: 10px;">
                <div class="dribbble">
                    <div class="dribbble-shot">
                        <div class="dribbble-img">
                            <a class="dribbble-link" href="#">
                                <div data-picture data-alt="Retinabbble - Chrome extension for dribbble">
                                    <img src="<?php echo Url::to('@web/upload/portfolio/' . $rs['img']) ?>"/>
                                </div>
                            </a>
                            <a class="dribbble-over" href="#">    
                                <h4><?php echo $rs['title'] ?></h4>
                            </a>
                        </div>
                        <a href="<?php echo Yii::$app->urlManager->createUrl(['backend_portfolio/edit', 'id' => $rs['id']]); ?>">
                            <div class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> แก้ไข</div></a>
                        <div class="btn btn-danger btn-sm" onclick="Delete_portfolio('<?php echo $rs['id'] ?>')"><i class="fa fa-trash"></i> ลบ</div>
                    </div>
                </div>
            </li>
        <?php endforeach; ?>
    </ol>
</div>

<!-- Modal Add portfolio -->
<div class="modal modal-success" id="dialog_add_portfolio" role="dialog">
    <div class="modal-dialog modal-lg">
        <form>
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><span class=" glyphicon glyphicon-cloud"></span> เพิ่มผลงาน</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="img" name="img"/>
                    <div id="queue"></div>
                    <label>เรื่อง/ชื่อ</label>
                    <input type="text" id="title" name="title" class=" form-control"/><br/>
                    <label>รายละเอียด</label>
                    <textarea cols="80" id="detail" name="detail" rows="10">ใส่ข้อความที่นี้</textarea><br/>
                    <input id="file_upload" name="file_upload" type="file" multiple="true">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-outline" onclick="save_portfolio()">บันทึก</button>
                </div>
            </div><!-- /.modal-content -->
        </form>
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
    });</script>

<script type="text/javascript">
    function dialog_add_portfolio() {
        $("#dialog_add_portfolio").modal();
    }

    function save_portfolio() {
        var url = "<?php echo Yii::$app->urlManager->createUrl('backend_portfolio/save_portfolio') ?>";
        var title = $("#title").val();
        var detail = CKEDITOR.instances.detail.getData();
        var img = $("#img").val();
        var data = {title: title, detail: detail};
        if (title == '' || detail == '') {
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
        }, 'json');
    }

    function Delete_portfolio(id) {
        var r = confirm("คุณแน่ใจหรือไม่ ..?");
        if (r == true) {
            var url = "<?php echo Yii::$app->urlManager->createUrl('backend_portfolio/delete_portfolio') ?>";
            var data = {id: id};
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
                'buttonText' : 'เลือกรูปภาพ...',
                'fileTypeExts' : '*.gif; *.jpg; *.png',
                'fileSizeLimit' : '800KB',
                'uploadLimit' : 1,
                'auto'     : false,
                'method'   : 'post',
                'formData'     : {
                    'title' : title,
                    'detail' : detail
                },
                'swf' : '" . Url::to('@web/web/assets/uploadify/uploadify.swf') . "',
                'uploader' : '" . Yii::$app->urlManager->createUrl('backend_portfolio/upload') . "',
                'onSelect' : function(file) {
                    $('#img').val(file.name);
                },
                'onUploadSuccess' : function(file, data, response) {
                   window.location.reload();
                }
            });
        });
"
);
?>





