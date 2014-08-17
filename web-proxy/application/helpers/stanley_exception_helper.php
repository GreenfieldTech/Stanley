<?php
/**
 * Created by PhpStorm.
 * User: nirsi_000
 * Date: 8/17/14
 * Time: 1:14 PM
 */

function set_session_exception ($e = null) {

    if (is_null($e)) return false;

    $this->session->set_userdata("session_exception", $e);

    return true;
}

function get_session_exception () {

    $e = $this->session->userdata('session_exception');

    return $e;
}

function unset_session_exception () {

    $this->session->unset_userdata('session_exception');

    return true;
}