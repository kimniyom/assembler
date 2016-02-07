<?php

namespace app\models;

use yii\base\Model;

class Users extends model {

    function Get_userAll() {
        $sql = "SELECT * FROM masuser";
        $result = \Yii::$app->db->createCommand($sql)->queryAll();
        return $result;
    }

}
