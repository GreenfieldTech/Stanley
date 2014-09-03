<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Leonid
 * Date: 5/12/14
 * Time: 3:10 PM
 */

/**
 * This class is the glue for the v_template file which redirect and connect with the c_rest api
 * for the functionality and modulation
 *
 * Class C_maindashboard
 */
class C_maindashboard extends CI_Controller {




    function __construct()
    {
        parent::__construct();
        /**
         * Load Models
         */
      //  $this->load->model("m_dwh", "dwh");
//        $this->load->model('redis/m_redis', 'redis');
      //  $this->load->model('analytics/m_dashboard','dash');
        /**
         * Load Helpers
         */

        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->helper('date');
        //  $this->load->library('session');

        $this->load->helper("sanitychecks");
        $this->load->helper('exceptions');
        /*
         * Bootstrap for greylog
         */
        $this->uniqueid          = sha1(md5(time()));
        $this->grAdditional      = array("Session" => $this->uniqueid);
        /**
         * Bootstrap the configuration parser
         */
        $configurationHandler = new Configula\Config(APP_LIBS);
        $configurationArray = $configurationHandler->getItems();
        /**
         * Configuration Sections
         */
//        $confAst   = $configurationArray['servers']['asterisk'];
//        $confRedis = $configurationArray['servers']['redis'];
//        $confBean  = $configurationArray['servers']['beanstalkd'];
//        $confMysql = $configurationArray['servers']['database'];
        /**
         * Bootstrap the database handler
         */
//        $dsn = $confMysql['type'] . '://' . $confMysql['username'] . ':' . $confMysql['password'] . '@' . $confMysql['server'] . '/' . $confMysql['schema'];
//        // $dsn = $confMysql['type'] . '://' . $confMysql['username'] . '@' . $confMysql['server'] . '/' . $confMysql['schema'];
//        $this->dbAsterisk = $this->load->database($dsn, TRUE);
//        if ((!$this->dbAsterisk) && ($confMysql['mandatory']))
//            throw new Exception("MySQL Mandatory connection failed, bailing out", 503);


//        $this->initSendingObject();
//        $func                  = 'getLastTimeSeen';
//        $temp                  =  $this->controllerConnector(REST_URL,$func,$this->obj);
//        $this->lastseen        =  $temp['result'];

    }


    public   function initSendingObject()
    {

        $temp                 =   $this->session->userdata('sessionInformation');
        $this->customerID     =   $temp['customer_id'];



        $this->timestamp      =   createUnixTimeStamp(NULL);
        $this->mHash          =   substr(md5(sha1($this->timestamp.REST_KEY)),1,32);
        $this->obj            =   array(
            'customerID' => $this->customerID,
            'timeStamp'  => $this->timestamp,
            'hashKey'    => $this->mHash
        );
    }



    /**
     * This is the initial function which takes care when we are reaching the main panel
     * after the authentication
     */
    public  function  index()
    {
        try{
//            $data['sessionInformation'] = $this->session->userdata('sessionInformation');
//            if(! isset($data['sessionInformation']) || $data['sessionInformation'] == false )
//                throw new UnauthorizedUserActionExeption(RESTRICTED_ACTION_MSG_EXCEPTION,RESTRICTED_ACTION_EXCEPTION_CODE); //just for the record

        //    $data['lastVisit'] = $this->lastseen;
            $this->load->view('main/v_template_header');
//            $this->load->view('analytics/v_dashboard');
            $this->load->view('main/v_template_footer');

        }
        catch(UnauthorizedUserActionExeption $e){
            log_message('error', "Class   :" . __CLASS__ . " , Function : " . __FUNCTION__ . "  thrown an exception in file " . __FILE__ . " in line " . __LINE__ . " , this is the error message : " . $e->getMessage());
            $this->dwh->logInsert(__CLASS__, "CRITICAL", __FILE__, __LINE__, "Exception raised for".__FUNCTION__."  ".$e->getMessage(), $e->getTraceAsString(), $this->grAdditional);
            redirect(AUTH_URL);
        }
    }

    /**
     * This is the initial function which takes care when we are reaching the main panel
     * after the authentication
     */
    public  function  redirectToChannelsPage()
    {

        try{

            $data['injectionScript'] =   '<script type="text/javascript">$(function(){$("#channelPage-link").addClass("active-menu");});</script>';

            $this->load->view('main/v_template_header',$data);
            $this->load->view('channels/v_channels');

        }
        catch(UnauthorizedUserActionExeption $e){
            log_message('error', "Class   :" . __CLASS__ . " , Function : " . __FUNCTION__ . "  thrown an exception in file " . __FILE__ . " in line " . __LINE__ . " , this is the error message : " . $e->getMessage());
            $this->dwh->logInsert(__CLASS__, "CRITICAL", __FILE__, __LINE__, "Exception raised for".__FUNCTION__."  ".$e->getMessage(), $e->getTraceAsString(), $this->grAdditional);
            redirect(AUTH_URL);
        }
    }


    /**
     * This is the initial function which takes care when we are reaching the main panel
     * after the authentication
     */
    public  function  redirectToEndPointsPage()
    {

        try{

            $data['injectionScript'] =   '<script type="text/javascript">$(function(){$("#endPointPage-link").addClass("active-menu");});</script>';

            $this->load->view('main/v_template_header',$data);
            $this->load->view('endpoints/v_endpoints');

        }
        catch(UnauthorizedUserActionExeption $e){
            log_message('error', "Class   :" . __CLASS__ . " , Function : " . __FUNCTION__ . "  thrown an exception in file " . __FILE__ . " in line " . __LINE__ . " , this is the error message : " . $e->getMessage());
            $this->dwh->logInsert(__CLASS__, "CRITICAL", __FILE__, __LINE__, "Exception raised for".__FUNCTION__."  ".$e->getMessage(), $e->getTraceAsString(), $this->grAdditional);
            redirect(AUTH_URL);
        }
    }


}