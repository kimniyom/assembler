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
class Book extends model {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'book';
    }

    function GetBookTypeAll() {
        $sql = "SELECT * FROM book_type";
        $result = Yii::$app->db->createCommand($sql)->queryAll();
        return $result;
    }

    function GetBookTypeById($typeId = null) {
        $sql = "SELECT * FROM book_type WHERE id = '$typeId' ";
        $result = Yii::$app->db->createCommand($sql)->queryOne();
        return $result;
    }

    function GetBookByTypeId($type_id = null) {
        $sql = "SELECT * FROM book WHERE type_id = '$type_id' ";
        $result = Yii::$app->db->createCommand($sql)->queryAll();
        return $result;
    }

    function CountBookByTypeId($type_id = null) {
        $sql = "SELECT COUNT(*) AS TOTAL FROM book WHERE type_id = '$type_id' ";
        $result = Yii::$app->db->createCommand($sql)->queryOne();
        return $result['TOTAL'];
    }

    function GetBookByBookId($book_id = null){
       $sql = "SELECT * FROM book WHERE id = '$book_id' ";
       $result = Yii::$app->db->createCommand($sql)->queryOne();
       return $result;
    }

    function GetFileByBookId($book_id = null) {
        $sql = "SELECT * FROM book_file WHERE book_id = '$book_id' ";
        $result = Yii::$app->db->createCommand($sql)->queryAll();
        return $result;
    }

    function GetFileByFileId($file_id = null) {
        $sql = "SELECT * FROM book_file WHERE id = '$file_id' ";
        $result = Yii::$app->db->createCommand($sql)->queryOne();
        return $result;
    }

    function CountFileByBookId($book_id = null) {
        $sql = "SELECT COUNT(*) AS TOTAL FROM book_file WHERE book_id = '$book_id' ";
        $result = Yii::$app->db->createCommand($sql)->queryOne();
        return $result['TOTAL'];
    }

    function GetAll() {
        $sql = "SELECT * FROM book";
        $result = Yii::$app->db->createCommand($sql)->queryAll();
        return $result;
    }

    function GetById($id = null) {
        $sql = "SELECT * FROM book WHERE id = '$id' ";
        $result = Yii::$app->db->createCommand($sql)->queryOne();
        return $result;
    }

    function Max_id() {
        $sql = "SELECT MAX(id) AS max_id FROM book";
        $result = Yii::$app->db->createCommand($sql)->queryOne();
        return $result['max_id'];
    }

}
