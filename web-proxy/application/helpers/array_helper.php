<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');



if ( ! function_exists('isIncreasingRecursive'))
{
    function isIncreasingRecursive($arr,$lastValue = null)
    {
        try{
            if(! isset($arr) || ! is_array($arr) )
                throw new MissingParamsException(MISSING_PARAM_MSG_EXCEPTION,MISSING_PARAM_EXCEPTION_CODE);




            for($i=0;$i<count($arr);$i++)
            {
                if(is_array($arr[$i]))
                    $isIncreasing =    isIncreasingRecursive($arr[$i],$lastValue);

                else
                {
                    if($lastValue == null)
                        $lastValue = $arr[$i];

                    if(! is_numeric( $arr[$i]))
                        throw new ArrayNoneNumericException(ARRAY_NONE_NUMERIC_ELEMENTS_MSG,ARRAY_NONE_NUMERIC_ELEMENTS_CODE);

                    if($arr[$i] < $lastValue )
                    {
                        throw new Exception("The array is not strictly increasing",503);
                    }
                    else
                    {
                        $isIncreasing =true;
                        $lastValue = $arr[$i];
                    }
                }
            }
            return $isIncreasing;

        }

        catch (MissingParamsException $e)
        {
            return false;
        }

        catch (ArrayNoneNumericException $e)
        {
            return false;
        }
        catch (Exception $e)
        {
            return false;
        }
    }
}
if ( ! function_exists('removeArrayByValue')){
    function removeArrayByValue($needle , $matrix,$iTotal,$iFilteredTotal)
    {

         log_message('info', "And now ---->".json_encode($matrix));


        foreach($matrix as $key=>$vector)
        {

            foreach($vector as $val)
            {

                $position  = strpos($val, $needle); //will return false if not exists or the index


                if($position !== false)
                {


                    log_message('info', "key ---- >".$key);


                    $iTotal         = $iTotal -1;
                    $iFilteredTotal = $iFilteredTotal -1;

                    unset($matrix[$key]);

                    $matrix         = json_encode($matrix);
                    $matrix         = json_decode($matrix,TRUE);


                     log_message('info', "And now ---->".json_encode($matrix));

                    break;

                }

            }


          //  log_message('info', "And now ---->".json_encode($matrix));

        }


      //  log_message('info', "And now ---->".json_encode($matrix));


        $result =  array('matrix' =>$matrix ,'iTotal' =>$iTotal, 'iFilteredTotal' => $iFilteredTotal);

     //  log_message('info','The result ----->' . json_encode($result));

        return  array('matrix' =>$matrix ,'iTotal' =>$iTotal, 'iFilteredTotal' => $iFilteredTotal);

    }

}



if ( ! function_exists('isIncreasing')){
    function isIncreasing($arr)
    {
        $result =   isIncreasingRecursive($arr,$lastValue = null);

        if( $result == false)
            return array('status' => 503, 'message' => "The array is not strictly increasing");

        else
            return array('status' => 200, 'message' => "The array is  strictly increasing");

    }

}


if ( ! function_exists('hadDoubleValues'))
{
    function hadDoubleValues($arr)
    {
        try{
            if(! isset($arr) || ! is_array($arr) )
                throw new MissingParamsException(MISSING_PARAM_MSG_EXCEPTION,MISSING_PARAM_EXCEPTION_CODE);

            $newArray   =    nested_values($arr, $path="");
            $newArray =  array_count_values($newArray);

            foreach($newArray as $key=>$val)
            {
                if($val > 1)
                    throw new Exception("There are duplicates...");

            }
            return true;
        }
        catch (MissingParamsException $e)
        {
            return array('status' => $e->getCode(), 'message' => $e->getMessage());
        }


        catch (Exception $e)
        {
            return array('status' => 503, 'message' => "There are duplicates... in the floor nummering");
        }
    }

}
if ( ! function_exists('nested_values'))
{
    function nested_values($array, $path=""){
        $output = array();
        foreach($array as $key => $value) {
            if(is_array($value)) {
                $output = array_merge($output, nested_values($value, (!empty($path)) ? $path.$key."/" : $key."/"));
            }
            else $output[$path.$key] = $value;
        }
        return $output;
    }




}



if ( ! function_exists('mySortByKey'))
{

    function mySortByKey(&$array, $key) {
        $sorter=array();
        $ret=array();
        reset($array);
        foreach ($array as $ii => $va) {
            $sorter[$ii]=$va[$key];
        }
        asort($sorter);
        foreach ($sorter as $ii => $va) {
            $ret[]=$array[$ii];
        }
        $array=$ret;
    }

}


if ( ! function_exists('SortByKey'))
{

    function sortByKey(&$array, $orderBy) {

        $sortArray = array();

        foreach($array as $chunk){
            foreach($chunk as $key=>$value){
                if(!isset($sortArray[$key])){
                    $sortArray[$key] = array();
                }
                $sortArray[$key][] = $value;
            }
        }

        // $orderby = "name"; //change this to whatever key you want from the array

        array_multisort($sortArray[$orderBy],SORT_DESC,$array);

    }
}