<?php

use yii\helpers\Url;

/* @var $this yii\web\View */
$this->title = $book['book_name'];
$this->params['breadcrumbs'][] = ['label' => 'ประเภท', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $type['book_type'], 'url' => ['book', 'type_id' => $type['id']]];
$this->params['breadcrumbs'][] = $this->title;
?>

<script src="<?php echo Url::to('@web/web/assets/ckeditor/ckeditor.js') ?>"></script>


<div class="panel panel-primary">
    <div class="panel-heading">
        <i class="fa fa-book"></i> ข้อมูล (<?php echo $book['book_name'] ?>)
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6">
                <img src="<?php echo Url::to('@web/upload/book/' . $book['img']); ?>"  class="img-responsive"/>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-6">
                <label style="font-size:20px;"><?php echo $book['book_name']; ?></label><br/><br/>
                <?php echo $book['book_detail']; ?><br/>
                <label>วันที่ <?php echo $book['d_update']; ?></label>
            </div>
        </div>

        <hr/>

        <form>
            <div id="queue"></div>
            <input type="hidden" id="id" name="id" value="<?php echo $book['id'] ?>"/>
            <input id="file_upload" name="file_upload" type="file" multiple="true"><br/>
            *นามสกุลไฟล์ gif ,jpg ,png ,zip ,rar ,doc ,docx ,pdf<br/>
            *ขนาดไม่เกิน 200 MB</br>
            *อัพได้ครั้งละ 10 ไฟล์</br>
            *ชื่อไฟล์ต้องเป็น a-z,A-Z,0-9 เท่านั้น
        </form>
        <div class="alert alert-success" id="uploadsuccess" style=" display: none;i">
            
        </div>
        <hr/>
        <div class="btn btn-primary" onclick="javascript:window.location.reload();"><i class="fa fa-refresh"></i> โหลดข้อมูล</div>
        <table class="table table-bordered" id="tb_file">
            <thead>
                <tr>
                    <th>#</th>
                    <th>File</th>
                    <th style="text-align:center;">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 0;
                foreach ($file as $files): $i++;
                    ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td>
                            <a href="<?php echo Url::to('@web/upload/book/' . $files['book_file']); ?>" target="_black">
                                <?php echo $files['book_file']; ?></a>
                        </td>
                        <td style="text-align:center;">
                            <div class="btn btn-danger btn-sm" onclick="delete_file('<?php echo $files['id'] ?>')">
                                <span class="glyphicon glyphicon-trash"></span> ลบไฟล์
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>
    <div class="panel-footer">

    </div>
</div>

<script type="text/javascript">
    function delete_file(id) {
        var r = confirm("คุณแน่ใจหรือไม่...?");
        if (r == true) {
            var url = "<?php echo Yii::$app->urlManager->createUrl('backend_book/delete_file') ?>";
            var data = {id: id};

            $.post(url, data, function (success) {
                window.location.reload();
            });
        }
    }
</script>

<?php
$this->registerJs(
        "$(document).ready(function(){
        $('#tb_file').dataTable({
          'bPaginate': true,
          'bLengthChange': false,
          'bFilter': false,
          'bSort': true,
          'bInfo': true,
          'bAutoWidth': false
      });

$('#file_upload').uploadify({
    'buttonText' : 'อัพโหลดไฟล์ที่นี้...',
    'fileTypeExts' : '*.gif; *.jpg; *.png; *.zip; *.rar; *.doc; *.docx; *.pdf;',
    'fileSizeLimit' : '200MB',
    'uploadLimit' : 10,
    'auto'     : true,
    'method'   : 'post',
    'swf' : '" . Url::to('@web/web/assets/uploadify/uploadify.swf') . "',
    'uploader' : '" . Yii::$app->urlManager->createUrl(['backend_book/upload_filebook', 'id' => $book['id']]) . "',
    'onUploadSuccess' : function(file, data, response) {
        $('#uploadsuccess').show();
       $('#uploadsuccess').html('อัพโหดสำเร็จ</br>');
   }
});
});"
);
?>
