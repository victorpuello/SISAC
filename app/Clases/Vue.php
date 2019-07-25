<?php
/**
 * Created by PhpStorm.
 * User: INELMU
 * Date: 22/10/2018
 * Time: 7:28 PM
 */

namespace ATS\Clases;


class Vue
{
    public static function prop($name, $value)
    {
        return sprintf(":%s='%s'", $name, json_encode($value));
    }
}