<?php

namespace App\Helpers;


class FuzzyAhp
{
    // ahp
    public static function invers($arr)
    {
        // invers
        foreach ($arr as $in_arr => $v_arr) {
            foreach ($v_arr as $in_varr => $r_arr) {
                $i_arr[$in_arr][$in_varr] = FuzzyAhp::inversMatriks($r_arr);
            }
        }

        // sesuaikan baris
        foreach ($i_arr as $key1 => $v_iArr) {
            $increment = 1;
            $decrement = $key1 - 1;
            for ($j = $key1 - 1; $j >= 0; $j--) {
                $get[$key1][] = Check::numFormat($i_arr[$increment++][$decrement--]);
            }
        }
        return $get;
    }

    public static function randomIndex($value)
    {
        switch ($value) {
            case 1:
                return 0;
                break;
            case 2:
                return 0;
                break;
            case 3:
                return 0.58;
                break;
            case 4:
                return 0.9;
                break;
            case 5:
                return 1.12;
                break;
            case 6:
                return 1.24;
                break;
            case 7:
                return 1.32;
                break;
            case 8:
                return 1.41;
                break;
            case 9:
                return 1.45;
                break;
            case 10:
                return 1.49;
                break;
        }
    }

    public static function inversMatriks($value)
    {
        switch ($value) {
            case '1':
                return 1;
                break;
            case '2':
                return 1 / 2;
                break;
            case '3':
                return 1 / 3;
                break;
            case '4':
                return 1 / 4;
                break;
            case '5':
                return 1 / 5;
                break;
            case '6':
                return 1 / 6;
                break;
            case '7':
                return 1 / 7;
                break;
            case '8':
                return 1 / 8;
                break;
            case '9':
                return 1 / 9;
                break;
            case '1/2':
                return 2;
                break;
            case '1/3':
                return 3;
                break;
            case '1/4':
                return 4;
                break;
            case '1/5':
                return 5;
                break;
            case '1/6':
                return 6;
                break;
            case '1/7':
                return 7;
                break;
            case '1/8':
                return 8;
                break;
            case '1/9':
                return 9;
                break;
            default:
                break;
        }
    }

    // fuzzy ahp
    public static function tringularFuzzy($value)
    {
        $satuPerDua = Check::numFormat(1 / 2);
        $satuPerTiga =  Check::numFormat(1 / 3);
        $satuPerEmpat = Check::numFormat(1 / 4);
        $satuPerLima = Check::numFormat(1 / 5);
        $satuPerEnam = Check::numFormat(1 / 6);
        $satuPerTujuh = Check::numFormat(1 / 7);
        $satuPerDelapan = Check::numFormat(1 / 8);
        $satuPerSembilan = Check::numFormat(1 / 9);

        switch ($value) {
            case 1:
                $l = 1;
                $m = 1;
                $u = 1;
                $tfn = [$l, $m, $u];
                return $tfn;
                break;
            case 2:
                $l = 1 / 2;
                $m = 1;
                $u = 3 / 2;
                $tfn = [$l, $m, $u];
                return $tfn;
                break;
            case 3:
                $l = 1;
                $m = 3 / 2;
                $u = 2;
                $tfn = [$l, $m, $u];
                return $tfn;
                break;
            case 4:
                $l = 3 / 2;
                $m = 2;
                $u = 5 / 2;
                $tfn = [$l, $m, $u];
                return $tfn;
                break;
            case 5:
                $l = 2;
                $m = 5 / 2;
                $u = 3;
                $tfn = [$l, $m, $u];
                return $tfn;
                break;
            case 6:
                $l = 5 / 2;
                $m = 3;
                $u = 7 / 2;
                $tfn = [$l, $m, $u];
                return $tfn;
                break;
            case 7:
                $l = 3;
                $m = 7 / 2;
                $u = 4;
                $tfn = [$l, $m, $u];
                return $tfn;
                break;
            case 8:
                $l = 7 / 2;
                $m = 4;
                $u = 9 / 2;
                $tfn = [$l, $m, $u];
                return $tfn;
                break;
            case 9:
                $l = 4;
                $m = 9 / 2;
                $u = 9 / 2;
                $tfn = [$l, $m, $u];
                return $tfn;
                break;

            case $satuPerDua:
                $l = 2 / 3;
                $m = 1;
                $u =  2;
                $tfn = [$l, $m, $u];
                return $tfn;
                break;
            case $satuPerTiga:
                $l = 1 / 2;
                $m = 2 / 3;
                $u = 1;
                $tfn = [$l, $m, $u];
                return $tfn;
                break;
            case $satuPerEmpat:
                $l = 2 / 5;
                $m = 1 / 2;
                $u = 2 / 3;
                $tfn = [$l, $m, $u];
                return $tfn;
                break;
            case $satuPerLima:
                $l = 1 / 3;
                $m = 2 / 5;
                $u = 1 / 2;
                $tfn = [$l, $m, $u];
                return $tfn;
                break;
            case $satuPerEnam:
                $l = 2 / 7;
                $m = 1 / 3;
                $u = 2 / 5;
                $tfn = [$l, $m, $u];
                return $tfn;
                break;
            case $satuPerTujuh:
                $l = 1 / 4;
                $m = 2 / 7;
                $u = 1 / 3;
                $tfn = [$l, $m, $u];
                return $tfn;
                break;
            case $satuPerDelapan:
                $l = 2 / 9;
                $m = 1 / 4;
                $u = 2 / 7;
                $tfn = [$l, $m, $u];
                return $tfn;
                break;
            case $satuPerSembilan:
                $l = 2 / 9;
                $m = 2 / 9;
                $u = 1 / 4;
                $tfn = [$l, $m, $u];
                return $tfn;
                break;
            default:
                null;
                break;
        }
    }

    public static function sintesisFuzzy($value)
    {
    }
}
