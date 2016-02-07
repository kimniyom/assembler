<?php

namespace app\modules\blog\controllers;

use Yii;
use yii\web\Controller;
use app\modules\blog\models\Blog;

class BlogController extends Controller {

    public $layout = "blog";

    public function actionBlog_detail() {
        $Id = $_GET['id'];
        $CategoryId = $_GET['category_id'];
        $blog = new Blog();
        $data['page'] = $blog->GetBlogPageById($Id);
        $data['category'] = $blog->GetCategoryById($CategoryId);

        return $this->render('detail', $data);
    }

    public function actionBlog_page() {
        $CategoryId = $_GET['category_id'];
        $blog = new Blog();
        $data['blog_page'] = $blog->GetBlogPageByCategoryId($CategoryId);
        $data['category'] = $blog->GetCategoryById($CategoryId);
        return $this->render('blog_page', $data);
    }

}
