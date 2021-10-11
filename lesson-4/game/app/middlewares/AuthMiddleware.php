<?php

namespace app\middlewares;

class AuthMiddleware
{
    // return bool
    public function check()
    {
        if (isset( $_SESSION['isAuth'])) {
            return $_SESSION['isAuth'];
        }

        return false;
    }
}