<?php

use yii\helpers\Url;
use yii\helpers\Html;

$this->registerJs(
        '$("document").ready(function(){
            $("#table_booktype").dataTable({
                "bPaginate": true,
                 "bLengthChange": false,
                 "bFilter": false,
                 "bSort": true,
                 "bInfo": true,
                 "bAutoWidth": false
                });
           });'
);



/* @var $this yii\web\View */
$this->title = 'ประเภทหนังสือ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="btn btn-success" onclick="dialog_add_booktype()"><span class="fa fa-book"></span> สร้างประเภทหนังสือ</div>
<table class="table table-bordered table-striped" id="table_booktype" style=" background: #FFF;">
    <thead>
        <tr>
            <th>#</th>
            <th>BookType</th>
            <th>BookTotal</th>
            <th style="text-align: center;">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $books = new \app\models\Book();
        $i = 0;
        foreach ($book as $rs):
            $i++;
            ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td>
                    <?php
                    $url = urldecode(Url::toRoute(['backend_book/book', 'type_id' => $rs['id']]));
                    echo Html::a($rs['book_type'], $url);
                    ?>
                    <!--
                    <a href="<?//php echo urldecode(Yii::$app->urlManager->createUrl(['backend_book/book', 'type_id' => $rs['id']])) ?>">
                        <?//php echo $rs['book_type']; ?></a>
                    -->
                </td>
                <td>
                    <div class="badge">
    <?php echo $books->CountBookByTypeId($rs['id']); ?>
                    </div>
                </td>
                <td style=" text-align: center;">
                    <div class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> แก้ไข</div>
                    <div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> ลบ</div>
                </td>
            </tr>
<?php endforeach; ?>
    </tbody>
</table>

<!-- Modal Add Menu -->

<div class="modal modal-success" id="dialog_add_booktype" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><span class=" glyphicon glyphicon-book"></span> สร้างประเภทหนังสือ</h4>
            </div>
            <div class="modal-body">
                <label>ประเภทหนังสือ</label>
                <input type="text" id="booktype" name="booktype" class=" form-control"/><br/>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-outline" onclick="save_booktype()">บันทึก</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script type="text/javascript">
    function dialog_add_booktype() {
        $("#dialog_add_booktype").modal();
    }

    function save_booktype() {
        var url = "<?php echo Yii::$app->urlManager->createUrl('backend_book/save_booktype') ?>";
        var booktype = $("#booktype").val();
        var data = {booktype: booktype};
        if (booktype == '') {
            alert("กรอกข้อมูลไม่ครบ ...");
            return false;
        }

        $.post(url, data, function (success) {
            window.location.reload();
        });
    }

</script>