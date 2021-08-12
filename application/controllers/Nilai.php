<?php 

require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Nilai extends CI_Controller {
		
		
		var $utama ='nilai';
		var $title ='Nilai';
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
            //echo get('col');die();
		//Set Global
		//$data = GetHeaderFooter();
		$data['content'] = 'contents/'.$this->utama.'/view';
                
                $col=(!get('col')?'':get('col'));
                $val=(!get('val')?'':get('val'));
                $periode=(!get('periode')?'':get('periode'));
                if($col==''){
                    $data['contents']=array();
                }else{
                    $qp="";
                    if($col!='' && $val!='')$qp.="AND $col='$val'";
                    if($periode!='')$qp.="AND periode='$periode'";
                    $data['contents']=$this->db->query("SELECT * FROM sv_tagihan_siswa WHERE id>0 $qp")->result_array();
                    
                
                }
		//$data['js_grid']=$this->get_column($siswa,$ta,$kelas,$tipe);
		//$data['list']=GetAll($this->utama);
		//End Global
		
		//Attendance
		
		$this->load->view('layout/main',$data);
	}
        function listcol(){
		
            $colModel['idnya'] = array('ID',50,TRUE,'left',2,TRUE);
            $colModel['id'] = array('ID',100,TRUE,'left',2,TRUE);
            $colModel['title'] = array('Bill',300,TRUE,'left',2);
            $colModel['ta_'] = array('Tahun Ajaran',100,TRUE,'left',2);
            $colModel['siswa_'] = array('Siswa',150,TRUE,'left',2);
            $colModel['kelas_'] = array('Kelas',150,TRUE,'left',2);
            $colModel['status'] = array('Status',150,TRUE,'left',2);
			return $colModel;
	}
        
	function get_column($siswa,$ta,$kelas,$tipe){
	
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
            $buttons[] = array('buat spp manual','add','btn');
            $buttons[] = array('buat tagihan custom','add','btn');
            $buttons[] = array('separator');
            $buttons[] = array('cetak tagihan','edit','btn');
            $buttons[] = array('separator');
            $buttons[] = array('rekap tagihan pg','edit','btn');
            $buttons[] = array('rekap tagihan tk','edit','btn');
            $buttons[] = array('rekap tagihan sd','edit','btn');
            $buttons[] = array('rekap tagihan smp','edit','btn');
            //$buttons[] = array('separator');
             //$buttons[] = array('edit','edit','btn');
            //$buttons[] = array('delete','delete','btn');
            //$buttons[] = array('separator');
		
            return $grid_js = build_grid_js('flex1',site_url($this->utama."/get_record/$siswa/$ta/$kelas/$tipe"),$colModel,'sv_a.id','asc',$gridParams,$buttons);
	}
	
	function get_flexigrid($siswa,$ta,$kelas,$tipe)
        {

            //Build contents query
            $this->db->select("sv_a.*,b.nama_siswa siswa_,d.title kelas_,e.title ta_")->from('sv_bill sv_a');
            $this->db->join('sv_master_siswa b', "sv_a.siswa_id=b.id", 'left');
            $this->db->join('sv_kelas_siswa c', "sv_a.siswa_id=c.siswa_id and sv_a.ta=c.ta", 'left');
            $this->db->join('sv_master_kelas d', "c.kelas = d.id", 'left');
            $this->db->join('sv_master_tahun_ajaran e', "sv_a.ta = e.id", 'left');
            $this->db->order_by('c.kelas', "asc");
            $this->db->order_by('b.nama_siswa', "asc");
            
            $this->flexigrid->build_query();

            //Get contents
            $return['records'] = $this->db->get();

            //Build count query
            //$this->db->select("count(id) as record_count")->from('sv_bill');
            $this->db->select("count(sv_a.id) as record_count")->from('sv_bill sv_a');
            $this->db->join('sv_master_siswa b', "sv_a.siswa_id=b.id", 'left');
            $this->db->join('sv_kelas_siswa c', "sv_a.siswa_id=c.siswa_id and sv_a.ta=c.ta", 'left');
            $this->db->join('sv_master_kelas d', "c.kelas = d.id", 'left');
            $this->db->join('sv_master_tahun_ajaran e', "sv_a.ta = e.id", 'left');
            $this->db->order_by('c.kelas', "asc");
            $this->db->order_by('b.nama_siswa', "asc");
            
            $this->flexigrid->build_query(FALSE);
            $record_count = $this->db->get();
            $row = $record_count->row();

            //Get Record Count
            $return['record_count'] = $row->record_count;

            //Return all
            return $return;
        }
	
	function get_record($siswa,$ta,$kelas,$tipe){
		
            $colModel=$this->listcol(); 
		$valid_fields = array('id','code','name');

            $this->flexigrid->validate_post('sv_a.id','DESC',$valid_fields);
            $records = $this->get_flexigrid($siswa,$ta,$kelas,$tipe);

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
		function marketingclient(){
				$id=$_REQUEST['v'];
				echo GetValue('client','marketing_form_prospect',array('id'=>'where/'.$id));
		}
		function marketingtrucking(){
				$id=$_REQUEST['v'];
				echo GetValue('client','marketing_form_prospect',array('id'=>'where/'.$id)).'/'.GetValue('from','marketing_form_prospect',array('id'=>'where/'.$id)).'/'.GetValue('to','marketing_form_prospect',array('id'=>'where/'.$id)).'/'.GetValue('service_truck','marketing_form_prospect',array('id'=>'where/'.$id)).'/'.GetValue('vehicle_no','marketing_form_prospect',array('id'=>'where/'.$id));
		}
		function vendortruck(){
				$id=$_REQUEST['v'];
				$truck=GetValue('name','master_vendor',array('id'=>'where/'.GetValue('vendor','master_truck',array('id'=>'where/'.$id))));
				echo ($truck=='0' ? 'Punya Sendiri' : $truck);
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
        
                
	function upload_mpr($id=null){
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
		$data['content'] = 'contents/'.$this->utama.'/upload_mpr';
		
		
		//$this->load->view('layout/main',$data);		
                $this->load->view($data['content'],$data);

	}
        
        public function upload_submit(){
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
                    $input['sisda']=$export['B'];
                    $input['va_bsm']=$export['C'];
                    $input['va_mandiri']=$export['D'];
                    $input['nama']=$export['E'];
                    $input['status']=$export['F'];
                    $input['spp']=str_replace(',','',$export['L']);
                    $input['ks']=str_replace(',','',$export['M']);
                    $input['catering']=str_replace(',','',$export['N']);
                    $input['antar_jemput']=str_replace(',','',$export['O']);
                    $input['pmb']=str_replace(',','',$export['P']);
                    $input['lainlain']=str_replace(',','',$export['Q']);
                    $input['total_diskon']=str_replace(',','',$export['T']);
                    $input['total_non_diskon']=str_replace(',','',$export['S']);
                    
                    if(empty($input['spp']))$input['spp']=0;
                    if(empty($input['ks']))$input['ks']=0;
                    if(empty($input['catering']))$input['catering']=0;
                    if(empty($input['antar_jemput']))$input['antar_jemput']=0;
                    if(empty($input['pmb']))$input['pmb']=0;
                    if(empty($input['lainlain']))$input['lainlain']=0;
                    if(empty($input['total_diskon']))$input['total_diskon']=0;
                    if(empty($input['total_non_diskon']))$input['total_non_diskon']=0;
                    //die($exportstart['A']);
                    /*$input['jenis_risk']=$export['A'];
                    $input['tgl_register']= tglfromxls($export['B']);
                    $input['risk_desc']=$export['C'];
                    $input['status_risk']=$export['D'];
                    $input['sebab']=$export['E'];
                    $input['akibat']=$export['F'];
                    $input['pengendalian_pencegahan']=$export['G'];
                    $input['ir_impact']=$export['H'];
                    $input['ir_probability']=$export['I'];
                    
                    $input['ir_x']=$input['ir_impact']*$input['ir_probability'];
                    
                    $input['ir_assessment']=GetValue('id','sv_assessment_formula',array('impact'=>'where/'.$input['ir_impact'],'probability'=>'where/'.$input['ir_probability']));
                    $input['ic_impact']=$export['J'];
                    $input['ic_probability']=$export['K'];
                    $input['ic_x']=$input['ic_impact']*$input['ic_probability'];
                    
                    $input['ic_assessment']=GetValue('id','sv_assessment_formula',array('impact'=>'where/'.$input['ic_impact'],'probability'=>'where/'.$input['ic_probability']));
                    $input['rr_impact']=$input['ir_impact']-$input['ic_impact'];
                    $input['rr_probability']=$input['ir_probability']-$input['ic_probability'];
                    
                    $input['rr_x']=$input['rr_impact']*$input['rr_probability'];
                    
                    $input['rr_assessment']=GetValue('id','sv_assessment_formula',array('impact'=>'where/'.$input['rr_impact'],'probability'=>'where/'.$input['rr_probability']));
                    $input['r_appetite']=$export['L'];
                    $input['r_tolerance']=$export['M'];
                    $input['kejadian']=$export['N'];
                    $input['estimasi']=round(($input['r_tolerance']-$input['kejadian'])/$input['r_tolerance']*100).'%';
                    $input['size']=$export['O'];
                    $input['divisi']=GetValue('id','ref_divisi',array('title'=>'where/'.$export['P']));
                    $input['risk_owner']=GetValue('id','admin',array('name'=>'where/'.$export['Q']));
                    $input['risk_identifier']=GetValue('id','admin',array('name'=>'where/'.$export['R']));
                    $input['skmr_impact']=$export['S'];
                    $input['skmr_probability']=$export['T'];
                    $input['skmr_x']=$input['skmr_impact']*$input['skmr_probability'];
                    
                    $input['skmr_assessment']=GetValue('id','sv_assessment_formula',array('impact'=>'where/'.$input['skmr_impact'],'probability'=>'where/'.$input['skmr_probability']));
                    
                    $input['id_register']= generatenumbering($input['divisi']);
                     * 
                     */
                    $input['periode']=$this->input->post('periode');
                    $input['created_by'] = webmasterid();
                    $input['created_on'] = date("Y-m-d H:i:s");
                    $this->db->insert('sv_tagihan_siswa', $input);
                    //$start++;
                    }
                }
            echo "<script>"
            . "window.alert('Berhasil Di Upload');"
                    . "window.location.href='".base_url().$this->utama."';"
            
            . "</script>";
            }         
    }
    public function upload_mpr_submit(){
        //error_reporting(0);
        $this->load->model('model_nilai','nilai');
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
                //unset($allDataInSheet[3]);
                //unset($allDataInSheet[4]);
                //unset($allDataInSheet[5]);
                //print_mz($allDataInSheet);
                //$start=4;
                if($this->input->post('tingkat')=='tk'){
                    $this->nilai->tk($allDataInSheet);
                }
                elseif($this->input->post('tingkat')=='sd'){
                    $this->nilai->sd($allDataInSheet);
                }elseif($this->input->post('tingkat')=='smp'){
                    $this->nilai->smp($allDataInSheet);
                }
                
            echo "<script>"
            . "window.alert('Berhasil Di Upload');"
                    . "window.location.href='".base_url().$this->utama."/upload_mpr_tk';"
            
            . "</script>";
            }         
    }
}