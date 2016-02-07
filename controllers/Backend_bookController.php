<?php

namespace app\controllers;

use yii\web\Controller;
use app\models\Book;
use yii\helpers\Url;

class Backend_bookController extends Controller {

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
        $book = new Book();
        $data['book'] = $book->GetBookTypeAll();
        return $this->render('//backend/book/index', $data);
    }

    public function actionSave_booktype() {
        $columns = array(
            "book_type" => $_POST['booktype']
        );

        \Yii::$app->db->createCommand()
                ->insert("book_type", $columns)
                ->execute();
    }

    public function actionSave_book() {
        $columns = array(
            "type_id" => $_POST['type_id'],
            "book_name" => $_POST['book_name'],
            "book_detail" => $_POST['book_detail']
        );

        \Yii::$app->db->createCommand()
                ->insert("book", $columns)
                ->execute();
    }

    public function actionDelete_booktype() {
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

    public function actionEdit_booktype() {
        $portfolio = new Portfolio();
        $id = $_GET['id'];
        $data['port'] = $portfolio->GetById($id);
        return $this->render('//backend/portfolio/edit', $data);
    }

    public function actionBook() {
        $type_id = $_GET['type_id'];
        $book = new Book();
        $type = $book->GetBookTypeById($type_id);
        $data['type_id'] = $type_id;
        $data['typename'] = $type['book_type'];
        $data['book'] = $book->GetBookByTypeId($type_id);
        return $this->render('//backend/book/bookview', $data);
    }

    public function actionUpload() {
// Define a destination
        $targetFolder = Url::base() . '/upload/book'; // Relative to the root
//ดึงรหัสขึ้นมาเพื่ออัพเดท
        $book = new Book();
        $max = $book->Max_id();

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
                        ->update("book", $columns, "id = '$max' ")
                        ->execute();
                echo '1';
            } else {
                echo 'Invalid file type.';
            }
        }
    }

    public function actionBook_edit() {
        $type_id = $_GET['type_id'];
        $book_id = $_GET['book_id'];
        $book = new Book();
        $type = $book->GetBookTypeById($type_id);
        $data['type_id'] = $type_id;
        $data['typename'] = $type['book_type'];
        $data['book'] = $book->GetBookByBookId($book_id);
        return $this->render('//backend/book/edit', $data);
    }

    public function actionSave_edit_book() {
        $id = $_POST['id'];
        $columns = array(
            "book_name" => $_POST['book_name'],
            "book_detail" => $_POST['book_detail']
        );

        \Yii::$app->db->createCommand()
                ->update("book", $columns, "id = '$id' ")
                ->execute();
    }

    public function actionUpload_edit($id = null) {
//สั่งลบรูปภาพเดิมก่อน
        $book = new Book();
        $book = $book->GetBookByBookId($id);
        if (isset($book['img'])) {
            unlink('upload/book/' . $book['img']);
        }

// Define a destination
        $targetFolder = Url::base() . '/upload/book'; // Relative to the root
//ดึงรหัสขึ้นมาเพื่ออัพเดท
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
                        ->update("book", $columns, "id = '$id' ")
                        ->execute();
                echo '1';
            } else {
                echo 'Invalid file type.';
            }
        }
    }

    public function actionDetail_book() {
        $type_id = $_GET['type_id'];
        $book_id = $_GET['book_id'];

        $bookModel = new Book();
        $data['type'] = $bookModel->GetBookTypeById($type_id);
        $data['book'] = $bookModel->GetBookByBookId($book_id);
        $data['file'] = $bookModel->GetFileByBookId($book_id);

        return $this->render('//backend/book/detail', $data);
    }

    public function actionDelete_book() {
        $book_id = $_POST['book_id'];
        $book = new Book();

        $file = $book->GetFileByBookId($book_id);
        if (!empty($file)) {
            foreach ($file as $files) {
                unlink('upload/book/' . $files['book_file']);
            }
        }

        \Yii::$app->db->createCommand()
                ->delete("book_file", "book_id = '$book_id' ")
                ->execute();

        $books = $book->GetBookByBookId($book_id);
        unlink('upload/book/' . $books['img']);

        \Yii::$app->db->createCommand()
                ->delete("book", "id = '$book_id' ")
                ->execute();
    }

    public function actionUpload_filebook($id = null) {

// Define a destination
        $targetFolder = Url::base() . '/upload/book'; // Relative to the root
//ดึงรหัสขึ้นมาเพื่ออัพเดท
        if (!empty($_FILES)) {
            $tempFile = $_FILES['Filedata']['tmp_name'];
            $targetPath = $_SERVER['DOCUMENT_ROOT'] . $targetFolder;
            $FileName = "File_" . time() . strtolower($_FILES['Filedata']['name']);
            $targetFile = rtrim($targetPath, '/') . '/' . $FileName;

// Validate the file type
            $fileTypes = array('jpg', 'jpeg', 'gif', 'png', 'zip', 'rar', 'doc', 'docx', 'pdf'); // File extensions*.gif; *.jpg; *.png; *zip; *rar; *doc; *docx; *pdf
            $fileParts = pathinfo(strtolower($_FILES['Filedata']['name']));

            if (in_array($fileParts['extension'], $fileTypes)) {
                move_uploaded_file($tempFile, $targetFile);

//สั่งอัพเดท
                $columns = array(
                    "book_id" => $id,
                    "book_file" => $FileName
                );

                \Yii::$app->db->createCommand()
                        ->insert("book_file", $columns)
                        ->execute();
                echo '1';
            } else {
                echo 'Invalid file type.';
            }
        }
    }

    public function actionDelete_file() {
        $id = $_POST['id'];
        $book = new Book();
        $rs = $book->GetFileByFileId($id);

        if (isset($rs['book_file'])) {
            unlink('upload/book/' . $rs['book_file']);
        }

        \Yii::$app->db->createCommand()
                ->delete("book_file", "id = '$id' ")
                ->execute();
    }

}
