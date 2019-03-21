<?php

class User
{
    public static function checkLogin(string $login) : bool
    {
        if(strlen($login) >= 3) {
            return true;
        }
        else return false;
    }

    public static function checkEmail(string $email) : bool
    {
        if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        else return false;
    }

    public static function checkPassword(string $password) : bool
    {
        if(strlen($password) >= 6) {
            return true;
        }
        else return false;
    }

    public static function checkEmailExists(string $email) : bool
    {
        $db = Database::getConnection();

        $sql = "SELECT count(*) from user where email = :email";

        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->execute();

        if($result->fetchColumn())
            return true;
        return false;
    }

    public static function register(string $login, string $email, string $password)
    {
        $db = Database::getConnection();

        $sql = "INSERT into user (login, email, password) values (:login, :email, :password)";

        $result = $db->prepare($sql);
        $result->bindParam(":login", $login, PDO::PARAM_STR);
        $result->bindParam(":email", $email, PDO::PARAM_STR);
        $result->bindParam(":password", $password, PDO::PARAM_STR);

        return $result->execute();
    }
}