<?php
/**
 * Created by PhpStorm.
 * User: nirsi_000
 * Date: 8/14/14
 * Time: 3:35 PM
 */

/**
 * Class M_ari_asterisk
 *
 * The following Module class implements the ARI Asterisk interface, as described in the following URL:
 * https://wiki.asterisk.org/wiki/display/AST/Asterisk+12+Asterisk+REST+API
 */

class M_ari_asterisk extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    /**
     * Get Asterisk system information
     *
     * @param null $pestObject - the PEST object from the primary controller
     * @param null (string) $filter - Filter information returned, multiple filters should be comma separated
     * @return string|bool - false for a failure, JSON object for all other results
     */
    public function asterisk_info($pestObject = null, $filter = null) {

        try {

            $result = false;

            if (is_null($pestObject))
                throw new Exception("PEST Object not provided or is null", 503);

            switch ($filter) {
                case "build":
                case "system":
                case "config":
                case "status":
                    break;
                default:
                    $filter = null;
                    break;
            }

            $uri = "/asterisk/info";
            $uri .= (!is_null($filter))?'?only='.$filter:'';

            $result = json_decode($pestObject->get($uri));

            return $result;

        } catch (Exception $e) {
            set_session_exception($this->session, $e);;
            return false;
        }

    }

    /**
     *
     * Set the value of a global variable
     *
     * @param null $pestObject - the PEST object from the primary controller
     * @param null $variable - the global variable to get the value for
     * @return string|bool - false for an error, string otherwise (an empty string is a valid response)
     */
    public function get_global_variable($pestObject = null, $variable = null) {

        try {

            $result = false;

            if (is_null($pestObject))
                throw new Exception("PEST Object not provided or is null", 503);

            if (is_null($variable))
                throw new Exception("Global variable name not provided or is null", 503);

            $uri = "/variable?variable=" . $variable;

            $jsonResult = json_decode($pestObject->get($uri));

            $result = $jsonResult->value;

            return $result;

        } catch (Exception $e) {
            set_session_exception($this->session, $e);;
            return false;
        }

    }

    /**
     * @param null $pestObject - the PEST object from the primary controller
     * @param null $variable - the global variable to set the value for
     * @param null $value - the value to set
     * @return bool - true on success, false on failure
     */
    public function set_global_variable($pestObject = null, $variable = null, $value = null) {

        try {

            $result = false;

            if (is_null($pestObject))
                throw new Exception("PEST Object not provided or is null", 503);

            if (is_null($variable))
                throw new Exception("Global variable name not provided or is null", 503);

            if (is_null($value))
                throw new Exception("Global variable value not provided or is null", 503);

            $uri = "/variable";
            $postData = array("variable"=>$variable, "value"=>$value);

            $result = $pestObject->post($uri, $postData);

            return $result;

        } catch (Exception $e) {
            set_session_exception($this->session, $e);;
            return false;
        }

    }

}