<?php
$this->registerJs(
        '$("document").ready(function(){
            $("#user").dataTable({
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
$this->title = 'ผู้ใช้งาน';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="btn btn-success" onclick="dialog_add_user()"><span class="fa fa-user-plus"></span> สร้างผู้ใช้งาน</div>
<table class="table table-bordered table-striped" id="user" style=" background: #FFF;">
    <thead>
        <tr>
            <th>#</th>
            <th>Username</th>
            <th>Password</th>
            <th>Name</th>
            <th>Lname</th>
            <th style="text-align: center;">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 0;
        foreach ($user as $rs):
            $i++;
            ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $rs['username']; ?></td>
                <td><?php echo $rs['password']; ?></td>
                <td><?php echo $rs['name']; ?></td>
                <td><?php echo $rs['lname']; ?></td>
                <td style=" text-align: center;">
                    <div class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> แก้ไข</div>
                    <div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> ลบ</div>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<!-- Modal Add Menu -->

<div class="modal modal-success" id="dialog_add_user" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><span class=" glyphicon glyphicon-user"></span> สร้างผู้ใช้งาน</h4>
            </div>
            <div class="modal-body">
                <label>Username</label>
                <input type="text" id="username" name="username" class=" form-control"/><br/>
                <label>Password</label>
                <input type="password" id="password" name="password" class=" form-control"/><br/>
                <label>Name</label>
                <input type="text" id="name" name="name" class=" form-control"/><br/>
                <label>Lname</label>
                <input type="text" id="lname" name="lname" class=" form-control"/>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-outline" onclick="save_user()">บันทึก</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script type="text/javascript">
    function dialog_add_user() {
        $("#dialog_add_user").modal();
    }

    function save_user() {
        var url = "<?php echo Yii::$app->urlManager->createUrl('backend/save_user') ?>";
        var username = $("#username").val();
        var password = $("#password").val();
        var name = $("#name").val();
        var lname = $("#lname").val();
        var data = {username: username, password: password, name: name, lname: lname};
        if (username == '' || password == '' || name == '' || lname == '') {
            alert("กรอกข้อมูลไม่ครบ ...");
            return false;
        }

        $.post(url, data, function (success) {
            window.location.reload();
        });
    }

</script>