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

    /**
     * Проверка на существование пользователя с переданными параметрами в БД
     * @param string $email
     * @param string $password
     * @return bool
     */
    public static function checkUserData(string $email, string $password)
    {
        $db = Database::getConnection();

        $sql = 'SELECT * from user where email = :email and password = :password';

        $result = $db->prepare($sql);
        $result->execute(['email' => $email, 'password' => $password]);

        $user = $result->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            return $user['id'];
        }

        return false;
    }

    /**
     * Аунтефикация пользователя
     * @param int $userId
     */
    public static function auth(int $userId)
    {
        $_SESSION['user'] = $userId;
    }

    /**
     * Проверяет залогинин ли пользователь, если нет, перенаправляет его на страницу входа на сайт
     * @return mixed
     */
    public static function checkLogged()
    {
        if(isset($_SESSION['user'])) {
            return $_SESSION['user'];
        }

        header("Location: /user/login/");
    }

    /**
     * Проверяет является ли посетитель сайта гостем или зарегестрированным пользователем
     * @return bool
     */
    public static function isGuest() : bool
    {
        if(isset($_SESSION['user'])) {
            return false;
        }

        return true;
    }

    /**
     * Получает пользователя по $id
     * @param int $id
     * @return mixed
     */
    public static function getUserById(int $id)
    {
        $db = Database::getConnection();

        $sql = 'SELECT * from user where id = :id';

        $result = $db->prepare($sql);

        $result->execute(['id' => $id]);

        return $result->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Редактирует данные пользователя в БД
     * @param int $id
     * @param string $login
     * @param string $password
     * @return bool
     */
    public static function edit(int $id, string $login, string $password)
    {
        $db = Database::getConnection();

        $sql = 'UPDATE user SET login = :login, password= :password WHERE id= :id';

        $result = $db->prepare($sql);

        return $result->execute(['login' => $login, 'password' => $password, 'id' => $id]);
    }
}