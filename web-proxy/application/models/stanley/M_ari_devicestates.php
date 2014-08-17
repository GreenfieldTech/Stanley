<?php
/**
 * Created by PhpStorm.
 * User: nirsi_000
 * Date: 8/14/14
 * Time: 3:57 PM
 */

/**
 * Class M_ari_devicestates
 *
 * The following Module class implements the ARI Device State interface, as described in the following URL:
 * https://wiki.asterisk.org/wiki/display/AST/Asterisk+12+Asterisk+REST+API
 */

class M_ari_devicestates extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    public function get_devicestates($pestObject = null, $devicename = null) {
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

    public function set_or_update_devicestate($pestObject = null, $devicename = null, $devstate=null) {
        try {

            $result = false;

            if (is_null($pestObject))
                throw new Exception("PEST Object not provided or is null", 503);

            if (is_null($devicename))
                throw new Exception("devicename not provided or is null", 503);

            if (is_null($devstate))
                throw new Exception("devstate not provided or is null", 503);

            //TODO: Fill in the gaps!

            return $result;

        } catch (Exception $e) {
            set_session_exception($e);
            return false;
        }
    }

    public function delete_devicestate($pestObject = null, $devicename = null) {
        try {

            $result = false;

            if (is_null($pestObject))
                throw new Exception("PEST Object not provided or is null", 503);

            if (is_null($devicename))
                throw new Exception("devicename not provided or is null", 503);

            //TODO: Fill in the gaps!

            return $result;

        } catch (Exception $e) {
            set_session_exception($e);
            return false;
        }
    }


}