<?php
namespace App\Core;

class Auth
{
    protected static $user = null;

    public static function setUser($user)
    {
        self::$user = $user;
    }

    public static function user()
    {
        return self::$user;
    }

    public static function check()
    {
        return self::$user !== null;
    }

    public static function hasPermission($permission)
    {
        $user = self::$user;

        foreach ($user->roles as $role) {
            foreach ($role->permissions as $perm) {
                if ($perm->name === $permission) {
                    return true;
                }
            }
        }

        return false;
    }
}