<?php

namespace App\Services;

use App\Models\User;
use Core\Database\Database;

class Auth
{

    public $isAuthenticated = false;
    public User $user;

    public function __construct()
    {
    }

    public static function login(User $user)
    {
        session_start();

        $access_token = md5(uniqid(rand(), true));

        $_SESSION["user_id"] = $user->id;
        $_SESSION['session_id'] = $access_token;

        $expiration_time = date('Y-m-d H:i:s', time() + 3600);

        $sql = "INSERT INTO access_tokens
        (user_id, access_token, expiration_time) VALUES (:user_id, :access_token, :expiration_time)";

        $db = app()->make(Database::class);
        $stmt = $db->prepare($sql);

        $stmt->bindValue(":user_id", $user->id);
        $stmt->bindValue(":access_token", $access_token);
        $stmt->bindValue(":expiration_time", $expiration_time);

        $stmt->execute();
    }

    public static function logout(){
        session_start();
        session_destroy();
    }

    public function getIsAuthenticated()
    {
        return $this->isAuthenticated;
    }

    public function getUser()
    {
        if (!isset($this->user)) return null;

        return $this->user;
    }

    public function setAuthenticated(bool $flag)
    {
        $this->isAuthenticated = $flag;
    }

    public function setUser($user)
    {
        $this->user = $user;
    }

    public static function isAuth()
    {
        return app()->make(self::class)->getIsAuthenticated();
    }

    public static function user()
    {
        return app()->make(self::class)->getUser();
    }
}
