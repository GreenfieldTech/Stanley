<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');



if ( ! function_exists('representThreeDigits'))
{

    function representThreeDigits($number)
    {

        if(is_numeric($number)){

            $length = strlen($number);

            if($length == 1)
            {
                $number = '00'.$number;
                return $number;
            }
            elseif($length == 2)
            {
                $number = '0'.$number;
                return $number;
            }
            else
                return $number;

        }
    }
}


if ( ! function_exists('representFourDigits'))
{

    function representFourDigits($number)
    {

        if(is_numeric($number)){

            $length = strlen($number);

            if($length == 1)
            {
                $number = '000'.$number;
                return $number;
            }
            elseif($length == 2)
            {
                $number = '00'.$number;
                return $number;
            }
            elseif($length == 3)
            {
                $number = '0'.$number;
                return $number;
            }
            else
                return $number;

        }
    }
}