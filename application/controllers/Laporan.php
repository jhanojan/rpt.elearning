<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*************************************
  * Created : December 2019
  * Creator : Fauzan Rabbani
  * Email   : jhanojan@gmail.com
  * Framework ver. : CI ver.3.1.1
*************************************/	

class Laporan extends CI_Controller {
	
		var $utama ='laporan';
		var $title ='Laporan';
	function __construct()
	{
		parent::__construct();
		$this->load->library('flexigrid');
                $this->load->helper('flexigrid');
                error_reporting(0);
	}
	
	function index()
	{
		$this->main();
	}
	
	function main()
	{

		if (webmastergrup() == 3) {
			redirect('laporan/orangtua');
		}
		//permission();
		//$data = GetHeaderFooter();
		$data['content'] = 'contents/'.$this->utama.'/view';
		
		$data['js_grid']=$this->get_column();
		//$data['list']=GetAll($this->utama);
		
		$this->load->view('layout/main',$data);
	}
	function listcol(){
		
            $colModel['idnya'] = array('ID',50,TRUE,'left',2,TRUE);
            $colModel['id'] = array('ID',100,TRUE,'left',2,TRUE);
            $colModel['title'] = array('Judul Laporan',200,TRUE,'left',2);
            $colModel['no_sisda'] = array('No SISDA',100,TRUE,'left',2);
            $colModel['periode_'] = array('Periode',200,TRUE,'left',2);
            $colModel['created_on'] = array('Tgl Input',200,TRUE,'left',2);
            return $colModel;
	}
	
	function get_column(){
            $colModel=$this->listcol(); 
			
            $gridParams = array(
                'rp' => 22,
                'rpOptions' => '[10,20,30,40]',
                'pagestat' => 'Displaying: {from} to {to} of {total} items.',
                'blockOpacity' => 0.5,
                'title' => '',
                'showTableToggleBtn' => TRUE
            );
        
            $buttons[] = array('select','check','btn');
            $buttons[] = array('deselect','uncheck','btn');
            $buttons[] = array('separator');
            if(izin('c'))$buttons[] = array('tambah','add','btn');
            $buttons[] = array('separator');
            //if(izin('u'))$buttons[] = array('edit','edit','btn');
            if(izin('d'))$buttons[] = array('delete','delete','btn');
            $buttons[] = array('separator');
		
            return $grid_js = build_grid_js('flex1',site_url($this->utama."/get_record"),$colModel,'id','desc',$gridParams,$buttons,600);
	}
	
	function get_flexigrid()
        {

            //Build contents query
            $this->db->order_by('id','asc');
            $this->db->select("sv_a.*,CONCAT(sv_b.title,', TA ',sv_b.ta) as periode_")->from("$this->utama sv_a");
            $this->db->join("ref_periode sv_b","sv_a.periode=sv_b.id","left");
            
            $this->flexigrid->build_query();
		//lastq();

            //Get contents
            $return['records'] = $this->db->get();
	    //lastq();
            //Build count query
            $this->db->select("count(id) as record_count");
            $this->db->from($this->utama);
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
                                        $record_items[$a][$b]="<a href='".base_url()."master_siswa/auth/$row->id'>Menu</a>";
                                        
                                        }elseif($key=='prospek'){
                                        $record_items[$a][$b]="<a href='".base_url()."master_siswa/prospek/$row->id'>Prospek Ref</a>";
                                        
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
	function ok(){
		print_r($GLOBALS['colModel']);
	}

	function deletec()
	{		
		//return true;
		if(izin('d')){
		$countries_ids_post_array = explode(",",$this->input->post('items'));
		array_pop($countries_ids_post_array);
		foreach($countries_ids_post_array as $index => $country_id){
			/*if (is_numeric($country_id) && $country_id > 0) {
				$this->delete($country_id);}*/
				$data['status']='InAktif';
				$this->db->where('id',$country_id);
				//$this->db->update($this->utama,$data);
			$this->db->delete($this->utama,array('id'=>$country_id));				
		}
			echo 'ok';
		}
		else{
			echo 'error';
		}
		//$error = "Selected countries (id's: ".$this->input->post('items').") deleted with success. Disabled for demo";
		//echo "Sukses!";
	}
	
	function form($id=null){
		
		if($id!=NULL){
		permissionz('u');
			$filter=array('id'=>'where/'.$id);
			$data['type']='Edit';
			$data['list']=GetAll($this->utama,$filter);
		}
		else{
			
		permissionz('c');
			$data['type']='New';
		}
		//$data['opt']=GetOptAll('menu','-Parents-');
                $data['opt_leader']=GetOptAll('sv_master_siswa','-Leader-',array(),'nama_lengkap');
                $data['opt_leader'][0]='-Tidak Ada Leader';
                $data['opt_ta']=GetOptAll('sv_master_tahun_ajaran','-Tahun Ajaran-',array());
                $data['opt_jenjang']=GetOptAll('sv_master_jenjang','-Jenjang-',array());
                //array_push($data['opt_leader'],$def);
		$data['content'] = 'contents/'.$this->utama.'/add';
                
		//End Global
		
		//Attendance
		
		$this->load->view('layout/main',$data);
	}
	
	function submit(){
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
		//print_mz($_FILES);

		##image nih


		$time = date('YmdHis');
		$config['upload_path'] = './files/laporan/';
		$config['allowed_types'] = '*';
		$config['max_size']	= '1000000';
		//$config['max_width']  = '1900';
		//$config['max_height']  = '1200';

		$this->load->library('upload', $config);
                $a=0;
                foreach($_FILES['filez']['name'] as $fls){
                    $sisda=(int)$fls;
		if (!empty($sisda)) {
                    $_FILES['file']['name'] = $_FILES['filez']['name'][$a];
                    $_FILES['file']['type'] = $_FILES['filez']['type'][$a];
                    $_FILES['file']['tmp_name'] = $_FILES['filez']['tmp_name'][$a];
                    $_FILES['file']['error'] = $_FILES['filez']['error'][$a];
                    $_FILES['file']['size'] = $_FILES['filez']['size'][$a];
			
			if($id != NULL && $id != ''){
					$foto= GetValue('filez',$this->utama,array('id'=>'where/'.$id));
                                        
					if($foto!=0){
						unlink('./files/laporan/'.$foto);
					}
			}

				$config['file_name'] = $data['title'] . '-' . $sisda . '_' . date("mdYiHs");

				$this->upload->initialize($config);
			if (!$this->upload->do_upload("file")) {
				$upload_error = $this->upload->display_errors();
				echo json_encode($upload_error);
                                die();
			} else {
				
				$file_info = $this->upload->data();
				$file =  $file_info['full_path'];
				$data['filez']=$file_info['file_name'];
                                $data['no_sisda']=$sisda;
				//echo json_encode($file_info);
                                if($id != NULL && $id != '')
		{
			/* if(!$this->input->post('password')){unset($data['password']);}
			else{$data['password']=md5($this->config->item('encryption_key').$this->input->post("password"));} */
			
			if(izin('u')){
			$data['modify_by'] = $webmaster_id;
			$data['modify_on']=date("Y-m-d");
			$this->db->where("id", $id);
			$this->db->update('sv_'.$this->utama, $data);
                        
                        
			$this->session->set_flashdata("message", 'Sukses diedit');}
			else{
				$this->session->set_flashdata("message", 'Anda Tidak Diizinkan Mengedit Data');
			}
		}
		else
		{
			
			
			if(izin('c')){
			$data['created_by'] = $webmaster_id;
			$data['created_on'] = date("Y-m-d H:i:s");
			$this->db->insert('sv_'.$this->utama, $data);
			
                        
                        
			$this->session->set_flashdata("message", 'Sukses ditambahkan');}
			else{
				$this->session->set_flashdata("message", 'Anda Tidak Diizinkan Menambah Data');
			}
		}
       		}
		}
		##image nih
                
		
		//divisi
                $a++;
                }
		
		redirect($this->utama);
		
	}
        function load_spp($tingkat,$ids=null){
            
            if($ids!=null)$ids=rand(111,9999);
            
$opt_item['']='-Item-';
//$lengkap=$this->db->query("SELECT * FROM sv_setup_monthly WHERE a.id='".$id_data."'")->row_array();
//lastq();
$q="SELECT * FROM sv_setup_pendaftaran WHERE jenjang='$tingkat'";
$item=$this->db->query($q)->result_array();
//lastq();
foreach($item as $i){
    
$opt_item[$i['id']]=$i['title'];
    
}
            echo form_dropdown('item_spp',$opt_item,(isset($val['kelas']) ? $val['kelas'] : ''),"class='select2' onchange='changespp(this.value)' id='spp$ids'");
            echo "<div id='sppitem'></div>";
                       echo "<script>
                            $(document).ready(function(e){ 
                                    $('#spp$ids').css('width','200px').select2({allowClear:true});
                                        $('#select2-multiple-style .btn').on('click', function(e){
					var target = $(this).find('input[type=radio]');
					var which = parseInt(target.val());
					if(which === 2) $('.select2').addClass('tag-input-style');
					 else $('.select2').removeClass('tag-input-style');
				});
                            });
                            function changespp(val){
                                $('#sppitem').load('".base_url()."master_siswa/item_spp/'+val);
                            }
                        </script>";
        }
        function item_spp($v){
            $g=GetAll('sv_setup_pendaftaran',array('id'=>'where/'.$v))->row_array();
            echo form_hidden('item_spp',$g['item']);
            $item=json_decode($g['item']);
            $total=0;
            foreach($item->item as $it){
                $harga=GetValue('price','setup_itempay',array('id'=>'where/'.$it));
                echo "<br>";
                echo GetValue('title','setup_itempay',array('id'=>'where/'.$it)).'  <b>('.uang($harga).')</b>';
                echo "<br>";
                $total+=$harga;
            }
            
            foreach($item->custom as $it){
                $harga=$it->price;
                echo "<br>";
                echo GetValue('title','ref_item_custom',array('id'=>'where/'.$it->item)).'  <b>('.uang($harga).')</b>';
                echo "<br>";
                $total+=$harga;
            }
            echo "<hr>";
            echo "TOTAL : ".uang($total);
        }
	function orangtua()
	{
		error_reporting(E_ALL);
		//echo get('col');die();
		//Set Global
		//$data = GetHeaderFooter();
		$data['content'] = 'contents/' . $this->utama . '/view_orangtua';

		$col = (!get('col') ? '' : get('col'));
		$val = (!get('val') ? '' : get('val'));
		$periode = (!get('periode') ? '' : get('periode'));
		$no_sisda=GetValue('no_sisda','master_siswa',array('id'=>'where/'.webmasterkid()));
		if ($col == '') {
			$data['contents'] = array();
		} else {
			$qp = "";
			if ($col != '' && $val != '') $qp .= "AND $col='$val'";
			if ($periode != '') $qp .= "AND periode='$periode'";
		}
		

		$data['contents'] = $this->db->query("SELECT * FROM sv_laporan WHERE no_sisda='".$no_sisda."' ORDER BY id DESC")->result_array();
		//$data['js_grid']=$this->get_column($siswa,$ta,$kelas,$tipe);
		//$data['list']=GetAll($this->utama);
		//End Global

		//Attendance

		$this->load->view('layout/main', $data);
	}
	
}
?>