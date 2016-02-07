<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * This is the model class for table "portfolio".
 *
 * @property integer $id
 * @property string $title
 * @property string $detail
 * @property string $author
 */
class Video extends model {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'video';
    }

    function GetCategoryAll() {
        $sql = "SELECT * FROM video_category";
        $result = \Yii::$app->db->createCommand($sql)->queryAll();
        return $result;
    }

    function GetCategoryById($id = null) {
        $sql = "SELECT * FROM video_category WHERE id = '$id' ";
        $result = \Yii::$app->db->createCommand($sql)->queryOne();
        return $result;
    }

    function CountVideoByCategory($category_id = null) {
        $sql = "SELECT COUNT(*) AS TOTAL FROM video WHERE category_id = '$category_id' ";
        $result = \Yii::$app->db->createCommand($sql)->queryOne();
        return $result['TOTAL'];
    }

    function GetVideoByCategoryId($categoryId = null) {
        $sql = "SELECT * FROM video WHERE category_id = '$categoryId' ";
        $result = \Yii::$app->db->createCommand($sql)->queryAll();
        return $result;
    }

    function GetVideoById($id = null) {
        $sql = "SELECT * FROM video WHERE id = '$id' ";
        $result = \Yii::$app->db->createCommand($sql)->queryOne();
        return $result;
    }

    function CountFileByVideoId($video_id = null) {
        $sql = "SELECT COUNT(*) AS TOTAL FROM video_file WHERE video_id = '$video_id' ";
        $result = \Yii::$app->db->createCommand($sql)->queryOne();
        return $result['TOTAL'];
    }

    function GetVideoFileByVideoId($VideoId = null) {
        $sql = "SELECT v.*,m.name,m.lname,m.status,m.username
                FROM video_file v INNER JOIN masuser m ON v.create_by = m.id
                WHERE video_id = '$VideoId' ";
        $result = \Yii::$app->db->createCommand($sql)->queryAll();
        return $result;
    }

    function GetVideoFileById($id = null) {
        $sql = "SELECT * FROM video_file WHERE id = '$id' ";
        $result = \Yii::$app->db->createCommand($sql)->queryOne();
        return $result;
    }

}
