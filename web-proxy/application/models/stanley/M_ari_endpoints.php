<?php
/**
 * Created by PhpStorm.
 * User: nirsi_000
 * Date: 8/14/14
 * Time: 3:57 PM
 */

/**
 * Class M_ari_endpoints
 *
 * The following Module class implements the ARI Endpoints interface, as described in the following URL:
 * https://wiki.asterisk.org/wiki/display/AST/Asterisk+12+Asterisk+REST+API
 */

class M_ari_endpoints extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    public function get_endpoints($pestObject = null, $technology = null, $resource = null) {
        try {

            $result = false;

            if (is_null($pestObject))
                throw new Exception("PEST Object not provided or is null", 503);

            //TODO: Fill in the gaps!

            return $result;

        } catch (Exception $e) {
            set_session_exception($this->session, $e);;
            return false;
        }
    }

    public function send_message_to_uri($pestObject = null, $to = null, $from = null, $body = null) {
        try {

            $result = false;

            if (is_null($pestObject))
                throw new Exception("PEST Object not provided or is null", 503);

            if (is_null($to))
                throw new Exception("To member not provided or is null", 503);

            if (is_null($from))
                throw new Exception("From member not provided or is null", 503);

            //TODO: Fill in the gaps!

            return $result;

        } catch (Exception $e) {
            set_session_exception($this->session, $e);;
            return false;
        }
    }

    public function send_message_to_resource($pestObject = null, $tech = null, $resource = null, $from = null, $body = null) {
        try {

            $result = false;

            if (is_null($pestObject))
                throw new Exception("PEST Object not provided or is null", 503);

            if (is_null($resource) || is_null($tech))
                throw new Exception("tech/resource member not provided or is null", 503);

            if (is_null($from))
                throw new Exception("From member not provided or is null", 503);

            //TODO: Fill in the gaps!

            return $result;

        } catch (Exception $e) {
            set_session_exception($this->session, $e);;
            return false;
        }
    }

}