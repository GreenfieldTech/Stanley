<?php
/**
 * Created by PhpStorm.
 * User: nirsi_000
 * Date: 8/14/14
 * Time: 3:50 PM
 */

/**
 * Class M_ari_applications
 *
 * The following Module class implements the ARI Applications interface, as described in the following URL:
 * https://wiki.asterisk.org/wiki/display/AST/Asterisk+12+Asterisk+REST+API
 */

class M_ari_applications extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    public function get_applications_list($pestObject = null, $application_name = null) {
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

    public function subscribe_application($pestObject = null, $application_name = null, $event_source = null) {
        try {

            $result = false;

            if (is_null($pestObject))
                throw new Exception("PEST Object not provided or is null", 503);

            if (is_null($pestObject))
                throw new Exception("application_name not provided or is null", 503);

            if (is_null($pestObject))
                throw new Exception("event_source not provided or is null", 503);

            //TODO: Fill in the gaps!

            return $result;

        } catch (Exception $e) {
            set_session_exception($e);
            return false;
        }
    }

    public function unsubscribe_application($pestObject = null, $application_name = null, $event_source = null) {
        try {

            $result = false;

            if (is_null($pestObject))
                throw new Exception("PEST Object not provided or is null", 503);

            if (is_null($pestObject))
                throw new Exception("application_name not provided or is null", 503);

            if (is_null($pestObject))
                throw new Exception("event_source not provided or is null", 503);

            //TODO: Fill in the gaps!

            return $result;

        } catch (Exception $e) {
            set_session_exception($e);
            return false;
        }
    }
}