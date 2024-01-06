<?php

namespace App\Middlewares;

use App\Models\User;
use App\Services\Auth;
use Closure;
use Core\Database\Database;
use Core\Request\Request;

class HasSession
{

    public function handle(Request $request, Closure $next)
    {
        session_start();

        if (isset($_SESSION['user_id']) && isset($_SESSION['session_id'])) {

            $user_id = $_SESSION['user_id'];
            $session_id = $_SESSION['session_id'];

            if ($this->verifyAccessToken($user_id, $session_id)) {
                $user = User::find($user_id);

                $auth = app()->make(Auth::class);
                $auth->setAuthenticated(true);
                $auth->setUser($user);
            }
        }

        return $next($request);
    }

    function verifyAccessToken($user_id, $session_id)
    {
        $db = app()->make(Database::class);

        $sql = "SELECT * FROM access_tokens WHERE user_id = :user_id";

        $stmt = $db->prepare($sql);

        $stmt->bindValue(":user_id", $user_id);
        $stmt->execute();
        $tokens = $stmt->fetchAll();

        foreach($tokens as $token) {
            if($token["access_token"] == $session_id && $token["expiration_time"] > date('Y-m-d H:i:s')){
                return true;
            }
        }

        return false;
    }
}
