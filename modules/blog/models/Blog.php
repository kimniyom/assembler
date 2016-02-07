<?php

namespace app\modules\blog\models;

use Yii;
use yii\base\Model;

class Blog extends model {

    function GetCategoryAll() {
        $sql = "SELECT * FROM blog_category ORDER BY id ASC";
        $result = Yii::$app->db->createCommand($sql)->queryAll();
        return $result;
    }

    function GetCategoryById($Id = null) {
        $sql = "SELECT * FROM blog_category WHERE id = '$Id' ";
        $result = Yii::$app->db->createCommand($sql)->queryOne();
        return $result;
    }

    function GetLastBlog() {
        $sql = "SELECT b.*,m.name,username FROM blog_page b INNER JOIN masuser m ON b.create_by = m.id ORDER BY id DESC";
        return Yii::$app->db->createCommand($sql)->queryAll();
    }

    function GetBlogPageById($Id = null) {
        $sql = "SELECT b.*,m.name,m.lname,m.username
                FROM blog_page b INNER JOIN masuser m ON b.create_by = m.id
                WHERE b.id = '$Id' ";
        $result = Yii::$app->db->createCommand($sql)->queryOne();
        return $result;
    }

    function GetBlogPageByCategoryId($CategoryId = null) {
        $sql = "SELECT b.*,m.name,m.lname,m.username
                FROM blog_page b INNER JOIN masuser m ON b.create_by = m.id
                WHERE b.category_id = '$CategoryId' ";
        $result = Yii::$app->db->createCommand($sql)->queryAll();
        return $result;
    }

}
