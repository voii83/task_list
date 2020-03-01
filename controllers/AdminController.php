<?php

class AdminController
{
    public function actionLogin(){
        $name = false;
        $password = false;

        if (isset($_POST['submit'])) {

            $name = $_POST['name'];
            $password = $_POST['password'];

            $errors = false;

            $admin = Admin::checkAdminData($name);

            if ($admin['name'] && password_verify($password, $admin['pass'])) {
                Admin::auth($admin['id']);
                header("Location: /");
            } else {
                $errors[] = 'Неправильные данные для входа на сайт';
            }
        }

        require_once(ROOT . '/views/admin/login.php');
        return true;
    }

    public function actionLogout()
    {
        if (isset($_SESSION['admin'])) {
            unset($_SESSION["admin"]);
        }
        header("Location: /");
    }
}