<?php
/**
 * Created by PhpStorm.
 * User: nirsi_000
 * Date: 8/14/14
 * Time: 3:59 PM
 *
 * @package        Stanley
 * @author        Greenfield Technologies Ltd
 * @copyright    Copyright (c) 2014, GreenfieldTech, Ltd. (http://www.greenfieldtech.net/)
 * @license        http://opensource.org/licenses/GPL-2.0 GNU General Public License, Version 2
 * @link        https://github.com/GreenfieldTech/Stanley
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class AsteriskDashboard extends CI_Controller
{

    function __construct()
    {

        parent::__construct();

        try {
            /*
             * Bootstrap exception handling object
             */
            $this->load->helper('stanley_exception_helper');

            /*
             * Bootstrap Logger and Worker Factory
             */
            $this->stasisLoop = \React\EventLoop\Factory::create();

            $this->stasisLogger = new \Zend\Log\Logger();
            $this->logWriter = new Zend\Log\Writer\Stream("php://output");
            $this->stasisLogger->addWriter($this->logWriter);

            /*
             * Setup your ARI login information here - normally, this will be in an external configuration
             */
            $this->ari_host = "178.62.19.221:8088";
            $this->ari_url = "http://" . $this->ari_host . "/ari";
            $this->stasis_application = "hello-world";
            $this->ari_username = "ariuser";
            $this->ari_password = "4r1u53r";

            /*
             * Now, we will setup our PEST instance
             */
            $this->ari_endpoint = new Pest($this->ari_url);
            $this->ari_endpoint->setupAuth($this->ari_username, $this->ari_password, "basic");

            $this->stasisClient = new \Devristo\Phpws\Client\WebSocket("ws://" . $this->ari_host . "/ari/events?api_key=" . $this->ari_username . ":" . $this->ari_password . "&app=" . $this->stasis_application, $this->stasisLoop, $this->stasisLogger);

        } catch (Exception $e) {
            die("Exception raised at file: " . __FILE__ . " Line: " . __LINE__);
        }

    }

    public function index()
    {
        try {

            $this->load->model('stanley/M_ari_channels', 'channels');

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
                        $lastResult = $this->channels->channel_playback($this->ari_endpoint, $messageData->channel->id, "sound:hello-world");
                        $this->stasisLogger->notice("Last result: " . $lastResult);
                        $lastResult = $this->channels->channel_playback($this->ari_endpoint, $messageData->channel->id, "sound:demo-congrats");
                        $this->stasisLogger->notice("Last result: " . $lastResult);
                        //$this->channels->channel_delete($this->ari_endpoint, $messageData->channel->id);
                        //$this->stasisClient->close();
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

    public function get_asterisk_info()
    {
        try {
            $this->load->model('stanley/M_ari_asterisk', 'asterisk');

            print_r($this->asterisk->asterisk_info($this->ari_endpoint));
            return 0;

        } catch (Exception $e) {
            die("Exception raised at file: " . __FILE__ . " Line: " . __LINE__);
        }
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
}

