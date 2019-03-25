<?php

/**
 * Class User
 */
class User
{
    /**
     * check valid login value
     * @param string $login
     * @return bool
     */
    public static function checkLogin(string $login) : bool
    {
        if(strlen($login) >= 3) {
            return true;
        }
        else return false;
    }

    /**
     * check valid email value
     * @param string $email
     * @return bool
     */
    public static function checkEmail(string $email) : bool
    {
        if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        else return false;
    }

    /**
     * check valid password value
     * @param string $password
     * @return bool
     */
    public static function checkPassword(string $password) : bool
    {
        if(strlen($password) >= 6) {
            return true;
        }
        else return false;
    }

    /**
     * check email on unique prop
     * @param string $email
     * @return bool
     */
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

    /**
     * register user
     * @param string $login
     * @param string $email
     * @param string $password
     * @return bool
     */
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

    public static function checkUserData(string $email, string $password)
    {
        $db = Database::getConnection();

        $sql = 'SELECT * from user where email = :email and password = :password';

        $result = $db->prepare($sql);
//        $result->bindParam(":email", $email, PDO::PARAM_INT);
//        $result->bindParam(":password", $password, PDO::PARAM_INT);
        $result->execute(['email' => $email, 'password' => $password]);

        $user = $result->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            return $user['id'];
        }

        return false;
    }

    public static function auth(int $userId)
    {
        session_start();
        $_SESSION['user'] = $userId;
    }

    public static function checkLogged()
    {
        if(isset($_SESSION['user'])) {
            return $_SESSION['user'];
        }

        header("Location: /user/login/");
    }
}