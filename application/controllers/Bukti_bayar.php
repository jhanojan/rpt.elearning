<?php 

require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Bukti_bayar extends CI_Controller {
		
		
		var $utama ='bukti_bayar';
		var $title ='Bukti bayar';
		function __construct(){
                    parent::__construct();
                    $this->load->library('flexigrid');
                    $this->load->helper('flexigrid');
		}
                
                
	function index()
	{
		$this->main();
	}
	
	function main()
	{
            error_reporting(E_ALL);
            if(webmastergrup()==3){
                redirect('bukti_bayar/orangtua');
            }
                //echo get('col');die();
		//Set Global
		//$data = GetHeaderFooter();
		$data['content'] = 'contents/'.$this->utama.'/view';
                
                $col=(!get('col')?'':get('col'));
                $val=(!get('val')?'':get('val'));
                $periode=(!get('periode')?'':get('periode'));
                $siswa=(!get('sisda')?'--':get('sisda'));
                $nama=(!get('nama')?'--':get('nama'));                
                if($col==''){
                    //$data['contents']=array();
                }else{
                    $qp="";
                    if($col!='' && $val!='')$qp.="AND $col='$val'";
                    if($periode!='')$qp.="AND periode='$periode'";
                    
                }
                $orangtua="";
                if($this->session->userdata("webmaster_grup")==3){
                   $orangtua="AND created_by=". webmastermarketing(); 
                }
                
		$data['content'] = 'contents/'.$this->utama.'/view';
		
		$data['js_grid']=$this->get_column($siswa,$nama);
		//$data['list']=GetAll($this->utama);
		
		$this->load->view('layout/main',$data);
	}
        
	function orangtua()
	{
            error_reporting(E_ALL);
            //echo get('col');die();
		//Set Global
		//$data = GetHeaderFooter();
		$data['content'] = 'contents/'.$this->utama.'/view_orangtua';
                
                $col=(!get('col')?'':get('col'));
                $val=(!get('val')?'':get('val'));
                $periode=(!get('periode')?'':get('periode'));
                if($col==''){
                    $data['contents']=array();
                }else{
                    $qp="";
                    if($col!='' && $val!='')$qp.="AND $col='$val'";
                    if($periode!='')$qp.="AND periode='$periode'";
                    
                    
                
                }
                $orangtua="";
                if($this->session->userdata("webmaster_grup")==3){
                   $orangtua="AND created_by=". webmastermarketing(); 
                }
                
                $data['contents']=$this->db->query("SELECT * FROM sv_bukti_bayar WHERE id>0 $orangtua $qp")->result_array();
		//$data['js_grid']=$this->get_column($siswa,$ta,$kelas,$tipe);
		//$data['list']=GetAll($this->utama);
		//End Global
		
		//Attendance
		
		$this->load->view('layout/main',$data);
	}
        function listcol(){
		
            $colModel['idnya'] = array('ID',50,TRUE,'left',2,TRUE);
            $colModel['id'] = array('ID',100,TRUE,'left',2,TRUE);
            $colModel['siswa_'] = array('Siswa',300,TRUE,'left',2);
            $colModel['no_sisda'] = array('No Sisda',100,TRUE,'left',2);
            $colModel['kelas'] = array('Kelas',150,TRUE,'left',2);
            $colModel['file'] = array('File',150,TRUE,'left',2);
            $colModel['status'] = array('Status',150,TRUE,'left',2);
            $colModel['dikirim'] = array('Waktu Pengiriman',150,TRUE,'left',2);
			return $colModel;
	}
        function delete($id){
            $this->db->where('id',$id);
            $this->db->delete('sv_bukti_bayar');
            redirect($this->utama);
            
        }
        
        function updatestatus($type,$id){
            $data['status']=$type;
            $this->db->where('id',$id);
            $this->db->update('sv_bukti_bayar',$data);
            if($type=='accepted'){
                $tagihan=GetAll('sv_bukti_bayar',array('id'=>'where/'.$id))->row_array();
                $sisda=GetValue('no_sisda','master_siswa',array('id'=>'where/'.$tagihan['siswa']));
            $this->db->where(array('periode'=>$tagihan['periode']));
            $this->db->update('sv_tagihan_siswa',array('status_bayar'=>'TERBAYAR'));
            }
            redirect($this->utama);
            
        }
	function get_column($siswa,$nama){
	
            $colModel=$this->listcol(); 
        
            $gridParams = array(
                'rp' => 29,
                'rpOptions' => '[10,20,30,40]',
                'pagestat' => 'Displaying: {from} to {to} of {total} items.',
                'blockOpacity' => 0.5,
                'title' => '',
                'showTableToggleBtn' => TRUE
		);
        
            $buttons[] = array('select','check','btn');
            $buttons[] = array('deselect','uncheck','btn');
            $buttons[] = array('separator');
            $buttons[] = array('berikan feedback','edit','btn');
            $buttons[] = array('separator');
            //$buttons[] = array('separator');
             //$buttons[] = array('edit','edit','btn');
            //$buttons[] = array('delete','delete','btn');
            //$buttons[] = array('separator');
		
            return $grid_js = build_grid_js('flex1',site_url($this->utama."/get_record/$siswa/$nama"),$colModel,'sv_a.id','desc',$gridParams,$buttons);
	}
	
	function get_flexigrid($siswa,$nama)
        {

            //Build contents query
            $this->db->select("sv_a.*,b.nama_siswa siswa_,b.kelas,b.no_sisda,DATE_FORMAT(sv_a.created_on ,'%d/%m/%Y %H:%i:%s') AS dikirim ")->from($this->utama.' sv_a');
            $this->db->join('sv_master_siswa b', "sv_a.siswa=b.id", 'left');
            //$this->db->join('sv_kelas_siswa c', "sv_a.siswa_id=c.siswa_id and sv_a.ta=c.ta", 'left');
            //$this->db->join('sv_master_kelas d', "c.kelas = d.id", 'left');
            //$this->db->join('sv_master_tahun_ajaran e', "sv_a.ta = e.id", 'left');
            //$this->db->order_by('c.kelas', "asc");
            if($siswa!='--') $this->db->where("b.no_sisda LIKE '%$siswa%'");
            if($nama!='--') $this->db->where("b.nama_siswa LIKE '%".rawurldecode($nama)."%'");
            $this->db->order_by('sv_a.id', "desc");
            
            $this->flexigrid->build_query();

            //Get contents
            $return['records'] = $this->db->get();

            //Build count query
            //$this->db->select("count(id) as record_count")->from('sv_bill');
            $this->db->select("count(sv_a.id) as record_count")->from($this->utama.' sv_a');
            $this->db->join('sv_master_siswa b', "sv_a.siswa=b.id", 'left');
            //$this->db->join('sv_kelas_siswa c', "sv_a.siswa_id=c.siswa_id and sv_a.ta=c.ta", 'left');
            //$this->db->join('sv_master_kelas d', "c.kelas = d.id", 'left');
            //$this->db->join('sv_master_tahun_ajaran e', "sv_a.ta = e.id", 'left');
            //$this->db->order_by('c.kelas', "asc");
            if($siswa!='--') $this->db->where("b.no_sisda LIKE '%$siswa%'");
            
            if($nama!='--') $this->db->where("b.nama_siswa LIKE '%".rawurldecode($nama)."%'");
            $this->db->order_by('sv_a.id', "desc");
            
            $this->flexigrid->build_query(FALSE);
            $record_count = $this->db->get();
            $row = $record_count->row();

            //Get Record Count
            $return['record_count'] = $row->record_count;

            //Return all
            return $return;
        }
	
	function get_record($siswa,$nama){
		
            $colModel=$this->listcol(); 
		$valid_fields = array('id','siswa');

            $this->flexigrid->validate_post('sv_a.id','DESC',$valid_fields);
            $records = $this->get_flexigrid($siswa,$nama);

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
                                        $record_items[$a][$b]="<a href='".base_url()."master_bank/auth/$row->id'>Menu</a>";
                                        
                                        }elseif($key=='prospek'){
                                        $record_items[$a][$b]="<a href='".base_url()."master_bank/prospek/$row->id'>Prospek Ref</a>";
                                        
                                        }
					elseif($key=='username'){
                                        $record_items[$a][$b]=GetValue('username','sv_admin',array('marketing'=>'where/'.$row->id));
                                        
                                        }
					elseif($key=='file'){
                                        $record_items[$a][$b]="<a href='".base_url()."bukti_pembayaran/".$row->bukti."' target='_blank'>Lihat File</a>";
                                        
                                        }
					elseif($key!='idnya' && $key!='id' && $key!='username'){
                                        $record_items[$a][$b]=$row->$key;
                                        
                                        }
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
		function renderdropdown($id=NULL){
				$side=GetAll('sv_menu',array('id_parents'=>'where/'.(int)$id,'sort'=>'order/ASC','is_active'=>"where/Active"));
				$data['menu']=$side->result();
				$this->load->view('layout/listside',$data);
		}
		function rendermessage(){
			error_reporting(0);
				$filter=array();
				$idwebmaster=$this->session->userdata('webmaster_grup');
				if($idwebmaster==4 || $idwebmaster==5 || $idwebmaster==6 ||  $idwebmaster==7 || webmastergrup()==8 || webmastergrup()==10){
				if($idwebmaster==4){$filter['to']='where/Export';}
				if($idwebmaster==5){$filter['to']='where/Import';}
				if($idwebmaster==7){$filter['to']='where/Finance';}
				if($idwebmaster==6 || webmastergrup()==8 || webmastergrup()==10){$filter['to']='where/Trucking';}
				
				}
				$filter['status']='where/N';
				$filter['create_date']='order/DESC';
				
				$data['badge']=GetAll('notif',$filter)->num_rows();
				
				//unset($filter['status']);
				$data['isi']=GetAll('notif',$filter)->result_array();
				
				$this->load->view('layout/message',$data);
		}
		function error404(){
				$this->load->view('layout/notfound');
		}
		function ambilakun(){
				$akun=GetAll('setup_account_mapping',array('id'=>'where/'.$_REQUEST['a']))->row_array();
				echo $akun['acno'].'/'.$akun['acno2'].'/'.$akun['name'].'/'.$akun['name'];
		}
		
                
	function upload($id=null){
		izin();
		if($id!=NULL){
			$filter=array('id'=>'where/'.$id);
			$data['type']='Edit';
                        $data['list']=GetAll($this->utama,$filter);
		}
		else{
			$data['type']='New';
		}
                
		//$data['opt']=GetOptAll('admin_grup');
		$data['content'] = 'contents/'.$this->utama.'/upload_xls';
		
		
		$this->load->view('layout/main',$data);
	}
                
	function update($id=null){
		izin();
		if($id!=NULL){
			$filter=array('id'=>'where/'.$id);
			$data['type']='Edit';
                        $data['list']=GetAll($this->utama,$filter);
		}
		else{
			$data['type']='New';
		}
                
		//$data['opt']=GetOptAll('admin_grup');
		$data['content'] = 'contents/'.$this->utama.'/update_xls';
		
		
		$this->load->view('layout/main',$data);
	}
        
                public function upload_submit(){
        
                    if (!empty($_FILES["filez"]['name'])) {
			$time=date('YmdHis');
			$config['upload_path'] = './bukti_pembayaran/';
			$config['allowed_types'] = '*';
			//$config['max_size']	= '2048';
			//$config['max_width']  = '1900';
			//$config['max_height']  = '1200';
			$config['file_name']=date("mdYiHs").rand(111,999);
			
			$this->load->library('upload', $config);
                        $this->load->library('image_lib');
			
//			if($id != NULL && $id != ''){
//			unlink('./bukti_pembayaran/file_quo/'.GetValue("file_quo",'activity_sales',array('id'=>'where/'.$id)));
//                        
//                        }
			
			if (!$this->upload->do_upload("filez")) {
				$upload_error = $this->upload->display_errors();
				 echo '<script type="text/javascript">'; 
                                echo 'alert("'.$upload_error.'");';  
                                echo 'window.history.back();'; 
                                echo '</script>';
                                exit;
			} else {
				
				$file_info = $this->upload->data();
				$file =  $file_info['full_path'];
				$data["bukti"]=$file_info['file_name'];
                                $configer = array(
                                    'image_library' => 'gd2',
                                    'source_image' => $file_info['full_path'],
                                    'create_thumb' => FALSE,//tell the CI do not create thumbnail on image
                                    'maintain_ratio' => TRUE,
                                    'quality' => '80%', //tell CI to reduce the image quality and affect the image size
                                    'width' => 800,//new size of image
                                    'height' => 640,//new size of image
                                );
                            $this->image_lib->clear();
                            $this->image_lib->initialize($configer);
                            $this->image_lib->resize();
				//echo json_encode($file_info);
                            $data['siswa']=$this->input->post('siswa');
                            $data['periode']=$this->input->post('periode');
                            $data['keterangan']=$this->input->post('keterangan');
                            $data['created_on']=date('Y-m-d H:i:s');
                            $data['created_by']=webmastermarketing();
                            
                            //$this->db->where(array('siswa'=>$data['siswa'],'periode'=>$data['periode']));
                            //$this->db->delete('bukti_bayar');
                            
                            $this->db->insert('bukti_bayar',$data);
                        }
                        
            echo "<script>"
            . "window.alert('Berhasil Di Upload');"
                    . "window.location.href='".base_url().$this->utama."';"
            
            . "</script>";
		}
               
    }
    public function upload_update_submit(){
        //error_reporting(0);
        $data = array();
        $data['title'] = 'Import Excel Sheet | TechArise';
        $data['breadcrumbs'] = array('Home' => '#');
            // If file uploaded
        //die('disini');
            if(!empty($_FILES['filez']['name'])) { 
                // get file extension
                $extension = pathinfo($_FILES['filez']['name'], PATHINFO_EXTENSION);
 
                if($extension == 'csv'){
                    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
                } elseif($extension == 'xlsx') {
                    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
                } else {
                    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
                }
                // file path
                $spreadsheet = $reader->load($_FILES['filez']['tmp_name']);
                $allDataInSheet = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
                unset($allDataInSheet[1]);
                unset($allDataInSheet[2]);
                unset($allDataInSheet[3]);
                unset($allDataInSheet[4]);
                unset($allDataInSheet[5]);
                //print_mz($allDataInSheet);
                //$start=4;
                foreach($allDataInSheet as $export){
                    
                    if(!empty($export['B'])){
                    $sisda=$export['B'];
                    $va_bsm=$export['C'];
                    $va_mandiri=$export['D'];
                    $nama=$export['E'];
                    $total_bayar=str_replace(',','',$export['F']);
                    $periode=$this->input->post('periode');
                    $cari=$this->db->query("SELECT id FROM sv_tagihan_siswa WHERE periode='$periode' AND (sisda='$sisda' OR va_bsm='$va_bsm' OR va_mandiri='$va_mandiri')")->row_array();
                    if($cari['id']>0){
                        if(empty($total_bayar))$total_bayar=0;
                        
                        $update['total_bayar'] = $total_bayar;
                        $update['status_bayar'] = 'TERBAYAR';
                        $update['modify_by'] = webmasterid();
                        $update['modify_on'] = date("Y-m-d H:i:s");
                        $this->db->where('id',$cari['id']);
                        $this->db->update('sv_tagihan_siswa', $update);
                    }
                    
                    }
                }
            echo "<script>"
            . "window.alert('Berhasil Di Upload');"
                    . "window.location.href='".base_url().$this->utama."';"
            
            . "</script>";
            }         
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
    function submit_bayar(){ 
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
		
		if($id != NULL && $id != '')
		{
			/* if(!$this->input->post('password')){unset($data['password']);}
			else{$data['password']=md5($this->config->item('encryption_key').$this->input->post("password"));} */
			
			//if(izin('u')){
			$data['modify_by'] = $webmaster_id;
			$data['modify_on']=date("Y-m-d");
			$this->db->where("id", $id);
			$this->db->update('sv_'.$this->utama, $data);
                        
                        $tagihan=$this->input->post('tagihan');
                        foreach($tagihan as $key=>$val){
                            
                            $dataz['status_bayar']=$val;
                            $dataz['modify_by'] = $webmaster_id;
                            $dataz['modify_on']=date("Y-m-d");
                            $this->db->where("id", $key);
                            $this->db->update('sv_tagihan_siswa', $dataz);
                        }
			$this->session->set_flashdata("message", 'Sukses diberikan Feedback');
                        
                        //}
			//else{
			//	$this->session->set_flashdata("message", 'Anda Tidak Diizinkan Mengedit Data');
			//}
		}
		else
		{
			echo "Forbidden";
                        exit;
		}
                
		redirect($this->utama);
		
	}
}