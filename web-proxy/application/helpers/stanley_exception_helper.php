<?php
/**
 * Created by PhpStorm.
 * User: nirsi_000
 * Date: 8/17/14
 * Time: 1:14 PM
 */

function set_session_exception ($session = null, $e = null) {

    if (is_null($session))
        return false;

    if (is_null($e))
        return false;

    $session->set_userdata("session_exception", $e);

    return true;
}

function get_session_exception ($session = null) {

    if (is_null($session))
        return false;

    $e = $session->userdata('session_exception');

    return $e;
}

function unset_session_exception ($session = null) {

    if (is_null($session))
        return false;

    $session->unset_userdata('session_exception');

    return true;
}