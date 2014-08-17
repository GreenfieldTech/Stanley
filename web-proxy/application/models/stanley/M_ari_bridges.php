<?php
/**
 * Created by PhpStorm.
 * User: nirsi_000
 * Date: 8/14/14
 * Time: 3:49 PM
 */

/**
 * Class M_ari_bridges
 *
 * The following Module class implements the ARI Bridges interface, as described in the following URL:
 * https://wiki.asterisk.org/wiki/display/AST/Asterisk+12+Bridges+REST+API
 */

class M_ari_bridges extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    /**
     * Get the current list of active bridges
     *
     * @param null (string) $pestObject - the PEST object from the primary controller
     * @return JSON|bool - false for a failure, JSON object for all other results
     */
    public function bridges_list($pestObject = null) {
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

    /**
     * Setup a new bridge or update an existing one
     *
     * @param null (string) $pestObject - the PEST object from the primary controller
     * @param null (string) $bridge_id - The ID of the bridge you would like to use
     * @param null (string) $bridge_type
     * @param null (string) $bridge_name
     * @return Integer|bool - False on success, True or integer on failure
     */
    public function bridge_create_or_update($pestObject = null, $bridge_type = null, $bridge_id = null, $bridge_name = null) {
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

    /**
     * Get the details of a currently active bridge
     *
     * @param null (string) $pestObject - the PEST object from the primary controller
     * @param null (string) $bridge_id - The ID of the bridge you would like to use
     * @return JSON|bool - JSON Object on success, True or integer on failure
     */
    public function bridge_get_details($pestObject = null, $bridge_id = null) {
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

    /**
     * Destroy a currently active bridge
     *
     * @param null (string) $pestObject - the PEST object from the primary controller
     * @param null (string) $bridge_id - The ID of the bridge you would like to use
     * @return Integer|bool - False on success, True or integer on failure
     */
    public function bridge_destroy($pestObject = null, $bridge_id = null) {
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

    /**
     * Add a channel (or channels) to an existing bridge (turn a simple call into a conference)
     *
     * @param null (string) $pestObject - the PEST object from the primary controller
     * @param null (string) $bridge_id - The ID of the bridge you would like to use
     * @param null (JSON Object) $channels - A JSON Object containing an array of channels
     * @param null (string) $role - The role for the inserted channels
     * @return Integer|bool - False on success, True or integer on failure
     */
    public function bridge_add_channel($pestObject = null, $bridge_id = null, $channels = null, $role = null) {
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

    /**
     * Remove a channel (or channels) from an existing bridge
     *
     * @param null (string) $pestObject - the PEST object from the primary controller
     * @param null (string) $bridge_id - The ID of the bridge you would like to use
     * @param null (JSON Object) $channels - An object containing an array of channels to remove from the bridge
     * @return Integer|bool - False on success, True or integer on failure
     */
    public function bridge_remove_channel($pestObject = null, $bridge_id = null, $channels = null) {
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

    /**
     * Start playing Music On Hold to an existing bridge
     *
     * @param null (string) $pestObject - the PEST object from the primary controller
     * @param null (string) $bridge_id - The ID of the bridge you would like to use
     * @param string (string) $mohClass - The Music on Hold class to play
     * @return Integer|bool - False on success, True or integer on failure
     */
    public function bridge_moh_start($pestObject = null, $bridge_id = null, $mohClass = "default") {
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

    /**
     * Stop playing Music On Hold to an existing bridge
     *
     * @param null $pestObject - the PEST object from the primary controller
     * @param null $bridge_id - The ID of the bridge you would like to use
     * @return Integer|bool - False on success, True or integer on failure
     */
    public function bridge_moh_stop($pestObject = null, $bridge_id = null) {
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

    /**
     * Playback a URI resource to an existing bridge
     *
     * @param null (string) $pestObject - the PEST object from the primary controller
     * @param null (string) $bridge_id - The ID of the bridge you would like to use
     * @param null (JSON Object) $playbackObject - The playback object, in JSON format
     * @return Integer|bool - False on success, True or integer on failure
     *
     * $playbackObject structure:
     *
     * {
     *      "media": (String) "Media URI to play - mandatory",
     *      "lang": (String) "For sounds, selects language for sound",
     *      "offsetms": (Integer) "Number of media to skip before playing",
     *      "skipms": (Integer) "Number of milliseconds to skip for forward/reverse operations",
     *      "playbackid": (String) "Set the playback ID"
     * }
     *
     */
    public function bridge_play($pestObject = null, $bridge_id = null, $playbackObject = null ) {
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

    /**
     * Start recording an existing bridge
     *
     * @param null (string) $pestObject - the PEST object from the primary controller
     * @param null (string) $bridge_id - The ID of the bridge you would like to use
     * @param null (JSON Object) $recordObject - The recording object, in JSON format
     * @return Integer|bool - False on success, True or integer on failure
     *
     * $recordObject structure:
     *
     * {
     *      "name": (String) "Filename to record to - mandatory",
     *      "format": (String) "Format to encode the audio - mandatory",
     *      "maxDurationSeconds": (Integer) "Maximum duration of the recording, in seconds. 0 for no limit",
     *      "maxSilenceSeconds": (Integer) "Maximum duration of silence, in seconds. 0 for no limit",
     *      "ifExists": (String) "fail - Action to take if a recording with the same name already exists",
     *      "beep": (Boolean) "Play beep when recording begins",
     *      "terminateOn": (String) "DTMF input to terminate recording"
     * }
     */
    public function bridge_record($pestObject = null, $bridge_id = null, $recordObject = null) {
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

