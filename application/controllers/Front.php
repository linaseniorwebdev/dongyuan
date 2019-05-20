<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/Base.php';

class Front extends Base {

    public function index() {
        echo 'Index Page';
    }
}