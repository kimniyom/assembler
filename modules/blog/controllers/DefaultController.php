<?php

namespace app\modules\blog\controllers;

use yii\web\Controller;

class DefaultController extends Controller {

    public $layout = "blog";

    public function actionIndex() {

        $blog = new \app\modules\blog\models\Blog();
        $data['blog_page'] = $blog->GetLastBlog();
        return $this->render('index', $data);
    }

}
