<?php

namespace app\models;

use Yii;
use yii\base\Model;

class Blog extends model {

    function GetCategoryAll() {
        $sql = "SELECT * FROM blog_category";
        $result = Yii::$app->db->createCommand($sql)->queryAll();
        return $result;
    }

    function GetCategoryById($Id = null) {
        $sql = "SELECT * FROM blog_category WHERE id = '$Id' ";
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

    function CountBlogPage($CategoryId = null) {
        $sql = "SELECT COUNT(*) AS TOTAL FROM blog_page WHERE category_id = '$CategoryId' ";
        $result = Yii::$app->db->createCommand($sql)->queryOne();
        return $result['TOTAL'];
    }

    function GetBlogPageById($Id = null) {
        $sql = "SELECT b.*,m.name,m.lname,m.username
                FROM blog_page b INNER JOIN masuser m ON b.create_by = m.id
                WHERE b.id = '$Id' ";
        $result = Yii::$app->db->createCommand($sql)->queryOne();
        return $result;
    }

}
