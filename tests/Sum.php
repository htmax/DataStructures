<?php

class Sum
{
    public static function sums($arr, $l)
    {
        if ($l < 0 || $l == count($arr) || $l > count($arr)) {
            return 0;
        }

        return $arr[$l] + self::sums($arr, $l + 1);
    }
}

$arr = [1, 2, 3, 4, 5, 6, 7, 8];
echo Sum::sums($arr, 0);