<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Menu;
use app\models\Users;
use yii\web\Session;

class BackendController extends Controller {

    public $layout = "backend";

    public function actionIndex() {
        if (Yii::$app->session['assembler']['user'] != '') {
            $Menu = new Menu();
            $data['menu'] = $Menu->GetmenuAll();
            return $this->render('//backend/index', $data);
        } else {
            return $this->renderPartial('//backend/login');
        }
    }

    public function actionLogin() {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM masuser WHERE username = '$username' AND password = '$password' ";
        $result = Yii::$app->db->createCommand($sql)->queryOne();
        if ($result) {
            $session = Yii::$app->session;
            $session['assembler'] = [
                'user_id' => $result['id'],
                'user' => $result['status'],
                'name' => $result['name'],
                'lname' => $result['lname'],
            ];

            echo "0";
        } else {
            echo "1";
        }
    }

    public function actionLogout() {
        $session = Yii::$app->session;
        unset($session['assembler']);
        $session->destroy();
        return $this->redirect(['index']);
    }

    public function actionSave_menu() {
        $culumns = array(
            "menu_name" => $_POST['menu_name'],
            "menu_url" => $_POST['menu_url']
        );

        \Yii::$app->db->createCommand()
                ->insert("masmenu", $culumns)
                ->execute();
    }

    public function actionUser() {
        if (\Yii::$app->session['assembler']['user'] == null) {
            $this->redirect(['backend/index']);
        } else {
            $Use = new Users();
            $data['user'] = $Use->Get_userAll();
            return $this->render('/backend/user/index', $data);
        }
    }

    public function actionSave_user() {
        $culumns = array(
            "username" => $_POST['username'],
            "password" => $_POST['password'],
            "name" => $_POST['name'],
            "lname" => $_POST['lname']
        );

        \Yii::$app->db->createCommand()
                ->insert("masuser", $culumns)
                ->execute();
    }

}
