<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: nirsi_000
 * Date: 8/14/14
 * Time: 3:59 PM
 *
 * @package		Stanley
 * @author		Greenfield Technologies Ltd
 * @copyright	Copyright (c) 2014, GreenfieldTech, Ltd. (http://www.greenfieldtech.net/)
 * @license		http://opensource.org/licenses/GPL-2.0 GNU General Public License, Version 2
 * @link		https://github.com/GreenfieldTech/Stanley
 */


class AsteriskDashboard extends CI_Controller {

    function __construct() {

        parent::__construct();

        try {

            /**
             * Bootstrap information for Logging Purposes
             */
            $this->grAdditional = array("Session" => uniqid(null, true), "Requester" => $_SERVER['REMOTE_ADDR']);
            /**
             * Bootstrap the configuration parser
             */
            $configurationHandler = new Configula\Config(APP_LIBS);
            $configurationArray = $configurationHandler->getItems();
            /**
             * Configuration Sections
             */
            $confRedis    = $configurationArray['servers']['redis'];
            $confBean     = $configurationArray['servers']['beanstalkd'];
            $confARI      = $configurationArray['servers']['ari_langust'];
            /**
             * Get credentials from the configuration files
             */
            $this->ari_url            =   $confARI['ari_url'];
            $this->ari_username       =   $confARI['ari_username'];
            $this->ari_password       =   $confARI['ari_password'];
            $this->ari_host           =   $confARI['ari_host'];
            $this->stasis_application =   "hello-world";
            /*
             * Now, we will setup our PEST instance
             */
            $this->ari_endpoint = new Pest($this->ari_url);
            $this->ari_endpoint->setupAuth($this->ari_username, $this->ari_password, "basic");



            /*
              * Bootstrap exception handling object
              */
            //  $this->load->helper('stanley_exception_helper');

            /*
             * Bootstrap Logger and Worker Factory
             */
            $this->stasisLoop   = \React\EventLoop\Factory::create();

            $this->stasisLogger = new \Zend\Log\Logger();
            $this->logWriter    = new Zend\Log\Writer\Stream("php://output");
            $this->stasisLogger->addWriter($this->logWriter);


            /*
             * Now, we will setup our PEST instance
             */
            $this->ari_endpoint = new Pest($this->ari_url);
            $this->ari_endpoint->setupAuth($this->ari_username, $this->ari_password, "basic");
            $this->stasisClient = new \Devristo\Phpws\Client\WebSocket("ws://" . $this->ari_host . "/ari/events?api_key=" . $this->ari_username . ":" . $this->ari_password . "&app=" . $this->stasis_application, $this->stasisLoop, $this->stasisLogger);
            //   $this->stasisLogger->info("ws://" . $this->ari_host . "/ari/events?api_key=" . $this->ari_username . ":" . $this->ari_password . "&app=" . $this->stasis_application);

            /**
             * Load models
             */
            $this->load->model('stanley/M_ari_asterisk',     'asterisk');
            $this->load->model('stanley/M_ari_bridges',      'bridges');
            $this->load->model('stanley/M_ari_channels',     'channels');
            $this->load->model('stanley/M_ari_endpoints',    'endpoints');



        } catch (Exception $e) {

            die("Exception raised at file: " . __FILE__ . " Line: " . __LINE__ . " with the message : " . $e->getMessage());
        }

    }

    public function index()
    {

    }

    public function consoleWrite($jsonData)
    {
        try {
            $jsonObject = json_decode($jsonData);
            switch ($jsonObject->type) {
                case "PlaybackStarted":
                case "PlaybackFinished":
                    $this->stasisLogger->notice("Channel: " . $jsonObject->playback->target_uri . " Event: " . $jsonObject->type . " Media URI: " . $jsonObject->playback->media_uri . " State: " . $jsonObject->playback->state );
                    //$this->stasisLogger->notice($jsonObject);
                    break;
                default:
                    $this->stasisLogger->notice($jsonData);
                    break;
            }
            return 0;

        } catch (Exception $e) {
            die("Exception raised at file: " . __FILE__ . " Line: " . __LINE__);
        }
    }



    public  function asterisk_info()
    {

        try{

            $this->postData     = file_get_contents("php://input");
            $result             = $this->asterisk->asterisk_info($this->ari_endpoint);

            if(isset($this->postData) && ! empty($this->postData))
            {
                $postDataObject = json_decode($this->postData,FALSE);
                $result         = $this->asterisk->asterisk_info($this->ari_endpoint,$postDataObject->filter);
            }

            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($result));
            return false;
        }
        catch (Exception $e) {
            $response = array("response" => "FAILED", "message" => $e->getMessage(), "trace" => $e->getTraceAsString());
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($response));
            return false;
        }
    }

    public function   bridges_list()
    {

        try{


            $result   = $this->bridges->bridges_list($this->ari_endpoint);

            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($result));

            return false;

        }
        catch (Exception $e) {
            $response = array("response" => "FAILED", "message" => $e->getMessage(), "trace" => $e->getTraceAsString());

            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($response));
            return false;
        }
    }


    public  function  bridge_create_or_update()
    {
        try{

            $this->postData = file_get_contents("php://input");

            if(! isset($this->postData) || empty($this->postData) )
                throw new Exception("One or more of the bridge query parameters is missing...",503);

            $postDataObject = json_decode($this->postData,TRUE);


            //  print_r($postDataObject);

            if( ! array_key_exists('bridgeId',$postDataObject) ||
                ! array_key_exists('type',$postDataObject) ||
                ! array_key_exists('name',$postDataObject)
            )
                throw new Exception("One or more of the bridge query parameters is missing...",503);


            $bridge_id   = $postDataObject['bridgeId'];
            $bridge_type = $postDataObject['type'];
            $bridge_name = $postDataObject['name'];


            $response =   $this->bridges->bridge_create_or_update($this->ari_endpoint,$bridge_type , $bridge_id , $bridge_name);

            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($response));
            return false;

        }

        catch (Exception $e) {
            $response = array("response" => "FAILED", "message" => $e->getMessage(), "trace" => $e->getTraceAsString());

            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($response));
            return false;



        }

    }
    public  function get_global_variable()
    {

        try{
            $this->postData = file_get_contents("php://input");
            $result         =   $this->asterisk->asterisk_info($this->ari_endpoint);

            if(isset($this->postData) && ! empty($this->postData) )
            {
                $postDataObject = json_decode($this->postData,FALSE);
                $result =   $this->asterisk->asterisk_info($this->ari_endpoint,$postDataObject->filter);
            }

            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($result));
            return false;

        }
        catch (Exception $e) {
            $response = array("response" => "FAILED", "message" => $e->getMessage(), "trace" => $e->getTraceAsString());
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($response));
            return false;

        }
    }

    public  function channel_list()
    {

        try{

            $result   = $this->channels->channel_list($this->ari_endpoint);

            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($result));

            return false;

        }
        catch (Exception $e) {
            $response = array("response" => "FAILED", "message" => $e->getMessage(), "trace" => $e->getTraceAsString());

            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($response));
            return false;
        }


    }


    public function channel_delete()
    {

        try{

            $this->postData = file_get_contents("php://input");



            if(! isset($this->postData)  || empty($this->postData) )
                throw new Exception('The post data is empty and the channel ID  is missing');



            $postDataObject       = json_decode($this->postData,FALSE);
            $this->channelID      =  $postDataObject->channelID;



//            $this->stasisClient->on("request", function ($headers) {
//                $this->stasisLogger->notice("Request object created!");
//            });
//
//            $this->stasisClient->on("handshake", function () {
//                $this->stasisLogger->notice("Handshake received!");
//            });
//
//            $this->stasisClient->on("connect", function ($message) {

//                $messageData = json_decode($message->getData());
//                switch ($messageData->type) {
//                    case "StasisStart":
            //   $this->stasisLogger->notice("Stasis Start");
            $lastResult = $this->channels->channel_delete($this->ari_endpoint,$this->channelID);
            $this->stasisLogger->notice("Last result: " . $lastResult);

//                        break;
//                    case "StasisEnd":
//                        $this->stasisLogger->notice("Stasis End");
//                        break;
//                    default:
//                        $this->consoleWrite($message->getData($messageData));
//                        break;
            // }
            //     });

            $this->stasisClient->open();
            $this->stasisLoop->run();

        } catch (Exception $e) {
            die("Exception raised at file: " . __FILE__ . " Line: " . __LINE__);
        }
    }

    public function channel_playback()
    {

        try {



            $this->stasisClient->on("request", function ($headers) {
                $this->stasisLogger->notice("Request object created!");
            });

            $this->stasisClient->on("handshake", function () {
                $this->stasisLogger->notice("Handshake received!");
            });

            $this->stasisClient->on("message", function ($message) {

                $messageData = json_decode($message->getData());
                switch ($messageData->type) {
                    case "StasisStart":
                        $this->stasisLogger->notice("Stasis Start");
                        $lastResult = $this->channels->channel_playback($this->ari_endpoint, $messageData->channel->id, array('media'=>"sound:hello-world"));
                        $this->stasisLogger->notice("Last result: " . $lastResult);
                        $lastResult = $this->channels->channel_playback($this->ari_endpoint, $messageData->channel->id,array('media'=>"sound:demo-congrats"));
                        $this->stasisLogger->notice("Last result: " . $lastResult);
                        break;
                    case "StasisEnd":
                        $this->stasisLogger->notice("Stasis End");
                        break;
                    default:
                        $this->consoleWrite($message->getData($messageData));
                        break;
                }
            });

            $this->stasisClient->open();
            $this->stasisLoop->run();

        } catch (Exception $e) {
            die("Exception raised at file: " . __FILE__ . " Line: " . __LINE__);
        }

    }

    public function  endpoints(){
        try{
          $response =   $this->endpoints->endpoints($this->ari_endpoint,'sip',null);

               $this->output
               ->set_content_type('application/json')
               ->set_output(json_encode($response));
            return false;

        } catch (Exception $e) {
            die("Exception raised at file: " . __FILE__ . " Line: " . __LINE__);
        }


    }



}

