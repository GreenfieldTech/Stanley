<?php
/**
 * Created by PhpStorm.
 * User: nirsi_000
 * Date: 8/14/14
 * Time: 3:32 PM
 */

class M_ari_channels extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    public function channel_list($pestObject = null) {

        try {

            $result = false;


            if (is_null($pestObject))
                throw new Exception("PEST Object not provided or is null", 503);

            //TODO: Fill in the gaps!

            $uri     = "/channels";
            $jsonResult = json_decode($pestObject->get($uri));

            $result = $jsonResult;

            return $result;



        } catch (Exception $e) {
            return false;
        }



    }

    public function channel_originate() {




    }

    public function channel_get_details() {

    }

    public function channel_delete($pestObject = null ,$channelID = null) {


        try {

            if (is_null($pestObject))
                throw new Exception("PEST Object not provided or is null", 503);

            if (is_null($channelID))
                throw new Exception("PEST Object not provided or is null", 503);

            $uri        =  "/channels/".$channelID;
            $jsonResult =  json_decode($pestObject->delete($uri));

            $result = $jsonResult;

            return $result;



        } catch (Exception $e) {
            return false;
        }







    }

    public function channel_continue() {

    }

    public function channel_answer() {

    }

    public function channel_ringing_start() {

    }

    public function channel_ringing_stop() {

    }

    public function channel_send_dtmf() {

    }

    public function channel_mute() {

    }

    public function channel_unmute() {

    }

    public function channel_hold() {

    }

    public function channel_unhold() {

    }

    public function channel_moh_start() {

    }

    public function channel_moh_stop() {

    }

    public function channel_silence_start() {

    }

    public function channel_silence_stop() {

    }

    public function channel_playback($pestObject = null ,$channelId = null , $playParameters =  array() ) {


        try {

            $result = false;

            if (is_null($pestObject))
                throw new Exception("PEST Object not provided or is null", 503);
            if (is_null($channelId))
                throw new Exception("ChannelID cannot be null", 503);
            $media      = "media=sound:hello-world";
            $lang       = 'en';
            $offsetms   = null;
            $skipms     = 3000;
            // $playbackId = null;
            if(isset($playParameters) && is_array($playParameters))
            {
                if(array_key_exists('media',$playParameters))
                    $media = $playParameters['media'];
                if(array_key_exists('lang',$playParameters))
                    $lang = $playParameters['lang'];
                if(array_key_exists('offsetms',$playParameters))
                    $offsetms = $playParameters['offsetms'];
                if(array_key_exists('skipms',$playParameters))
                    $skipms = $playParameters['skipms'];
//                if(array_key_exists('playbackId',$playParameters))
//                    $playbackId = $playParameters['playbackId'];
            }



            $uri        = "/channels/".$channelId."/play";
            $postData   = array(
                "media"    => $media,
                "lang"     => $lang,
                "offsetms "=> $offsetms,
                "skipms"   => $skipms);



            $result = $pestObject->post($uri,$postData);
            return $result;

        } catch (Exception $e) {
            return false;
        }
    }
    public function channel_record() {

    }

    public function channel_get_variable() {

    }

    public function channel_set_variable() {

    }

    public function channel_snoop_start() {

    }

    public function channel_snoop_stop() {

    }

}