<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeMod extends CI_Model {

    private function __xurl() { return $this->config->item('xurl'); }
    private function __xkey() { return $this->config->item('xkey'); }
    private function __theme() { return $this->config->item('themes'); }

    function __construct()
    {
	parent::__construct();
    }
    
    function __trending()
    {
	$query = array('page' => 1, 'limit' => 4, 'sortby' => 'mostview');
	$data['news'] = $this->excurl->remoteCall($this->__xurl().'news', $this->__xkey(), $query);
	$data['video'] = $this->excurl->remoteCall($this->__xurl().'video', $this->__xkey(), $query);
	
	$html = $this->load->view($this->__theme().'home/ajax/trending', $data, true);
	
	$data = array('xClass' => 'reqtrend', 'xHtml' => $html);
	$this->tools->__flashMessage($data);
    }
    
    function __vidtube()
    {
	$query = array('page' => 1, 'limit' => 4);
	$data['video'] = $this->excurl->remoteCall($this->__xurl().'video', $this->__xkey(), $query);
	
	$html = $this->load->view($this->__theme().'home/ajax/vidtube', $data, true);
	
	$data = array('xClass' => 'reqtube', 'xHtml' => $html);
	$this->tools->__flashMessage($data);
    }

}
