<?php

namespace App;

class Validator
{
    /**
     * 是否為合法的 email
     *
     * @param string $email
     * @return bool
     */
    public static function isEmail($email): bool
    {
        return ! static::isNotEmail($email);
    }

    /**
     * 是否「不為」合法的 email
     *
     * @param string $email
     * @return bool
     */
    public static function isNotEmail($email)
    {
        return false === filter_var($email, FILTER_VALIDATE_EMAIL);
    }
}
