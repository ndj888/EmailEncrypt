<?php
/**
 * Created by PhpStorm.
 * User: longbob
 * Date: 2020-02-27
 * Time: 16:37
 */

namespace EmailEncrypt\Lib;


class EmailEncrypt
{
    public static function encode(string $email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) return false;
        $prefix = explode('@', $email)[0];
        $newPreFix = StrEncrypt::encode($prefix);
        return str_replace($prefix, $newPreFix, $email);
    }

    public static function decode(string $email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) return false;
        $prefix = explode('@', $email)[0];
        $newPreFix = StrEncrypt::decode($prefix);
        return str_replace($prefix, $newPreFix, $email);
    }
}