<?php
/**
 * Created by PhpStorm.
 * User: nirsi_000
 * Date: 8/14/14
 * Time: 3:58 PM
 */

/**
 * Class M_ari_mailboxes
 *
 * The following Module class implements the ARI Mailboxes interface, as described in the following URL:
 * https://wiki.asterisk.org/wiki/display/AST/Asterisk+12+Asterisk+REST+API
 */

class M_ari_mailboxes extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    public function get_mailboxes($pestObject = null, $mailbox_name = null) {
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

    public function set_mailbox($pestObject = null, $mailbox_name = null, $old_messages=null, $new_messages = null) {
        try {

            $result = false;

            if (is_null($pestObject))
                throw new Exception("PEST Object not provided or is null", 503);

            if (is_null($mailbox_name))
                throw new Exception("mailbox_name not provided or is null", 503);

            if (is_null($old_messages))
                throw new Exception("old_messages not provided or is null", 503);

            if (is_null($new_messages))
                throw new Exception("new_messages not provided or is null", 503);

            //TODO: Fill in the gaps!

            return $result;

        } catch (Exception $e) {
            set_session_exception($e);
            return false;
        }
    }

    public function delete_mailbox($pestObject = null, $mailbox_name = null) {
        try {

            $result = false;

            if (is_null($pestObject))
                throw new Exception("PEST Object not provided or is null", 503);

            if (is_null($mailbox_name))
                throw new Exception("mailbox_name not provided or is null", 503);

            //TODO: Fill in the gaps!

            return $result;

        } catch (Exception $e) {
            set_session_exception($e);
            return false;
        }
    }


}