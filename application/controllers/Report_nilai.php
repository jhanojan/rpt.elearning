<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*************************************
  * Created : November 2019
  * Creator : Fauzan Rabbani
  * Email   : jhanojan@gmail.com
  * Framework ver. : CI ver.3.1.1
*************************************/	

class Report_nilai extends CI_Controller {
	var $utama ='report_nilai';
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
                $data['api_tes']=$req;
                $data['detailanak']=$this->mdlfo->query("SELECT a.city,a.lastlogin,a.country,a.id,a.firstname,a.lastname,a.picture,b.contextid FROM mdl_user a LEFT JOIN mdl_files b ON b.id=a.picture WHERE a.id='".$this->session->userdata('chosen_kid')."'")->row();
                $data['enrol']=$this->mdlfo->query("SELECT a.*,b.courseid courseid,c.fullname course FROM mdl_user_enrolments a LEFT JOIN mdl_enrol b ON b.id=a.enrolid LEFT JOIN mdl_course c ON b.courseid=c.id WHERE a.userid='".$this->session->userdata('chosen_kid')."'")->result();
		$data['content'] = 'contents/'.$this->utama.'/view';
		//End Global
		
		//Attendance
		
		$this->load->view('layout/main',$data);
	}
        function detail($courseid)
	{
            
		//Set Global
		//$data = GetHeaderFooter();
                $this->param=array();
                $req = _request('tes',$this->param);
                //echo $req->api_name;
                //print_r($req);
                //die();
                $data['api_tes']=$req;
                $data['detailanak']=$this->mdlfo->query("SELECT a.city,a.lastlogin,a.country,a.id,a.firstname,a.lastname,a.picture,b.contextid FROM mdl_user a LEFT JOIN mdl_files b ON b.id=a.picture WHERE a.id='".$this->session->userdata('chosen_kid')."'")->row();
                $data['enrol']=$this->mdlfo->query("SELECT a.*,b.courseid courseid,c.fullname course FROM mdl_user_enrolments a LEFT JOIN mdl_enrol b ON b.id=a.enrolid LEFT JOIN mdl_course c ON b.courseid=c.id WHERE a.userid='".$this->session->userdata('chosen_kid')."' AND c.id='$courseid'")->row();
                $data['rownilai']=$this->mdlfo->query("SELECT * FROM mdl_grade_grades a left join mdl_grade_items b ON a.itemid=b.id WHERE a.userid=".$this->session->userdata('chosen_kid')." AND b.courseid=".$courseid." AND sortorder!=1 ORDER BY sortorder ASC")->result();
                $data['rowsum']=$this->mdlfo->query("SELECT * FROM mdl_grade_grades a left join mdl_grade_items b ON a.itemid=b.id WHERE a.userid=".$this->session->userdata('chosen_kid')." AND b.courseid=".$courseid." AND sortorder=1")->row();
		$data['content'] = 'contents/'.$this->utama.'/detail';
		//End Global
		
		//Attendance
		
		$this->load->view('layout/main',$data);
	}
function visitors(){
$charts='<chart caption="Temperature Monitoring (in degree C) on on 7/9/2013" xaxisname="Time" yaxismaxvalue="100" linecolor="008ee4" anchorsides="3" anchorradius="5" plotgradientcolor=" " bgcolor="FFFFFF" showalternatehgridcolor="0" showplotborder="0" showvalues="0" divlinecolor="666666" showcanvasborder="0" canvasborderalpha="0" >
<set label="0" value="34" />
<set label="3" value="27" />
<set label="6" value="42" />
<set label="9" value="50" />
<set label="12" value="68" />
<set label="15" value="56" />
<set label="18" value="48" />
<set label="21" value="34" />
<set label="24" value="30" />
<trendlines>
<line startvalue="80" endvalue="100" displayvalue="Critical" color="008ee4" istrendzone="1" showontop="0" alpha="35" valueonright="1" />
<line startvalue="60" endvalue="80" displayvalue="Warning" color="33bdda" istrendzone="1" showontop="0" alpha="35" valueonright="1" />
</trendlines>
</chart>';	
echo $charts;
}	
    function pdf($courseid,$render=false){ 
        error_reporting(0);
              //$error_level = error_reporting();
                // error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
            // dompdf code
            $id_ar=explode('%',$id);
            $id=implode(',',$id_ar);
        $this->load->helper('dompdf');
        $data=array();
        
                $data['api_tes']=$req;
                $data['detailanak']=$this->mdlfo->query("SELECT a.city,a.lastlogin,a.country,a.id,a.firstname,a.lastname,a.picture,b.contextid FROM mdl_user a LEFT JOIN mdl_files b ON b.id=a.picture WHERE a.id='".$this->session->userdata('chosen_kid')."'")->row();
                $data['enrol']=$this->mdlfo->query("SELECT a.*,b.courseid courseid,c.fullname course FROM mdl_user_enrolments a LEFT JOIN mdl_enrol b ON b.id=a.enrolid LEFT JOIN mdl_course c ON b.courseid=c.id WHERE a.userid='".$this->session->userdata('chosen_kid')."' AND c.id='$courseid'")->row();
                $data['rownilai']=$this->mdlfo->query("SELECT * FROM mdl_grade_grades a left join mdl_grade_items b ON a.itemid=b.id WHERE a.userid=".$this->session->userdata('chosen_kid')." AND b.courseid=".$courseid." AND sortorder!=1 ORDER BY sortorder ASC")->result();
                $data['rowsum']=$this->mdlfo->query("SELECT * FROM mdl_grade_grades a left join mdl_grade_items b ON a.itemid=b.id WHERE a.userid=".$this->session->userdata('chosen_kid')." AND b.courseid=".$courseid." AND sortorder=1")->row();
        //foreach($data['lastq'] as $ls){
        //    $on[]=$ls['customer'];
        //}
        //if(count(array_unique($on, SORT_REGULAR)) >1){
        // echo "<script>alert('Silakan Pilh Customer yang sama');history.back();</script>";   
        // die();
        //};
        //lastq();
        
                /*$data['col']=$this->listcol();  
            error_reporting(E_ALL);
		$op = explode("%",$lastq);
                foreach($op as $or){
                    $inz[]="$or";
                }
                $oops=implode($inz,',');
             $q="SELECT * FROM sv_activity_view WHERE id IN (".$oops.")";
                
		$data['lastq']=$this->db->query($q)->result_array();
                 * 
                 */
               // lastq();
        //load content html
        //$html = $this->load->view('contents/report_nilai/blank_pdf',$data,TRUE);
        $html = $this->load->view('contents/report_nilai/export_pdf_detail',$data,TRUE);
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
                $this->load->view('contents/report_nilai/export_pdf_detail',$data);  
            }
    }
	
}
?>