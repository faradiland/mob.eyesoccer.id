<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EyemeMod extends CI_Model {

    private function __xurl() { return $this->config->item('xurl'); }
    private function __xkey() { return $this->config->item('xkey'); }
    private function __theme() { return $this->config->item('themes'); }

    function __construct()
    {
	parent::__construct();
    }
    
    function __melist()
    {
    	$query = array('page'=> '1', 'limit'=> '5', 'sortby'=> 'last_online');
    	$data['eyeme'] = $this->excurl->remoteCall($this->__xurl().'me-images', $this->__xkey(), $query);
	
    	$html = $this->load->view($this->__theme().'eyeme/ajax/me_a_list', $data, true);
	
    	$data = array('xClass' => 'reqme', 'xHtml' => $html);
    	$this->tools->__flashMessage($data);
    }
    function __imgfollowedlist(){
        
        $query = array('page' => '1', 'limit' => '10','username'=> $this->session->username,'following'=> true);
        $data['imglist'] = $this->excurl->remoteCall($this->__xurl().'me-images',$this->__xkey(),$query);

        $html = $this->load->view($this->__theme().'eyeme/ajax/me_a_imgfollowed',$data,true);

        $data = array('xClass' => 'reqimgfollowedlist','xHtml' => $html);
        $this->tools->__flashMessage($data);

    }
    function __explorelist(){
        $page  = $this->input->post('pg');
        $addId = $this->input->post('add');
        $query = array('page' => $page,'limit' => '18', 'sortby'=> 'last_online');
        $data['explore'] = $this->excurl->remoteCall($this->__xurl().'me-images',$this->__xkey(),$query);
        $data['added']   = $addId;
       
        if($page > 1){
             $data['first'] = 0;
             $html          = $this->load->view($this->__theme().'eyeme/ajax/me_a_explore',$data,true);
             $data          = array('xClass' => $addId,'xHtml' => $html);

        }
        else{

            $data['first']  = 1;
            $html           = $this->load->view($this->__theme().'eyeme/ajax/me_a_explore',$data,true);
            $data           = array('xClass' => 'reqexplorelist','xHtml' => $html);
        }
        $this->tools->__flashMessage($data);
    }
    function __newlist(){
        $page  = $this->input->post('pg');
    }
    function __meprofile(){
        $req = $this->input->post('uname');
        $req = explode('-',$req);
        $uname = $req[0];
        $query =  array('page' => '1', 'limit' => '1' ,'username' => $uname);
        $res           = $this->excurl->remoteCall($this->__xurl().'me/'.$uname,$this->__xkey(),$query);
        $data['res']   = json_decode($res);

        if(count($data['res']->data) > 0 ){
            if($req[1] == 'profile'){

                $html      = $this->load->view($this->__theme().'eyeme/ajax/me_a_profile',$data,true);
                $data      = array('xClass'=> 'reqprofile','xHtml' => $html);
            }
            else{
                $html       = $this->load->view($this->__theme().'eyeme/ajax/me_a_profileimg',$data,true);
                $data       = array('xClass'=> 'reqprofileimg','xHtml' => $html);
            }

        }
          else{
            $data = array('xClass' => 'all','xHtml'=> 'User tidak ditemukan');
        }

        $this->tools->__flashMessage($data);
        
    }
    function __menotif(){
        $uname = $this->session->username;
        $query = array('page'=> '1','limit'=> '10',$uname);
        $res   = $this->excurl->remoteCall($this->__xurl().'me-notif'.$uname,$this->__xkey(),$query);
        $data['res'] = json_decode($res);
        $html  = $this->load->view($this->__theme().'eyeme/ajax/me_a_notif',$data,true);
        $arr   = array('xClass'=> 'reqnotif','xHtml'=> $html);
        $this->tools->__flashMessage($arr);
    }
   
}
