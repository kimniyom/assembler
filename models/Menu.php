<?php

namespace app\models;

use yii\base\Model;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Menu
 *
 * @author KimniyomWin8Pro
 */
class Menu extends model {

    function GetmenuAll() {
        $sql = "SELECT * FROM masmenu";
        $result = \Yii::$app->db->createCommand($sql)->queryAll();
        return $result;
    }

}
