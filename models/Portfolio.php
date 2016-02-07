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
class Portfolio extends model {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'portfolio';
    }

    function GetAll() {
        $sql = "SELECT * FROM portfolio";
        $result = Yii::$app->db->createCommand($sql)->queryAll();
        return $result;
    }

    function GetPortfolio() {
        $sql = "SELECT * FROM portfolio LIMIT 8";
        $result = Yii::$app->db->createCommand($sql)->queryAll();
        return $result;
    }

    function GetById($id = null) {
        $sql = "SELECT * FROM portfolio WHERE id = '$id' ";
        $result = Yii::$app->db->createCommand($sql)->queryOne();
        return $result;
    }

    function Max_id() {
        $sql = "SELECT MAX(id) AS max_id FROM portfolio";
        $result = Yii::$app->db->createCommand($sql)->queryOne();
        return $result['max_id'];
    }

    function Total() {
        $sql = "SELECT COUNT(*) AS TOTAL FROM portfolio";
        $result = Yii::$app->db->createCommand($sql)->queryOne();
        return $result['TOTAL'];
    }

}
