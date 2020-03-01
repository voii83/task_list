<?php

class Admin
{
    public static function checkAdminData($name)
    {
        $db = Db::getConnection();
        $sql = 'SELECT * FROM admin WHERE name = :name';

        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->execute();

        $admin = $result->fetch(PDO::FETCH_ASSOC);

        if ($admin) {
            return $admin;
        }
        return false;
    }

    public static function auth($adminId)
    {
        $_SESSION['admin'] = $adminId;
    }

    public static function checkLogged()
    {
        if (isset($_SESSION['admin'])) {
            return $_SESSION['admin'];
        }

        return false;
    }

    public static function getNameAdminById($id) {
        $db = Db::getConnection();
        $sql = 'SELECT * FROM admin WHERE id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->execute();

        $admin = $result->fetch(PDO::FETCH_ASSOC);
        if ($admin) {
            return $admin['name'];
        }
        return '';
    }


}