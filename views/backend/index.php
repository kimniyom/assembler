<?php
$this->registerJs(
        '$("document").ready(function(){
            $("#menu").dataTable({
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
$this->title = 'เมนูจัดการเว็บไซต์';
$this->params['breadcrumbs'][] = $this->title;
?>
<table class="table table-bordered table-striped" id="menu" style=" background: #FFF;">
    <thead>
        <tr>
            <th>#</th>
            <th>Menu</th>
            <th>Url</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 0;
        foreach ($menu as $menus):
            $i++;
            ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $menus['menu_name']; ?></td>
                <td><?php echo $menus['menu_url']; ?></td>
                <td></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>