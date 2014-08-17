<?php
/**
 * Created by PhpStorm.
 * User: nirsi_000
 * Date: 8/14/14
 * Time: 3:50 PM
 */

/**
 * Class M_ari_recordings
 *
 * The following Module class implements the ARI Recordings interface, as described in the following URL:
 * https://wiki.asterisk.org/wiki/display/AST/Asterisk+12+Asterisk+REST+API
 */

class M_ari_recordings extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    public function get_recording($pestObject = null, $recording_name = null) {
        try {

            $result = false;

            if (is_null($pestObject))
                throw new Exception("PEST Object not provided or is null", 503);

            //TODO: Fill in the gaps!

            return $result;

        } catch (Exception $e) {
            set_session_exception($e);
            return false;
        }
    }

    public function delete_recording($pestObject = null, $recording_name = null) {
        try {

            $result = false;

            if (is_null($pestObject))
                throw new Exception("PEST Object not provided or is null", 503);

            if (is_null($recording_name))
                throw new Exception("recording_name not provided or is null", 503);

            //TODO: Fill in the gaps!

            return $result;

        } catch (Exception $e) {
            set_session_exception($e);
            return false;
        }
    }

    public function copy_recording($pestObject = null, $recording_name = null, $destination_recording_name = null) {
        try {

            $result = false;

            if (is_null($pestObject))
                throw new Exception("PEST Object not provided or is null", 503);

            if (is_null($recording_name))
                throw new Exception("recording_name not provided or is null", 503);

            if (is_null($destination_recording_name))
                throw new Exception("destination_recording_name not provided or is null", 503);

            //TODO: Fill in the gaps!

            return $result;

        } catch (Exception $e) {
            set_session_exception($e);
            return false;
        }
    }

    public function get_live_recordings($pestObject = null, $recording_name = null) {
        try {

            $result = false;

            if (is_null($pestObject))
                throw new Exception("PEST Object not provided or is null", 503);

            //TODO: Fill in the gaps!

            return $result;

        } catch (Exception $e) {
            set_session_exception($e);
            return false;
        }
    }

    public function stop_live_recording($pestObject = null, $recording_name = null, $discard = false) {
        try {

            $result = false;

            if (is_null($pestObject))
                throw new Exception("PEST Object not provided or is null", 503);

            if (is_null($recording_name))
                throw new Exception("recording_name not provided or is null", 503);

            //TODO: Fill in the gaps!

            return $result;

        } catch (Exception $e) {
            set_session_exception($e);
            return false;
        }
    }

    public function pause_live_recording($pestObject = null, $recording_name = null) {
        try {

            $result = false;

            if (is_null($pestObject))
                throw new Exception("PEST Object not provided or is null", 503);

            if (is_null($recording_name))
                throw new Exception("recording_name not provided or is null", 503);

            //TODO: Fill in the gaps!

            return $result;

        } catch (Exception $e) {
            set_session_exception($e);
            return false;
        }
    }

    public function unpause_live_recording($pestObject = null, $recording_name = null) {
        try {

            $result = false;

            if (is_null($pestObject))
                throw new Exception("PEST Object not provided or is null", 503);

            if (is_null($recording_name))
                throw new Exception("recording_name not provided or is null", 503);

            //TODO: Fill in the gaps!

            return $result;

        } catch (Exception $e) {
            set_session_exception($e);
            return false;
        }
    }

    public function mute_live_recording($pestObject = null, $recording_name = null) {
        try {

            $result = false;

            if (is_null($pestObject))
                throw new Exception("PEST Object not provided or is null", 503);

            if (is_null($recording_name))
                throw new Exception("recording_name not provided or is null", 503);

            //TODO: Fill in the gaps!

            return $result;

        } catch (Exception $e) {
            set_session_exception($e);
            return false;
        }
    }

    public function unmute_live_recording($pestObject = null, $recording_name = null) {
        try {

            $result = false;

            if (is_null($pestObject))
                throw new Exception("PEST Object not provided or is null", 503);

            if (is_null($recording_name))
                throw new Exception("recording_name not provided or is null", 503);

            //TODO: Fill in the gaps!

            return $result;

        } catch (Exception $e) {
            set_session_exception($e);
            return false;
        }
    }

}