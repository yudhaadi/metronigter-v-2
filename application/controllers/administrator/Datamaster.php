<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datamaster extends CI_Controller {

	public function index() {
		$this->sys->render_metronic('dashboard/index');
	}

	public function user() {
		$this->sys->render_metronic('dashboard/index');
	}

}

/* End of file Datamaster.php */
/* Location: ./application/controllers/administrator/Datamaster.php */