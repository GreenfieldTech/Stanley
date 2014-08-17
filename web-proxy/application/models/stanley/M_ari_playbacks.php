<?php
/**
 * Created by PhpStorm.
 * User: nirsi_000
 * Date: 8/14/14
 * Time: 3:51 PM
 */

/**
 * Class M_ari_playbacks
 *
 * The following Module class implements the ARI Playbacks interface, as described in the following URL:
 * https://wiki.asterisk.org/wiki/display/AST/Asterisk+12+Asterisk+REST+API
 */

class M_ari_playbacks extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    public function get_playbacks($pestObject = null, $playback_id = null) {
        try {

            $result = false;

            if (is_null($pestObject))
                throw new Exception("PEST Object not provided or is null", 503);

            if (is_null($playback_id))
                throw new Exception("playback_id not provided or is null", 503);

            //TODO: Fill in the gaps!

            return $result;

        } catch (Exception $e) {
            set_session_exception($e);
            return false;
        }
    }

    public function control_playbacks($pestObject = null, $playback_id = null, $operation = null) {
        try {

            $result = false;

            if (is_null($pestObject))
                throw new Exception("PEST Object not provided or is null", 503);

            if (is_null($playback_id))
                throw new Exception("playback_id not provided or is null", 503);

            if (is_null($operation))
                throw new Exception("operation not provided or is null", 503);

            //TODO: Fill in the gaps!

            return $result;

        } catch (Exception $e) {
            set_session_exception($e);
            return false;
        }
    }


    public function delete_playbacks($pestObject = null, $playback_id = null) {
        try {

            $result = false;

            if (is_null($pestObject))
                throw new Exception("PEST Object not provided or is null", 503);

            if (is_null($playback_id))
                throw new Exception("playback_id Object not provided or is null", 503);

            //TODO: Fill in the gaps!

            return $result;

        } catch (Exception $e) {
            set_session_exception($e);
            return false;
        }
    }

}