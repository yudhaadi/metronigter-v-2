<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 */
class Sys
{

	private $_ci;
	private $_javascript_bottom_custom = array();
	private $_javascript_top_custom = array();
	private $_css_custom = array();
	  
	function __construct(){
	  $this->_ci = &get_instance();
	}

	function render_metronic($html, $data = array()) {
		$router['_controller']			= $this->_ci->router->fetch_class();
		$router['_function']			= $this->_ci->router->fetch_method();
		$router['_settings']			= $this->_ci->db->get('_sys_setting')->row();
		$router['_page_title']			= @$data['_page_title'];
		$router['_render_page_title']	= ($router['_page_title']) ? $router['_page_title'] : $this->render_metronic_page_title($router['_controller'], $router['_function']);
		$sys = $router;
		$sys['_css'] 				= $this->_ci->load->view('_templates/css', NULL, TRUE);
		$data['_render_menu_label']	= $this->render_metronic_page_label($router['_controller'], $router['_function']);
		$sys['_css_custom'] 		= $this->render_custom_css();
		$sys['_javascript_top'] 	= $this->_ci->load->view('_templates/javascript_top', NULL, TRUE);
		$sys['_javascript_top_custom']	= $this->render_javascript_top_custom();
		$sys['_navbar_left'] 			= $this->_ci->load->view('_templates/navbar_left', $router, TRUE);
		$sys['_navbar_right'] 			= $this->_ci->load->view('_templates/navbar_right', $router, TRUE);
		$sys['_sidebar'] 			= $this->_ci->load->view('_templates/sidebar', $router, TRUE);
		$sys['_footer'] 			= $this->_ci->load->view('_templates/footer', $router, TRUE);
		$sys['_javascript_bottom']	= $this->_ci->load->view('_templates/javascript_bottom', NULL, TRUE);
		$sys['_javascript_bottom_custom']	= $this->render_javascript_bottom_custom();
		$sys['_content']			= $this->_ci->load->view('administrator/'.$html, $data, TRUE);
		$this->_ci->load->view('_templates/layout', $sys, FALSE);
	}

	function render_metronic_modal($html, $data = array()) {
		echo $this->render_custom_css();
		echo $this->render_javascript_top_custom();
		$this->_ci->load->view('administrator/'.$html, $data, FALSE);
		echo $this->render_javascript_bottom_custom();
	}

	function render_metronic_page_label($controller='', $function='') {
		$db = $this->_ci->db->where('sidebar_controller', $controller)->where('sidebar_function', $function)->get('_sys_sidebar');
		if ($db->num_rows() > 0) {
			$data = $db->row();
			$render = '<i class="'.$data->sidebar_icon.'"></i>';
			$render .= '<span class="ml-2">'.$data->sidebar_label.'</span>';
			return $render;
		}
	}

	function render_metronic_page_title($controller='', $function='') {
		$db = $this->_ci->db->where('sidebar_controller', $controller)->where('sidebar_function', $function)->get('_sys_sidebar');
		if ($db->num_rows() > 0) {
			return $db->row('sidebar_label');
		} else {
			return '';
		}
	}

	function add_javascript_top_custom($javascript) {
		array_push($this->_javascript_top_custom, $javascript);
	}

	function render_javascript_top_custom() {
		$javascript = '';
		foreach ($this->_javascript_top_custom as $val) {
			$javascript .= PHP_EOL.'<script type="text/javascript" src="'.base_url($val).'"></script>';
		}
		$javascript .= PHP_EOL;
		return $javascript;
	}

	function add_javascript_bottom_custom($javascript) {
		array_push($this->_javascript_bottom_custom, $javascript);
	}

	function render_javascript_bottom_custom() {
		$javascript = '';
		foreach ($this->_javascript_bottom_custom as $val) {
			$javascript .= PHP_EOL.'<script type="text/javascript" src="'.base_url($val).'"></script>';
		}
		$javascript .= PHP_EOL;
		return $javascript;
	}

	function add_css_custom($css) {
		array_push($this->_css_custom, $css);
	}

	function render_custom_css() {
		$css = '';
		foreach ($this->_css_custom as $val) {
			$css .= PHP_EOL.'<link rel="stylesheet" type="text/css" href="'.base_url($val).'">';
		}
		$css .= PHP_EOL;
		return $css;
	}
}