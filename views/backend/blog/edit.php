<?php

// Yii;
use yii\helpers\Url;

$path = Yii::getAlias("@vendor/richtexteditor/richtexteditor/include_rte.php");
require_once($path);
$rte = new \RichTextEditor();

$this->title = "แก้ไขบทความ";
$this->params['breadcrumbs'][] = ['label' => 'หมวด', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $category['blog_category'], 'url' => ['blog_page', 'category_id' => $category['id']]];
$this->params['breadcrumbs'][] = $this->title;
?>

<button type="button" class="btn btn-success" style=" margin-bottom: 3px; float: right;" title="Save" onclick="SaveBlog()">
    <span class="glyphicon glyphicon-floppy-disk"></span> Save
</button>
<br/>
<label>หัวข้อ</label>
<input type="text" id="title" name="title" class="form-control" value="<?php echo $page['title'] ?>"/>
<label>รายละเอียด</label>
<?php
// Create Editor instance and use Text property to load content into the RTE.  
//$rte->Text = "Type here";
// Set a unique ID to Editor   
$rte->ID = "Editor1";
$rte->Name = "Editor1";
$rte->Width = "100%";
$rte->Height = '550px';
$rte->set_Text($page['detail']);
/*
$rte->SetSecurity("*", "default", "AllowDeleteFile", "false");
$rte->SetSecurity("*", "default", "AllowMoveFile", "false");
$rte->SetSecurity("*", "default", "AllowRenameFile", "false");
$rte->SetSecurity("*", "default", "AllowOverride", "false");
$rte->SetSecurity("*", "default", "AllowCreateFolder", "false");
$rte->SetSecurity("*", "default", "AllowCopyFolder", "false");
$rte->SetSecurity("*", "default", "AllowMoveFolder", "false");
$rte->SetSecurity("*", "default", "AllowRenameFolder", "false");
$rte->SetSecurity("*", "default", "AllowDeleteFolder", "false");
*/
$rte->SetSecurity("*", "*", "MaxFileSize", "1024");
$rte->SetSecurity("Video", "*", "MaxFileSize", "2048");
$rte->SetSecurity("Gallery,Image", "*", "MaxFileSize", "300");
$rte->MvcInit();
// Render Editor 
echo $rte->GetString();
?>   


<script type="text/javascript">
    function SaveBlog() {
        var url = "<?php echo Yii::$app->urlManager->createUrl('backend_blog/save_editblog') ?>";
        //var category_id = "<?//php echo $category['id'] ?>";
        var id = "<?php echo $page['id'] ?>";
        var title = $("#title").val();
        var detail = $("#Editor1").val();
        var data = {id: id, title: title, detail: detail};
        if (title == '' || detail == '') {
            alert("กรอกข้อมูลไม่ครบ ...");
            return false;
        }

        $.post(url, data, function (sucess) {
            window.location = "<?php echo Url::to(['blog_detail', 'id' => $page['id'], 'category_id' => $category['id']]); ?>";
        });
    }
</script>