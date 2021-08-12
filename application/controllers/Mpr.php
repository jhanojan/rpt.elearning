<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*************************************
  * Created : November 2019
  * Creator : Fauzan Rabbani
  * Email   : jhanojan@gmail.com
  * Framework ver. : CI ver.3.1.1
*************************************/	

class MPR extends CI_Controller {
	var $utama ='mpr';
	function __construct()
	{
		parent::__construct();
		 permissionz('v');
                $this->mdlfo=$this->load->database('mdb',TRUE);
	}
	
	function index()
	{
		$this->main();
	}
	
	function main()
	{
            
		//Set Global
		//$data = GetHeaderFooter();
                $this->param=array();
                $req = _request('tes',$this->param);
                //echo $req->api_name;
                //print_r($req);
                //die();
                
                $sisda=GetValue('no_sisda','sv_master_siswa',array('id'=>'where/'. webmasterkid()));
                $mid=$this->mdlfo->query("SELECT id FROM mdl_user WHERE idnumber='".$sisda."'")->row();
                $data['api_tes']=$req;
                $data['detailanak']=$this->mdlfo->query("SELECT a.idnumber,a.city,a.lastlogin,a.country,a.id,a.firstname,a.lastname,a.picture,b.contextid FROM mdl_user a LEFT JOIN mdl_files b ON b.id=a.picture WHERE a.id='".$mid->id."'")->row();
                $data['accesscourse']=$this->mdlfo->query("SELECT a.timeaccess,b.fullname name_course FROM mdl_user_lastaccess a LEFT JOIN mdl_course b ON b.id=a.courseid WHERE a.userid='".$mid->id."'")->result();
		$data['content'] = 'contents/'.$this->utama.'/view';
                $period=date('Y-m');
                $data['tagihan']=$this->db->query("SELECT * FROM sv_tagihan_siswa WHERE (sisda='".$data['detailanak']->idnumber."' or va_bsm='".$data['detailanak']->idnumber."' or va_mandiri='".$data['detailanak']->idnumber."') and periode='$period'")->row_array();
                
                $kelas=$data['detailanak']->lastname;
                if($kelas=='TKIT'){
                    $data['nilai']=$this->db->query("SELECT id FROM sv_nilai_tk WHERE sisda='$sisda' ORDER BY id DESC LIMIT 1")->num_rows();
                }
                elseif($kelas=='SDIT'){
                    $data['nilai']=$this->db->query("SELECT id FROM sv_nilai_sd WHERE sisda='$sisda' ORDER BY id DESC LIMIT 1")->num_rows();
                }elseif($kelas=='SMPIT'){
                    $data['nilai']=$this->db->query("SELECT id FROM sv_nilai_smp WHERE sisda='$sisda' ORDER BY id DESC LIMIT 1")->num_rows();
                }
		//End Global
		
		//Attendance
		
		$this->load->view('layout/main',$data);
	}
        function pdf($courseid,$render=false){ 
        error_reporting(E_ALL);
              //$error_level = error_reporting();
                // error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
            // dompdf code
            $id_ar=explode('%',$id);
            $id=implode(',',$id_ar);
        $this->load->helper('dompdf');
        $data=array();
        
                $data['api_tes']=$req;
                
                $sisda=GetValue('no_sisda','sv_master_siswa',array('id'=>'where/'. webmasterkid()));
                $mid=$this->mdlfo->query("SELECT id FROM mdl_user WHERE idnumber='".$sisda."'")->row();
                
                $data['detailanak']=$this->mdlfo->query("SELECT a.city,a.lastlogin,a.country,a.id,a.firstname,a.lastname,a.picture,b.contextid FROM mdl_user a LEFT JOIN mdl_files b ON b.id=a.picture WHERE a.id='".$mid->id."'")->row();
                $data['enrol']=$this->mdlfo->query("SELECT a.*,b.courseid courseid,c.fullname course FROM mdl_user_enrolments a LEFT JOIN mdl_enrol b ON b.id=a.enrolid LEFT JOIN mdl_course c ON b.courseid=c.id WHERE a.userid='".$mid->id."' AND c.id='$courseid'")->row();
                $data['rownilai']=$this->mdlfo->query("SELECT * FROM mdl_grade_grades a left join mdl_grade_items b ON a.itemid=b.id WHERE a.userid=".$mid->id." AND b.courseid=".$courseid." AND sortorder!=1 ORDER BY sortorder ASC")->result();
                $data['rowsum']=$this->mdlfo->query("SELECT * FROM mdl_grade_grades a left join mdl_grade_items b ON a.itemid=b.id WHERE a.userid=".$mid->id." AND b.courseid=".$courseid." AND sortorder=1")->row();
        
         $kelas=$data['detailanak']->lastname;
         if(strpos($kelas,'TKIT') !== false){
            $data['tbl']='contents/template_report/tk';
         }
         elseif(strpos($kelas,'SDIT') !== false){
            $data['tbl']='contents/template_report/sd';
         }elseif(strpos($kelas,'SMPIT') !== false){
            $data['tbl']='contents/template_report/smp';
         }
         //$tbl='contents/report_nilai/export_pdf_detail';
                
        $html = $this->load->view('contents/'.$this->utama.'/export_pdf_detail',$data,TRUE);
        // create pdf using dompdf
        $filename = "laporan_nilai";
        $paper = 'A4'; 
            $orientation = 'potrait';
            //die("ok");
            $f;
            $l;
        if(headers_sent($f,$l))
        {
            echo $f,'<br/>',$l,'<br/>';
            die('now detect line');
        }
            if($render=='true'){
                pdf_create($html, $filename, $paper, $orientation);}
            else{
                $this->load->view('contents/dashboard/export_pdf_detail',$data);  
            }
    }
	
}
?>