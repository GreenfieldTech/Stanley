<?php
/**
 * Created by PhpStorm.
 * User: nirsi_000
 * Date: 8/14/14
 * Time: 3:32 PM
 */

class M_ari_endpoints extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }


    /**
     * This function will retreive the endpoints registered ...
     *
     *
     *
     * @param null $pestObject
     * @param null $tech
     * @param null $resource
     * @return bool|mixed
     */
    public function endpoints($pestObject = null,$tech = null,$resource = null) {

        try {

            $result = false;

            if (is_null($pestObject))
                throw new Exception("PEST Object not provided or is null", 503);



            $uri     = "/endpoints/". $tech = (($tech != null) ? $tech   : '') . $resource =   (($resource != null) ? '/'.$resource  : '') ;

          //  $uri     = "/endpoints/sip";

            log_message('info','The uri---------------------->' . $uri);

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
}