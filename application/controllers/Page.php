<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
        function __construct()
	{
		parent::__construct(); 
	}
	public function index()
	{
		$this->load->view('welcome_message');
	}
	public function no_child()
	{
                $child=$this->db->query("SELECT * FROM sv_parent_child WHERE parent='".webmastermarketing()."'");
                        if($child->num_rows()==0){
                            $data['content'] = 'contents/page/no_child';
                            $this->load->view('layout/plain',$data);
                        }
                        elseif($child->num_rows()==1){
                            $cdata=$child->row();
                            $this->session->set_userdata('chosen_kid',$cdata->child);
                            redirect('dashboard');
                        }
                        else{
                            redirect('page/choose_child');
                        }
	}
	public function choose_child()
	{
            
		$data['content'] = 'contents/page/choose_child';
		$this->load->view('layout/plain',$data);
	}
}
