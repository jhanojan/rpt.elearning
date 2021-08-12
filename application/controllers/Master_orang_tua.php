<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*************************************
  * Created : August 2020
  * Creator : Fauzan Rabbani
  * Email   : jhanojan@gmail.com
  * Framework ver. : CI ver.2.0
*************************************/	

class Master_orang_tua extends CI_Controller {
	
		var $utama ='master_orang_tua';
		var $title ='Master Orang Tua';
	function __construct()
	{
            
                error_reporting(0);
		parent::__construct();
                izin();
                
                $this->mdlfo=$this->load->database('mdb',TRUE);
		$this->load->library('flexigrid');
                $this->load->helper('flexigrid');
	}
	
	function index()
	{
		$this->main();
	}
	
	function main()
	{
		//Migrasi 1 Feb 14
		//permissionBiasa();
		//Set Global
		//permission();
		//$data = GetHeaderFooter();
		$data['content'] = 'contents/'.$this->utama.'/view';
		
		$data['js_grid']=$this->get_column();
		//$data['list']=GetAll($this->utama);
		//End Global
		
		//Attendance
		
		$this->load->view('layout/main',$data);
	}
        function listcol(){
            
	
                $colModel['idnya'] = array('ID',50,TRUE,'left',2,TRUE);
                $colModel['id'] = array('ID',100,TRUE,'left',2,TRUE);
		$colModel['nama_lengkap'] = array('Nama',110,TRUE,'left',2);
		$colModel['tempat_lahir'] = array('Tempat Lahir',110,TRUE,'left',2);
		$colModel['tanggal_lahir'] = array('Tanggal Lahir',110,TRUE,'left',2);
		$colModel['alamat'] = array('Alamat',110,TRUE,'left',2);
		$colModel['tlp'] = array('Telepon',110,TRUE,'left',2);
		$colModel['email'] = array('Email',110,TRUE,'left',2);
		$colModel['alt_email'] = array('Email 2',110,TRUE,'left',2);
                return $colModel;
        }
	
	function get_column(){
                
            $colModel=$this->listcol(); 
        
            $gridParams = array(
                'rp' => 25,
                'rpOptions' => '[10,20,30,40]',
                'pagestat' => 'Displaying: {from} to {to} of {total} items.',
                'blockOpacity' => 0.5,
                'title' => '',
                'showTableToggleBtn' => TRUE
		);
        
           $buttons[] = array('select','check','btn');
            $buttons[] = array('deselect','uncheck','btn');
            $buttons[] = array('separator');
            $buttons[] = array('add','add','btn');
            $buttons[] = array('separator');
             $buttons[] = array('edit','edit','btn');
            $buttons[] = array('delete','delete','btn');
            $buttons[] = array('separator');
		
            return $grid_js = build_grid_js('flex1',site_url($this->utama."/get_record"),$colModel,'id','asc',$gridParams,$buttons);
	}
	
	function get_flexigrid()
        {

            //Build contents query
            $this->db->select("*")->from($this->utama);
			//$this->db->join('rb_customer', "$this->tabel.id_customer=rb_customer.id", 'left');
            $this->flexigrid->build_query();

            //Get contents
            $return['records'] = $this->db->get();

            //Build count query
            $this->db->select("count(id) as record_count")->from($this->utama);
            $this->flexigrid->build_query(FALSE);
            $record_count = $this->db->get();
            $row = $record_count->row();

            //Get Record Count
            $return['record_count'] = $row->record_count;

            //Return all
            return $return;
        }
	
	function get_record(){
		
			$colModel=$this->listcol();
		
			$z=0;
            foreach($colModel as $key=>$cm){
                $valid_fields[$z]=$key;
		$z++;
            }

            $this->flexigrid->validate_post('id','ASC',$valid_fields);
            $records = $this->get_flexigrid();

            $this->output->set_header($this->config->item('json_header'));

            $record_items = array();
			$a=0;
            foreach ($records['records']->result() as $row)
            {/*
			if($row->status=='y'){$status='Aktif';}
			elseif($row->status=='n'){$status='Tidak Aktif';}
			elseif($row->status=='s'){$status='Suspended';}*/ 
			
				$record_items[$a][]=$row->id;
				$record_items[$a][]=$row->id;
				$record_items[$a][]=$row->id;
				$b=2;
				foreach($colModel as $key=>$cm){
					if($key=='auth'){
                                        $record_items[$a][$b]="<a href='".base_url()."master_kelas/auth/$row->id'>Menu</a>";
                                        
                                        }elseif($key=='prospek'){
                                        $record_items[$a][$b]="<a href='".base_url()."master_kelas/prospek/$row->id'>Prospek Ref</a>";
                                        
                                        }
					elseif($key=='username'){
                                        $record_items[$a][$b]=GetValue('username','sv_admin',array('marketing'=>'where/'.$row->id));
                                        
                                        }
					elseif($key!='idnya' && $key!='id' && $key!='username'){
                                        $record_items[$a][$b]=$row->$key;}
				$b++;
				}
						$a++;
            }

            return $this->output->set_output($this->flexigrid->json_build($records['record_count'],$record_items));;
	}  

	function deletec()
	{		
		//return true;
		$countries_ids_post_array = explode(",",$this->input->post('items'));
		array_pop($countries_ids_post_array);
		foreach($countries_ids_post_array as $index => $country_id){
			/*if (is_numeric($country_id) && $country_id > 0) {
				$this->delete($country_id);}*/
			$this->db->delete($this->utama,array('id'=>$country_id));				
		}
		//$error = "Selected countries (id's: ".$this->input->post('items').") deleted with success. Disabled for demo";
		//echo "Sukses!";
	}
	
	function form($id=null){
		
		izin('c');
		if($id!=NULL){
			$filter=array('id'=>'where/'.$id);
			$data['type']='Edit';
			$data['list']=GetAll($this->utama,$filter);
		}
		else{
			$data['type']='New';
		}
		$data['opt']=GetOptAll('menu','-Parents-');
		$data['content'] = 'contents/'.$this->utama.'/edit';
		//End Global
		
		//Attendance
		
		$this->load->view('layout/main',$data);
	}
	
	function submit(){ 
                //error_reporting(E_ALL);
                // print_mz($this->input->post());
		$webmaster_id=$this->session->userdata('webmaster_id');
		$id = $this->input->post('id');
		$GetColumns = GetColumns('sv_'.$this->utama);
		foreach($GetColumns as $r)
		{
			$data[$r['Field']] = $this->input->post($r['Field']);
			$data[$r['Field']."_temp"] = $this->input->post($r['Field']."_temp");
			
			if(!$data[$r['Field']] && !$data[$r['Field']."_temp"]) unset($data[$r['Field']]);
			unset($data[$r['Field']."_temp"]);
		}
                $data['roles']=3;
		
		if($id != NULL && $id != '')
		{
			/* if(!$this->input->post('password')){unset($data['password']);}
			else{$data['password']=md5($this->config->item('encryption_key').$this->input->post("password"));} */
			
			if(izin('u')){
			$data['modify_by'] = $webmaster_id;
			$data['modify_on']=date("Y-m-d");
			$this->db->where("id", $id);
			$this->db->update('sv_'.$this->utama, $data);
                        
                        $cek=$this->db->query("SELECT * FROM sv_admin WHERE marketing='$id'");
                        if($cek->num_rows()==0){
                             if($this->input->post('password')){$dataz['password']=md5($this->config->item('encryption_key').$this->input->post("password"));}else{$dataz['password']=md5($this->config->item('encryption_key').'12345');}
                        $dataz['avatar']='default.png';
                        $dataz['name']=$data['nama_lengkap'];
                        
                        $dataz['id_admin_grup']=$data['roles'];

                        $dataz['username']=  $this->input->post('username');

                        $dataz['marketing']=$id;

			$dataz['create_user_id'] = $webmaster_id;
			$dataz['create_date'] = date("Y-m-d H:i:s");
			$this->db->insert('sv_admin', $dataz);
			$idz = $this->db->insert_id();
			$profil['useradmin']=$idz;
			$profil['name']=$data['nama_lengkap'];
			$profil['avatar']=$dataz['avatar'];
			$profil['create_user_id'] = $webmaster_id;
			$profil['create_date'] = $data['modify_on'];
			$this->db->insert('sv_admin_profile',$profil);
                        }else{
                        
                        if($this->input->post('password')!=NULL){$dataz['password']=md5($this->config->item('encryption_key').$this->input->post("password"));}
                        $dataz['name']=$data['nama_lengkap'];
                        $dataz['username']=  $this->input->post('username');
			$dataz['modify_user_id'] = $webmaster_id;
			$dataz['modify_date']=date("Y-m-d");
			$this->db->where("marketing", $id);
			$this->db->update('sv_admin', $dataz);
                        }
			$this->session->set_flashdata("message", 'Sukses diedit');}
			else{
				$this->session->set_flashdata("message", 'Anda Tidak Diizinkan Mengedit Data');
			}
		}
		else
		{
			//if($this->input->post('password')){$data['password']=md5($this->config->item('encryption_key').$this->input->post("password"));}
			//if(!$this->input->post('avatar')){$data['avatar']='default.png';}
			
			if(izin('c')){
			$data['created_by'] = $webmaster_id;
			$data['created_on'] = date("Y-m-d H:i:s");
			$this->db->insert('sv_'.$this->utama, $data);
			$id = $this->db->insert_id();
                        
                        if($this->input->post('password')){$dataz['password']=md5($this->config->item('encryption_key').$this->input->post("password"));}else{$dataz['password']=md5($this->config->item('encryption_key').'12345');}
                        $dataz['avatar']='default.png';
                        $dataz['name']=$data['nama_lengkap'];
                        //$dataz['username']=  str_replace(' ','_',strtolower($data['nama_lengkap']));
                        
                        $dataz['username']=  $this->input->post('username');
                        $dataz['id_admin_grup']=$data['roles'];

                        $dataz['marketing']=$id;

			$dataz['create_user_id'] = $webmaster_id;
			$dataz['create_date'] = date("Y-m-d H:i:s");
			$this->db->insert('sv_admin', $dataz);
			$idz = $this->db->insert_id();
			$profil['useradmin']=$idz;
			$profil['name']=$data['nama_lengkap'];
			$profil['avatar']=$dataz['avatar'];
			$profil['create_user_id'] = $webmaster_id;
			$profil['create_date'] = $data['created_on'];
			$this->db->insert('sv_admin_profile',$profil);
                        
                        
			$this->session->set_flashdata("message", 'Sukses ditambahkan');}
			else{
				$this->session->set_flashdata("message", 'Anda Tidak Diizinkan Menambah Data');
			}
		}
                $anak=$this->input->post('rowanak');
                foreach($anak as $lan){
                    
                    $ambilsiswa=$this->mdlfo->query("SELECT idnumber FROM mdl_user WHERE id = '$lan'")->row();
                    $listanak['parent']=$id;
                    $listanak['child']=$lan;
                    $listanak['sisda']=$ambilsiswa->idnumber;
                    $listanak['created_by']=webmasterid();
                    $listanak['created_on']=date('Y-m-d H:i:s');
                    $this->db->insert('sv_parent_child',$listanak);
                }
		//divisi
		
		
		redirect($this->utama.'/form/'.$id);
		
	}
        function carisiswaopt(){
            $data['ids']=$this->input->post('id');
            $this->load->view('contents/master_orang_tua/opt_siswa',$data);
        }
        function searchsis(){
            $cari=$this->input->get('q');
            if(!empty($cari)){
            
            //$ambilsiswa=$this->mdlfo->query("SELECT id,firstname,lastname,idnumber FROM mdl_user WHERE firstname LIKE '%$cari%' ORDER BY firstname ASC")->result();
            $ambilsiswa=$this->db->query("SELECT * FROM sv_master_siswa WHERE nama_siswa LIKE '%$cari%' ORDER BY nama_siswa ASC")->result();
            foreach($ambilsiswa as $aw){
                $cekexist=$this->db->query("SELECT id FROM sv_parent_child WHERE child='".$aw->id."' AND parent='".webmastermarketing()."'")->num_rows();
                if($cekexist==0){
                $data['results'][]=array(
                    'id'=>$aw->id,
                    'text'=>$aw->nama_siswa.' - '.$aw->kelas.' ('.$aw->no_sisda.')'
                );
                }
            }
            echo json_encode($data);}
        }
        function hapusanak(){
            $this->db->where('id',$this->input->post('id'));
            $hapus=$this->db->delete('sv_parent_child');
            if($hapus) echo "ok";
            else "nok";
        }
	
	function delete_anak($form,$ids)
	{		
            $this->db->delete('sv_parent_child',array('id'=>$ids));
            redirect('master_orang_tua/form/'.$form);
	}
}
?>