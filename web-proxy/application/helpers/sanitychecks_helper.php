<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


if ( ! function_exists('check_email_format'))
{
    function check_email_format($email)
    {
        try{
            $re = '/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/';
            $match1 = preg_match($re, $email);
            if(! $match1)
                return false;

            return true;
        }
        catch (Exception $e){
            log_message('error',"Class   : ".__CLASS__. " , Function : ".__FUNCTION__."  thrown an exception , this is the error message : ".$e->getMessage());
            $this->graylog->insert(__FUNCTION__ , "CRIT", __FILE__, __LINE__, "Exception thrown in".__FUNCTION__."", $e->getMessage(),null);
            show_error($e->getMessage(),503);
        }
    }
}


if ( ! function_exists('check_mobile_phone_format'))
{
    function check_mobile_phone_format($email)
    {
        try{
            $re = '/^(\d[-\s]?){6,11}\d$/';
            $match1 = preg_match($re, $email);
            if(! $match1)
                return false;

            return true;
        }
        catch (Exception $e){
            log_message('error',"Class   : ".__CLASS__. " , Function : ".__FUNCTION__."  thrown an exception , this is the error message : ".$e->getMessage());
            $this->graylog->insert(__FUNCTION__ , "CRIT", __FILE__, __LINE__, "Exception thrown in".__FUNCTION__."", $e->getMessage(),null);
            show_error($e->getMessage(),503);
        }

    }




}

if ( ! function_exists('check_mobile_phone_format'))
{
    function check_mobile_phone_format($email)
    {
        try{
            $re = '/^(\d[-\s]?){6,11}\d$/';
            $match1 = preg_match($re, $email);
            if(! $match1)
                return false;

            return true;
        }
        catch (Exception $e){
            log_message('error',"Class   : ".__CLASS__. " , Function : ".__FUNCTION__."  thrown an exception , this is the error message : ".$e->getMessage());
            $this->graylog->insert(__FUNCTION__ , "CRIT", __FILE__, __LINE__, "Exception thrown in".__FUNCTION__."", $e->getMessage(),null);
            show_error($e->getMessage(),503);
        }

    }




}

