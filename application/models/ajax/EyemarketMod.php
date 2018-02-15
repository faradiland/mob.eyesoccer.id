<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH.'/models/query/MarketQueryMod.php');

class EyemarketMod extends MarketQueryMod {

    private function __xurl() { return $this->config->item('xurl'); }
    private function __xkey() { return $this->config->item('xkey'); }
    private function __theme() { return $this->config->item('themes'); }

    function __construct()
    {


    parent::__construct();
        $member = @$this->session->userdata("member");
        $this->id_member = $member["id"];
        $this->username = $member["username"];
        $this->name = $member["name"];
    }
 
    function __market(){
 
        $data['prodlist'] = $this->get_all_product('5');
        $html = $this->load->view($this->__theme().'eyemarket/ajax/prodlist',$data,true);
        $data = array('xClass'=> 'reqmarket','xHtml' => $html);
        $this->tools->__flashMessage($data);
      

    }

    function __market_home(){
 
        $data['prodlist'] = $this->get_all_product('40');
        $html = $this->load->view($this->__theme().'eyemarket/ajax/market_home',$data,true);
        $data = array('xClass'=> 'reqmarket','xHtml' => $html);
        $this->tools->__flashMessage($data);

    }

    function __market_detail()
    {
        $data['slug'] = $this->input->post('slug');
        
        $id_product = $this->get_id_product($data["slug"]);
        $data['product'] = $this->get_product($id_product->id_product);
        $data['ex_product'] = $this->get_product_lain($id_product->id_product);
        $data['username'] = $this->username;
        $data['id_member'] = $this->id_member;

        $html = $this->load->view($this->__theme().'eyemarket/ajax/market_detail',$data,true);
        $data = array('xClass'=> 'reqdetail','xHtml' => $html);
        $this->tools->__flashMessage($data);
    }

    function __set_cart()
    {
        $id_member = $this->id_member;
        $id_membernya = $this->get_id_md($id_member);

        $id_product = $this->input->post('id_product');
        $jumlah = $this->input->post('jumlah');
        $catatan = $this->input->post('catatan');

        $this->db->select('harga,berat');
        $produk = $this->db->get_where('eyemarket_product', array('id_product' => $id_product))->row();
        
        $total  = $produk->harga * $jumlah;
        $berat  = $produk->berat * $jumlah;

        $data       = array(
            'id_product'    => $id_product,
            'id_member'     => $id_membernya->id_member,
            'jumlah'        => $jumlah,
            'total'         => $total,
            'berat'         => $berat,
            'catatan'       => $catatan,
            'created_date'  => date("Y-m-d H:i:s"),
        );

        $insert     = $this->add_keranjang($data);

        $data = array('xAlert' => true,'xCss' => 'boxsuccess','xMsg' => 'Keranjang berhasil ditambah','xDirect'=> base_url().'eyemarket/keranjang/'.$id_member);
        $this->tools->__flashMessage($data);

    }

    function __view_cart()
    {
        $data['username'] = $this->username;
        $data['id_member'] = $this->id_member;

        $data['model']      = $this->get_keranjang($data['id_member']);
        $data['total_all']  = $this->get_total_harga($data['id_member']);
        $data['jumlah']     = $this->get_count_keranjang($data['id_member']);

        $html = $this->load->view($this->__theme().'eyemarket/ajax/view_cart',$data,true);
        $data = array('xClass'=> 'reqcart','xHtml' => $html);
        $this->tools->__flashMessage($data);
    }



}


