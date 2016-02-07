<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Portfolio;

class SiteController extends Controller {

    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex() {
        $port = new Portfolio();
        //$data['result'] = $port->GetPortfolio();
        $get_total_rows = $port->Total();
        $data['total_pages'] = ceil($get_total_rows / 6);
        return $this->render('index', $data);
    }

    public function actionGetmore() {
//sanitize post value
        $page_number = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);

        if (!is_numeric($page_number)) {
            header('HTTP/1.1 500 Invalid page number!');
            exit();
        }
        $position = ($page_number * 6);

        $sql = "SELECT * FROM portfolio ORDER BY id DESC LIMIT $position, 6";
        $result = Yii::$app->db->createCommand($sql)->queryAll();
//output results from database
        echo "<ol class=\"dribbbles group\" style=\"padding-left: 0px;\">";
        $i = 0;
        foreach ($result as $rs) {
            $i++;
            $img = "portfolio/" . $rs['img'];
            echo "<li id = \"screenshot-$i\" class = \"col-lg-4 col-md-4 col-sm-6\">
                        <div class = \"dribbble\">
                            <div class = \"dribbble-shot\">
                                <div class = \"dribbble-img\">
                                    <a class = \"dribbble-link\" href = \"javascript:dialog_images('" . $img . "');\">
                                        <div data-picture data-alt = \"Retinabbble - Chrome extension for dribbble\">
                                            <img src = '" . \yii\helpers\Url::to('upload/portfolio/' . $rs['img']) . "'/>
                                        </div>
                                    </a>
                                    <a class = \"dribbble-over\" href = \"javascript:dialog_images('" . $img . "');\" style = \" height: 100%;\"><b>" . $rs['title'] . "</b><br/>
                                    <div class=\"btn btn-default\" style=\"border-radius: 0px; border: solid #00b3ee 1px;\">
                                        <span class=\"glyphicon glyphicon-fullscreen\"> </span> ขยาย
                                    </div>
                                    </a>
                                </div>
                        </div>
                </div>
            </li>";
        }
        echo "</ol>";
    }

    public function actionLogin() {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                        'model' => $model,
            ]);
        }
    }

    public function actionLogout() {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact() {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        } else {
            return $this->render('contact', [
                        'model' => $model,
            ]);
        }
    }

    public function actionAbout() {
        return $this->render('about');
    }

}
