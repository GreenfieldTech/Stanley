<?php
/**
 * Created by PhpStorm.
 * User: nirsi_000
 * Date: 8/14/14
 * Time: 3:50 PM
 */

/**
 * Class M_ari_sounds
 *
 * The following Module class implements the ARI Sounds interface, as described in the following URL:
 * https://wiki.asterisk.org/wiki/display/AST/Asterisk+12+Asterisk+REST+API
 */

class M_ari_sounds extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    public function get_sounds($pestObject = null, $lang = "en", $format = "gsm", $sounds_id = null) {
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

}