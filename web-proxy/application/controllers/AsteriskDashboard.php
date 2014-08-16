<?php
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
defined('BASEPATH') OR exit('No direct script access allowed');

class AsteriskDashboard extends CI_Controller {

    function __construct() {

        parent::__construct();

        try { /*
         * Setup your ARI login information here - normally, this will be in an external configuration
         */
            $ari_url = "http://178.62.19.221:8088/ari/asterisk";
            $ari_username = "ariuser";
            $ari_password = "4r1u53r";

            /*
                 * Now, we will setup our PEST instance
                 */
            $this->ari_endpoint = new Pest($ari_url);
            $this->ari_endpoint->setupAuth($ari_username, $ari_password, "basic");

        } catch (Exception $e) {
            die("Exception raised at file: " . __FILE__ . " Line: " . __LINE__);
        }

    }

    public function index()
    {
        $this->load->model('stanley/M_ari_asterisk', 'asterisk');

        echo "<pre>";
        print_r($this->asterisk->asterisk_info($this->ari_endpoint));
        echo $this->asterisk->get_global_variable($this->ari_endpoint, "CONSOLE");
        echo "Setting up global varaible";
        $this->asterisk->set_global_variable($this->ari_endpoint, "CONSOLE", "Console/dsp3");
        echo $this->asterisk->get_global_variable($this->ari_endpoint, "CONSOLE");
        echo "</pre>";
        return 0;
    }

}

