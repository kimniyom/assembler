<?php

namespace app\controllers;

use Yii;
use yii\base\Controller;
use app\models\Blog;

class Backend_blogController extends Controller {

    public $layout = "backend";

    public function actionIndex() {
        $Blog = new Blog();
        $data['category'] = $Blog->GetCategoryAll();
        return $this->render('//backend/blog/category_view', $data);
    }

    public function actionBlog_category_view() {
        
    }

    public function actionSave_category() {
        $culumns = array(
            "blog_category" => $_POST['blog_category']
        );

        Yii::$app->db->createCommand()
                ->insert("blog_category", $culumns)
                ->execute();
    }

    public function actionEdit_category() {
        $id = $_POST['id'];
        $culumns = array(
            "blog_category" => $_POST['blog_category']
        );

        Yii::$app->db->createCommand()
                ->update("blog_category", $culumns, "id = '$id' ")
                ->execute();
    }

    public function actionBlog_page() {
        $CategoryId = $_GET['category_id'];
        $blog = new Blog();
        $data['blog_page'] = $blog->GetBlogPageByCategoryId($CategoryId);
        $data['category'] = $blog->GetCategoryById($CategoryId);
        return $this->render('//backend/blog/blog_page', $data);
    }

    public function actionCreate_blog() {
        $CategoryId = $_GET['category_id'];
        $blog = new Blog();
        $data['category'] = $blog->GetCategoryById($CategoryId);
        return $this->render('//backend/blog/create', $data);
    }

    public function actionSaveblog() {
        $culumns = array(
            "title" => $_POST['title'],
            "detail" => $_POST['detail'],
            "category_id" => $_POST['category_id'],
            "create_by" => Yii::$app->session['assembler']['user_id'],
            "d_update" => date("Y-m-d H:i:s")
        );

        Yii::$app->db->createCommand()
                ->insert("blog_page", $culumns)
                ->execute();
    }

    public function actionBlog_detail() {
        $Id = $_GET['id'];
        $CategoryId = $_GET['category_id'];
        $blog = new Blog();
        $data['page'] = $blog->GetBlogPageById($Id);
        $data['category'] = $blog->GetCategoryById($CategoryId);

        return $this->render('//backend/blog/detail', $data);
    }

    public function actionEdit_blog() {
        $Id = $_GET['id'];
        $CategoryId = $_GET['category_id'];
        $blog = new Blog();
        $data['page'] = $blog->GetBlogPageById($Id);
        $data['category'] = $blog->GetCategoryById($CategoryId);
        return $this->render('//backend/blog/edit', $data);
    }

    public function actionSave_editblog() {
        $id = $_POST['id'];
        $culumns = array(
            "title" => $_POST['title'],
            "detail" => $_POST['detail'],
            //"category_id" => $_POST['category_id'],
            "create_by" => Yii::$app->session['assembler']['user_id'],
            "d_update" => date("Y-m-d H:i:s")
        );

        Yii::$app->db->createCommand()
                ->update("blog_page", $culumns, "id = '$id' ")
                ->execute();
    }

}
