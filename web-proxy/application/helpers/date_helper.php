<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');




if ( ! function_exists('epochGreaterEqualThenNow'))
{

    function epochGreaterEqualThenNow($epochValue)
    {
        $time         = time();
        $newDate      = date(('Y-m-d H:i:s'),$time);
        $timestamp    = date_create($newDate);
        $nowTimestamp = $timestamp->getTimestamp();

        return  ($epochValue >= $nowTimestamp) ? 1 : 0;
    }
}

if ( ! function_exists('date_mysql'))
{

    function date_mysql($time = NULL)
    {
        if(!$time)
        {
            $time = time();
        }

        $newDate = date(('Y-m-d H:i:s'),$time);

        return  $newDate;
    }

}

if ( ! function_exists('dateOnlyMySQL'))
{

    function dateOnlyMySQL($time = NULL)
    {
        if(!$time)
        {
            $time= time();
        }
        return date(('Y-m-d'),$time);
    }

}

if ( ! function_exists('validate_mysql_date'))
{

    function validate_mysql_date( $date ){
        if (preg_match("/^(\d{4})-(\d{2})-(\d{2}) ([01][0-9]|2[0-3]):([0-5][0-9]):([0-5][0-9])$/", $date, $matches)) {

            if (checkdate($matches[2], $matches[3], $matches[1])) {
                return true;
            }
        }
        return false;
    }

}

if ( ! function_exists('validate_mysql2Dates'))
{

    function validate_mysql2Dates( $beforeDate,$afterDate ){

        $v_before =  validate_mysql_date( $beforeDate );
        $v_after =  validate_mysql_date( $afterDate );

        if($v_before == false || $v_after == false)
            return 0;


        $beforeObject = new DateTime($beforeDate);
        $beforeTimeStamp = $beforeObject->getTimestamp();

        $afterObject = new DateTime($afterDate);
        $afterTimeStamp = $afterObject->getTimestamp();


        return  ($beforeTimeStamp < $afterTimeStamp) ? 1 : 0;




        return true;
    }

}

if (!function_exists('adjustDateTimeForCloseQuarter'))
{
    function adjustDateTimeForCloseQuarter($mysql_date){

        try{
            $flag =  validate_mysql_date( $mysql_date );

            if($flag==false) //not a correct mysql date
                return 0;


            $quarters = array( 0 => 15 , 15 => 30 , 30 => 45 , 45 => 60); // bring to the closest index or value the minutes 17 -> 15 or 31 ->30

            // the template of mysql datetime is (2014:08:04 14:12:01)
            $minutes  = substr($mysql_date, 14, 2);
            $hours    = substr($mysql_date, 11, 2);

            foreach ($quarters as  $key => $val)
            {

                if($minutes > $key && $minutes < $val )
                {
                    $minutes = $key;
                }
            }

            $minutesLength = strlen($minutes);

            if($minutesLength == 1)
                $minutes = "0".$minutes;
            if($minutesLength == 0)
                $minutes == "00";


            $time = $hours.":".$minutes.":00"; //set the new time 23:12:10  ==> 23:00:00

            $newDateTime = date(('Y-m-d'),strtotime($mysql_date));
            $newDateTime = date(('Y-m-d  H:i:s'),strtotime($newDateTime ." ".$time));



            $timestamp = date_create($newDateTime);
            $timestamp = $timestamp->getTimestamp();


            return $timestamp;

        }
        catch (TimeVaryingException $e){
            log_message('error',"Class   : ".__CLASS__. " , Function : ".__FUNCTION__."  thrown an exception , this is the error message : ".$e->getMessage());
            $this->graylog->insert(__FUNCTION__ , "CRIT", __FILE__, __LINE__, "Exception thrown in".__FUNCTION__."", $e->getMessage(),null);
            show_error($e->getMessage(),503);
        }
        catch (Exception $e){
            log_message('error',"Class   : ".__CLASS__. " , Function : ".__FUNCTION__."  thrown an exception , this is the error message : ".$e->getMessage());
            $this->graylog->insert(__FUNCTION__ , "CRIT", __FILE__, __LINE__, "Exception thrown in".__FUNCTION__."", $e->getMessage(),null);
            show_error($e->getMessage(),503);
        }
    }
}

if(! function_exists('createUnixTimeStamp'))
{
    function createUnixTimeStamp($mysqlDateTime)
    {
        try{


            $date = date_mysql($mysqlDateTime);

            // echo $mysqlDateTime."<br>";
            $flag =  validate_mysql_date( $date );

            if($flag==false) //not a correct mysql date
                return 0;

            $date = new DateTime($date);
            $date->getTimestamp();

            return  $date->getTimestamp();


        }
        catch (TimeVaryingException $e){
            log_message('error',"Class   : ".__CLASS__. " , Function : ".__FUNCTION__."  thrown an exception , this is the error message : ".$e->getMessage());
            $this->graylog->insert(__FUNCTION__ , "CRIT", __FILE__, __LINE__, "Exception thrown in".__FUNCTION__."", $e->getMessage(),null);
            show_error($e->getMessage(),503);
        }
        catch (Exception $e){
            log_message('error',"Class   : ".__CLASS__. " , Function : ".__FUNCTION__."  thrown an exception , this is the error message : ".$e->getMessage());
            $this->graylog->insert(__FUNCTION__ , "CRIT", __FILE__, __LINE__, "Exception thrown in".__FUNCTION__."", $e->getMessage(),null);
            show_error($e->getMessage(),503);
        }

    }



}




if ( ! function_exists('validate_mysql_time'))
{

    function validate_mysql_time( $time){


        $timeRegex1 = "/([0-9]+):([0-5]?[0-9]):([0-5]?[0-9])/";
        //  $timeRegex1 = "/^(?:(?:([01]?\d|2[0-3]):)?([0-5]?\d):)?([0-5]?\d)$/";

        if (preg_match("/^(?:(?:([01]?\d|2[0-3]):)?([0-5]?\d):)?([0-5]?\d)$/", $time, $matches)) {
            if (checktime($matches[1], $matches[2], $matches[3])) {


                return 1;
            }
        }


        if (preg_match("/^(?:(?:([01]?\d|2[0-3]):)?([0-5]?\d))$/", $time, $matches)) {

            if (checktime($matches[1], $matches[2], null)) {
                print_r($matches);

            }

        }
        return 0;
    }


}


if ( ! function_exists('checktime'))
{
    function checktime($hour = null, $min = null, $sec = null) {


        if( $hour == null)
            return 0;
        if( $min == null)
            return 0;

        if($sec ==null)
        {

            if ( $hour < 0 || $hour > 23 || !is_numeric($hour)) {
                return 0;
            }
            if ($min < 0 || $min > 59 || !is_numeric($min)) {
                return 0;
            }

        }
        else
        {

            if ( $hour < 0 || $hour > 23 || !is_numeric($hour)) {
                return 0;
            }
            if ($min < 0 || $min > 59 || !is_numeric($min)) {
                return 0;
            }
            if ($sec < 0 || $sec > 59 || !is_numeric($sec)) {
                return 0;
            }

        }
        return 1;

    }
}







if ( ! function_exists('validate_mysql2Dates'))
{

    function validate_mysql2Dates( $beforeDate,$afterDate ){

        $v_before =  validate_mysql_date( $beforeDate );
        $v_after =  validate_mysql_date( $afterDate );

        if($v_before == false || $v_after == false)
            return 0;


        $beforeObject = new DateTime($beforeDate);
        $beforeTimeStamp = $beforeObject->getTimestamp();

        $afterObject = new DateTime($afterDate);
        $afterTimeStamp = $afterObject->getTimestamp();


        return  ($beforeTimeStamp < $afterTimeStamp) ? 1 : 0;




        return true;
    }

}

if ( ! function_exists('getExpirationDate'))
{
    function getExpirationDate($time = null , $numberOfDays ,$offset)
    {
        try{
            $date =  date_mysql($time);
            //add days
            if($numberOfDays >=  0)
            {
                $temp_date = date(('Y-m-d H:i:s'), strtotime($date .' + '.$numberOfDays.' day'));
            }
            else
            {
                $abs_numberOfDays =abs($numberOfDays);
                $temp_date = date(('Y-m-d H:i:s'), strtotime($date .' - '.$abs_numberOfDays.' day'));
            }
            //add offset
            if($offset  >=  0 )
                $next_date = date(('Y-m-d H:i:s'),strtotime($temp_date. " + ".$offset." hours "));
            else
            {
                $abs_offset =abs($offset);
                $next_date = date(('Y-m-d H:i:s'),strtotime($temp_date. " - ".$abs_offset." hours "));
            }




            return  setDefaultTime($next_date,null);

        }
        catch (Exception $e){
            log_message('error',"Class   : ".__CLASS__. " , Function : ".__FUNCTION__."  thrown an exception , this is the error message : ".$e->getMessage());
            $this->graylog->insert(__FUNCTION__ , "CRIT", __FILE__, __LINE__, "Exception thrown in".__FUNCTION__."", $e->getMessage(),null);
            show_error($e->getMessage(),503);
        }

    }



    if ( ! function_exists('setDefaultTime'))
    {
        function setDefaultTime($date=null,$time=null)
        {
            try{

                if($date ==null)
                    throw new MissingParamsException(MISSING_PARAM_MSG_EXCEPTION,MISSING_PARAM_EXCEPTION_CODE);
                if($time ==null)
                    $time = DEFAULT_CHECKOUT_TIME;

                $newDateTime = date(('Y-m-d'),strtotime($date));
                $newDateTime = date(('Y-m-d  H:i:s'),strtotime($newDateTime ." ".$time));


                return $newDateTime;

            }

            catch (MissingParamsException $e){
                $result = array('status' => $e->getCode(), 'message' => $e->getMessage() , 'result' =>null );
                return $result;
            }
            catch (Exception $e){
                $result = array('status' => $e->getCode(), 'message' => $e->getMessage() , 'result' =>null );
                return $result;
            }

        }

    }

}

if ( ! function_exists('getDateIntervalFromToday'))
{
    function getDateIntervalFromToday($time = null , $numberOfDays ,$offset)
    {
        try{
            $date =  date_mysql($time);
            //add days
            if($numberOfDays >=  0)
            {
                $temp_date = date(('Y-m-d H:i:s'), strtotime($date .' + '.$numberOfDays.' day'));
            }
            else
            {
                $abs_numberOfDays =abs($numberOfDays);
                $temp_date = date(('Y-m-d H:i:s'), strtotime($date .' - '.$abs_numberOfDays.' day'));
            }
            //add offset
            if($offset  >=  0 )
                $next_date = date(('Y-m-d H:i:s'),strtotime($temp_date. " + ".$offset." hours "));
            else
            {
                $abs_offset =abs($offset);
                $next_date = date(('Y-m-d H:i:s'),strtotime($temp_date. " - ".$abs_offset." hours "));
            }




            return  $next_date;

        }
        catch (Exception $e){
            log_message('error',"Class   : ".__CLASS__. " , Function : ".__FUNCTION__."  thrown an exception , this is the error message : ".$e->getMessage());
            $this->graylog->insert(__FUNCTION__ , "CRIT", __FILE__, __LINE__, "Exception thrown in".__FUNCTION__."", $e->getMessage(),null);
            show_error($e->getMessage(),503);
        }

    }

}
