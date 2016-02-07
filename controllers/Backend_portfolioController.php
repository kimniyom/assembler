<?php

namespace app\controllers;

use yii\web\Controller;
use app\models\Portfolio;
use yii\helpers\Url;

class Backend_portfolioController extends Controller {

    public $enableCsrfValidation = false;
    public $layout = "backend";

    public function beforeAction($action) {
        if (parent::beforeAction($action)) {
            if (\Yii::$app->session['assembler']['user'] == null) {
                $this->redirect(['backend/index']);
            }
            return true;
        }
        return false;
    }

    public function actionIndex() {
        $portfolio = new Portfolio();
        $data['port'] = $portfolio->GetAll();
        return $this->render('//backend/portfolio/index', $data);
    }

    public function actionUpload() {
        // Define a destination
        $targetFolder = Url::base() . '/upload/portfolio'; // Relative to the root
        //ดึงรหัสขึ้นมาเพื่ออัพเดท
        $Portfolio = new Portfolio();
        $max = $Portfolio->Max_id();

        if (!empty($_FILES)) {
            $tempFile = $_FILES['Filedata']['tmp_name'];
            $targetPath = $_SERVER['DOCUMENT_ROOT'] . $targetFolder;
            $FileName = time() . $_FILES['Filedata']['name'];
            $targetFile = rtrim($targetPath, '/') . '/' . $FileName;

            // Validate the file type
            $fileTypes = array('jpg', 'jpeg', 'gif', 'png'); // File extensions
            $fileParts = pathinfo($_FILES['Filedata']['name']);

            if (in_array($fileParts['extension'], $fileTypes)) {
                move_uploaded_file($tempFile, $targetFile);

                //สั่งอัพเดท
                $columns = array(
                    "img" => $FileName
                );

                \Yii::$app->db->createCommand()
                        ->update("portfolio", $columns, "id = '$max' ")
                        ->execute();
                echo '1';
            } else {
                echo 'Invalid file type.';
            }
        }
    }

    public function actionSave_portfolio() {
        $columns = array(
            "title" => $_POST['title'],
            "detail" => $_POST['detail']
        );

        \Yii::$app->db->createCommand()
                ->insert("portfolio", $columns)
                ->execute();

        $Portfolio = new Portfolio();
        $max = $Portfolio->Max_id();

        $json = array("id" => $max);
        echo json_encode($json);
    }

    public function actionDelete_portfolio() {
        $id = $_POST['id'];
        $portfolio = new Portfolio();
        $rs = $portfolio->GetById($id);
        if (isset($rs['img'])) {
            unlink('upload/portfolio/' . $rs['img']);
        }

        \Yii::$app->db->createCommand()
                ->delete("portfolio", "id = '$id' ")
                ->execute();
    }

    public function actionEdit($id = null) {
        $portfolio = new Portfolio();
        //$id = $_GET['id'];
        $data['port'] = $portfolio->GetById($id);
        return $this->render('//backend/portfolio/edit', $data);
    }

    public function actionEdit_portfolio() {
        $id = $_POST['id'];
        $columns = array(
            "title" => $_POST['title'],
            "detail" => $_POST['detail']
        );

        \Yii::$app->db->createCommand()
                ->update("portfolio", $columns, "id = '$id' ")
                ->execute();
    }

    public function actionUpload_edit($id = null) {
        //สั่งลบรูปภาพเดิมก่อน
        $portfolio = new Portfolio();
        $port = $portfolio->GetById($id);
        if (isset($port['img'])) {
            unlink('upload/portfolio/' . $port['img']);
        }

        // Define a destination
        $targetFolder = Url::base() . '/upload/portfolio'; // Relative to the root
        //ดึงรหัสขึ้นมาเพื่ออัพเดท
        $Portfolio = new Portfolio();
        $max = $Portfolio->Max_id();

        if (!empty($_FILES)) {
            $tempFile = $_FILES['Filedata']['tmp_name'];
            $targetPath = $_SERVER['DOCUMENT_ROOT'] . $targetFolder;
            $FileName = time() . $_FILES['Filedata']['name'];
            $targetFile = rtrim($targetPath, '/') . '/' . $FileName;

            // Validate the file type
            $fileTypes = array('jpg', 'jpeg', 'gif', 'png'); // File extensions
            $fileParts = pathinfo($_FILES['Filedata']['name']);

            if (in_array($fileParts['extension'], $fileTypes)) {
                move_uploaded_file($tempFile, $targetFile);

                //สั่งอัพเดท
                $columns = array(
                    "img" => $FileName
                );

                \Yii::$app->db->createCommand()
                        ->update("portfolio", $columns, "id = '$id' ")
                        ->execute();
                echo '1';
            } else {
                echo 'Invalid file type.';
            }
        }
    }

    public function actionDetail() {
        $id = $_GET['id'];
        $data['portfolio_id'] = $id;
        return $this->render('//backend/portfolio/detail', $data);
    }

}
