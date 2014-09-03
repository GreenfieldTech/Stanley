<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('clean'))
{
function clean($branch) {
    if(is_object($branch)){
        // object
        $props = array();
        $branch = clone($branch); // doesn't clone cause some issues?
        foreach($props as $k=>$v)
            $branch->$i = clean($v);
    }elseif(is_array($branch)){
        // array
        foreach($branch as $i=>$v)
            $branch[$i] = clean($v);
    }elseif(is_resource($branch)){
        // resource
        $branch = (string)$branch.' ('.get_resource_type($branch).')';
    }elseif(is_string($branch)){
        // string (ensure it is UTF-8, see: https://bugs.php.net/bug.php?id=47130)
        $branch = utf8_encode($branch);
    }
    // other (hopefully serializable) stuff
    return $branch;
}   
}

?>