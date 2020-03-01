<?php

class User
{
    public static function findIdUserByEmail($email)
    {
        $db = Db::getConnection();
        $sql = 'SELECT id FROM user WHERE email = :email';

        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();

        return $result->fetch();
    }

    public static function addUser($email, $name)
    {
        $db = Db::getConnection();
        $sql = 'INSERT INTO user (email, name) VALUES (:email, :name)';

        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->execute();

        return $db->lastInsertId();
    }

    public static function checkName($name)
    {
        if (strlen($name) >= 2) {
            return true;
        }
        return false;
    }

    public static function checkEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }
}