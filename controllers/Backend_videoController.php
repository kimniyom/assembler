<?php

namespace app\controllers;

use yii\web\Controller;
use app\models\Book;
use yii\helpers\Url;
use app\models\Video;

class Backend_videoController extends Controller {

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

    public function actionSave_category() {
        $column = array(
            "category" => $_POST['category'],
            "detail" => $_POST['detail']
        );
        \Yii::$app->db->createCommand()
                ->insert("video_category", $column)
                ->execute();
    }

    public function actionEdit_category() {
        $id = $_POST['id'];
        $column = array(
            "category" => $_POST['category'],
            "detail" => $_POST['detail']
        );
        \Yii::$app->db->createCommand()
                ->update("video_category", $column, "id = '$id' ")
                ->execute();
    }

    public function actionIndex() {
        $video = new Video();
        $data['category'] = $video->GetCategoryAll();
        return $this->render('//backend/video/category_view', $data);
    }

    public function actionVideo() {
        $categoryId = $_GET['category_id'];

        $video = new Video();
        $data['cat'] = $video->GetCategoryById($categoryId);
        $data['video'] = $video->GetVideoByCategoryId($categoryId);
        return $this->render('//backend/video/video_view', $data);
    }

    public function actionSave_video() {
        $column = array(
            "video_title" => $_POST['video_title'],
            "video_detail" => $_POST['video_detail'],
            "category_id" => $_POST['category_id'],
            "create_by" => \Yii::$app->session['assembler']['user_id']
        );
        \Yii::$app->db->createCommand()
                ->insert("video", $column)
                ->execute();
    }

    public function actionEdit_video() {
        $id = $_POST['id'];
        $column = array(
            "video_title" => $_POST['video_title'],
            "video_detail" => $_POST['video_detail']
        );
        \Yii::$app->db->createCommand()
                ->update("video", $column, "id = '$id' ")
                ->execute();
    }

    public function actionFilevideo() {
        $categoryId = $_GET['category_id'];
        $videoId = $_GET['video_id'];

        $video = new Video();
        $data['cat'] = $video->GetCategoryById($categoryId);
        $data['video'] = $video->GetVideoById($videoId);
        $data['file'] = $video->GetVideoFileByVideoId($videoId);
        return $this->render('//backend/video/file_view', $data);
    }

    public function actionSave_filevideo() {
        $column = array(
            "file_name" => $_POST['file_name'],
            "youtube_id" => $_POST['youtube_id'],
            "video_id" => $_POST['video_id'],
            "detail" => $_POST['detail'],
            "create_by" => \Yii::$app->session['assembler']['user_id']
        );
        \Yii::$app->db->createCommand()
                ->insert("video_file", $column)
                ->execute();
    }

    public function actionForm_edit_filevideo() {
        $categoryId = $_GET['category_id'];
        $videoId = $_GET['video_id'];
        $id = $_GET['id'];

        $video = new Video();
        $data['cat'] = $video->GetCategoryById($categoryId);
        $data['video'] = $video->GetVideoById($videoId);
        $data['file'] = $video->GetVideoFileById($id);
        return $this->render('//backend/video/file_edit', $data);
    }

    public function actionEdit_filevideo() {
        $id = $_POST['id'];
        $column = array(
            "file_name" => $_POST['file_name'],
            "youtube_id" => $_POST['youtube_id'],
            "detail" => $_POST['detail'],
        );
        \Yii::$app->db->createCommand()
                ->update("video_file", $column, "id = '$id' ")
                ->execute();
    }

    public function actionGet_detail() {
        $id = $_POST['id'];
        $video = new Video();
        $rs = $video->GetVideoFileById($id);
        echo $rs['detail'];
    }

}
