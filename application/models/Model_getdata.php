<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_getdata extends CI_Model{
	
	function get_judul(){
	$tbl='sv_report';
	$this->db->select('*')->from($tbl)->where('statusisasi','1');
	$q=$this->db->get();
	return $q;
	}
	function get_karyawannya($dep){
		$tbl='kg_employee';
	$this->db->select('*')->from($tbl);
	//$this->db->order_by('name', 'asc');
	if($dep!=''){
	$this->db->where('id_department',$dep);
	}
	$q=$this->db->get();
	return $q;
	}
	function get_supplier(){
	$tbl='tb_supplier';
	$this->db->select('*')->from($tbl);
	//$this->db->order_by('title', 'asc');
	$q=$this->db->get();
	return $q;
	}
	function get_kasir(){
	$tbl='tb_user';
	$sq="SELECT * FROM $tbl WHERE jabatan IN('1','3')";
	$q=$this->db->query($sq);
	//lastq();
	return $q;
	}
	function get_karyawan(){
	$tbl='tb_karyawan';
	$sq="SELECT * FROM $tbl ";
	$q=$this->db->query($sq);
	//lastq();
	return $q;
	}
	function get_kas(){
	$tbl='tb_kas';
	$sq="SELECT * FROM $tbl";
	$q=$this->db->query($sq);
	//lastq();
	return $q;
	}
	function get_grup_inventory(){
	$tbl='tb_group_inventory';
	$this->db->select('*')->from($tbl)->where('status','y');
	//$this->db->order_by('title', 'asc');
	$q=$this->db->get();
	return $q;
	}
	function get_department_name($id){
	$tbl='kg_department';
	$this->db->select('title')->from($tbl)->where('id',$id);
	$q=$this->db->get();
	return $q->row_array();
	}
	function namabulan(){
		$bulan=array(
		'01'=>'January',
		'02'=>'February',
		'03'=>'March',
		'04'=>'April',
		'05'=>'May',
		'06'=>'June',
		'07'=>'July',
		'08'=>'August',
		'09'=>'September',
		'10'=>'October',
		'11'=>'November',
		'12'=>'December',
		);
		return $bulan;
	}
	function getdoc($id){
		$this->db->select('*')->from('tb_report')->where('id',$id);
		$q=$this->db->get();
		return $q->row_array();
	}
        function getmodulescourse($course,$completed=null){
            if(!empty($completed)){
                $nw=" AND cm.completion!=0 AND m.visible=1";
            }else $nw=" AND cm.visible=1";
            $q="SELECT
c.shortname AS 'Course', c.id id,
m.name AS Activitytype, sct.name as sectionname, cm.completion,m.visible,c.id,cm.id coursemodule,
CASE 
    WHEN m.name = 'assign'  THEN (SELECT name FROM mdl_assign WHERE id = cm.instance)
    WHEN m.name = 'assignment'  THEN (SELECT name FROM mdl_assign WHERE id = cm.instance)
    WHEN m.name = 'book'  THEN (SELECT name FROM mdl_book WHERE id = cm.instance)
    WHEN m.name = 'chat'  THEN (SELECT name FROM mdl_chat WHERE id = cm.instance)
    WHEN m.name = 'choice'  THEN (SELECT name FROM mdl_choice WHERE id = cm.instance)
    WHEN m.name = 'data'  THEN (SELECT name FROM mdl_data WHERE id = cm.instance)
    WHEN m.name = 'feedback'  THEN (SELECT name FROM mdl_feedback WHERE id = cm.instance)
    WHEN m.name = 'folder'  THEN (SELECT name FROM mdl_folder WHERE id = cm.instance)
    WHEN m.name = 'forum' THEN (SELECT name FROM mdl_forum WHERE id = cm.instance)
    WHEN m.name = 'glossary' THEN (SELECT name FROM mdl_glossary WHERE id = cm.instance)
    WHEN m.name = 'h5pactivity' THEN (SELECT name FROM mdl_h5pactivity WHERE id = cm.instance)
    WHEN m.name = 'hvp' THEN (SELECT name FROM mdl_hvp WHERE id = cm.instance)
    WHEN m.name = 'imscp' THEN (SELECT name FROM mdl_imscp WHERE id = cm.instance)
    WHEN m.name = 'label'  THEN (SELECT intro FROM mdl_label WHERE id = cm.instance)
    WHEN m.name = 'lesson'  THEN (SELECT name FROM mdl_lesson WHERE id = cm.instance)
    WHEN m.name = 'lti'  THEN (SELECT name FROM mdl_lti  WHERE id = cm.instance)".
    //WHEN m.name = 'oublog' THEN (SELECT name FROM mdl_oublog  WHERE id = cm.instance)
    "WHEN m.name = 'page'  THEN (SELECT name FROM mdl_page WHERE id = cm.instance)
    WHEN m.name = 'quiz'  THEN (SELECT name FROM mdl_quiz WHERE id = cm.instance)
    WHEN m.name = 'questionnaire'  THEN (SELECT name FROM mdl_questionnaire WHERE id = cm.instance)
    WHEN m.name = 'resource'  THEN (SELECT name FROM mdl_resource WHERE id = cm.instance)
    WHEN m.name = 'scorm'  THEN (SELECT name FROM mdl_scorm WHERE id = cm.instance)
    WHEN m.name = 'survey'  THEN (SELECT name FROM mdl_survey WHERE id = cm.instance)
    WHEN m.name = 'url'  THEN (SELECT name FROM mdl_url  WHERE id = cm.instance)
    WHEN m.name = 'wiki' THEN (SELECT name FROM mdl_wiki  WHERE id = cm.instance)
    WHEN m.name = 'workshop' THEN (SELECT name FROM mdl_workshop  WHERE id = cm.instance)
   ELSE \"Other activity\"
END AS Actvityname,

CASE 
    WHEN m.name = 'assign'  THEN (SELECT intro FROM mdl_assign WHERE id = cm.instance)
    WHEN m.name = 'assignment'  THEN (SELECT intro FROM mdl_assign WHERE id = cm.instance)
    WHEN m.name = 'book'  THEN (SELECT intro FROM mdl_book WHERE id = cm.instance)
    WHEN m.name = 'chat'  THEN (SELECT intro FROM mdl_chat WHERE id = cm.instance)
    WHEN m.name = 'choice'  THEN (SELECT intro FROM mdl_choice WHERE id = cm.instance)
    WHEN m.name = 'data'  THEN (SELECT intro FROM mdl_data WHERE id = cm.instance)
    WHEN m.name = 'feedback'  THEN (SELECT intro FROM mdl_feedback WHERE id = cm.instance)
    WHEN m.name = 'folder'  THEN (SELECT intro FROM mdl_folder WHERE id = cm.instance)
    WHEN m.name = 'forum' THEN (SELECT intro FROM mdl_forum WHERE id = cm.instance)
    WHEN m.name = 'glossary' THEN (SELECT intro FROM mdl_glossary WHERE id = cm.instance)
    WHEN m.name = 'h5pactivity' THEN (SELECT intro FROM mdl_h5pactivity WHERE id = cm.instance)
    WHEN m.name = 'hvp' THEN (SELECT intro FROM mdl_hvp WHERE id = cm.instance)
    WHEN m.name = 'imscp' THEN (SELECT intro FROM mdl_imscp WHERE id = cm.instance)
    WHEN m.name = 'label'  THEN (SELECT intro FROM mdl_label WHERE id = cm.instance)
    WHEN m.name = 'lesson'  THEN (SELECT intro FROM mdl_lesson WHERE id = cm.instance)
    WHEN m.name = 'lti'  THEN (SELECT intro FROM mdl_lti  WHERE id = cm.instance)".
    //WHEN m.name = 'oublog' THEN (SELECT intro FROM mdl_oublog  WHERE id = cm.instance)
    "WHEN m.name = 'page'  THEN (SELECT intro FROM mdl_page WHERE id = cm.instance)
    WHEN m.name = 'quiz'  THEN (SELECT intro FROM mdl_quiz WHERE id = cm.instance)
    WHEN m.name = 'questionnaire'  THEN (SELECT intro FROM mdl_questionnaire WHERE id = cm.instance)
    WHEN m.name = 'resource'  THEN (SELECT intro FROM mdl_resource WHERE id = cm.instance)
    WHEN m.name = 'scorm'  THEN (SELECT intro FROM mdl_scorm WHERE id = cm.instance)
    WHEN m.name = 'survey'  THEN (SELECT intro FROM mdl_survey WHERE id = cm.instance)
    WHEN m.name = 'url'  THEN (SELECT intro FROM mdl_url  WHERE id = cm.instance)
    WHEN m.name = 'wiki' THEN (SELECT intro FROM mdl_wiki  WHERE id = cm.instance)
    WHEN m.name = 'workshop' THEN (SELECT intro FROM mdl_workshop  WHERE id = cm.instance)
   ELSE \"Other activity\"
END AS Intro
# cm.section AS Coursesection, 
FROM mdl_course_modules cm 
JOIN mdl_course c ON cm.course = c.id
JOIN mdl_modules m ON cm.module = m.id
JOIN mdl_course_sections AS sct ON cm.section=sct.id
# skip the predefined admin AND guest USER
WHERE c.id=$course AND deletioninprogress=0 $nw
ORDER BY sectionname,cm.id";
            return $this->mdlfo->query($q);
        }
        
        function getmodulescoursecompleted($course,$kid,$modules=null){
            $n="";
            if($modules!=null){
                $n="AND cmc.coursemoduleid=$modules";
            }
            $q="SELECT
u.username AS 'User',
c.shortname AS 'Course',
m.name AS Activitytype, cmc.coursemoduleid,
CASE 
    WHEN m.name = 'assign'  THEN (SELECT name FROM mdl_assign WHERE id = cm.instance)
    WHEN m.name = 'assignment'  THEN (SELECT name FROM mdl_assign WHERE id = cm.instance)
    WHEN m.name = 'book'  THEN (SELECT name FROM mdl_book WHERE id = cm.instance)
    WHEN m.name = 'chat'  THEN (SELECT name FROM mdl_chat WHERE id = cm.instance)
    WHEN m.name = 'choice'  THEN (SELECT name FROM mdl_choice WHERE id = cm.instance)
    WHEN m.name = 'data'  THEN (SELECT name FROM mdl_data WHERE id = cm.instance)
    WHEN m.name = 'feedback'  THEN (SELECT name FROM mdl_feedback WHERE id = cm.instance)
    WHEN m.name = 'folder'  THEN (SELECT name FROM mdl_folder WHERE id = cm.instance)
    WHEN m.name = 'forum' THEN (SELECT name FROM mdl_forum WHERE id = cm.instance)
    WHEN m.name = 'glossary' THEN (SELECT name FROM mdl_glossary WHERE id = cm.instance)
    WHEN m.name = 'h5pactivity' THEN (SELECT name FROM mdl_h5pactivity WHERE id = cm.instance)
    WHEN m.name = 'imscp' THEN (SELECT name FROM mdl_imscp WHERE id = cm.instance)
    WHEN m.name = 'label'  THEN (SELECT name FROM mdl_label WHERE id = cm.instance)
    WHEN m.name = 'lesson'  THEN (SELECT name FROM mdl_lesson WHERE id = cm.instance)
    WHEN m.name = 'lti'  THEN (SELECT name FROM mdl_lti  WHERE id = cm.instance)
    WHEN m.name = 'page'  THEN (SELECT name FROM mdl_page WHERE id = cm.instance)
    WHEN m.name = 'quiz'  THEN (SELECT name FROM mdl_quiz WHERE id = cm.instance)
    WHEN m.name = 'questionnaire'  THEN (SELECT name FROM mdl_questionnaire WHERE id = cm.instance)
    WHEN m.name = 'resource'  THEN (SELECT name FROM mdl_resource WHERE id = cm.instance)
    WHEN m.name = 'scorm'  THEN (SELECT name FROM mdl_scorm WHERE id = cm.instance)
    WHEN m.name = 'survey'  THEN (SELECT name FROM mdl_survey WHERE id = cm.instance)
    WHEN m.name = 'url'  THEN (SELECT name FROM mdl_url  WHERE id = cm.instance)
    WHEN m.name = 'wiki' THEN (SELECT name FROM mdl_wiki  WHERE id = cm.instance)
    WHEN m.name = 'workshop' THEN (SELECT name FROM mdl_workshop  WHERE id = cm.instance)
   ELSE \"Other activity\"
END AS Actvityname,
# cm.section AS Coursesection,
CASE
    WHEN cm.completion = 0 THEN '0 None'
    WHEN cm.completion = 1 THEN '1 Self'
    WHEN cm.completion = 2 THEN '2 Auto'
END AS Activtycompletiontype, 
CASE
   WHEN cmc.completionstate = 0 THEN 'In Progress'
   WHEN cmc.completionstate = 1 THEN 'Completed'
   WHEN cmc.completionstate = 2 THEN 'Completed with Pass'
   WHEN cmc.completionstate = 3 THEN 'Completed with Fail'
   ELSE 'Unknown'
END AS 'Progress', 
DATE_FORMAT(FROM_UNIXTIME(cmc.timemodified), '%Y-%m-%d %H:%i') AS 'When'
FROM mdl_course_modules_completion cmc 
JOIN mdl_user u ON cmc.userid = u.id
JOIN mdl_course_modules cm ON cmc.coursemoduleid = cm.id 
JOIN mdl_course c ON cm.course = c.id
JOIN mdl_modules m ON cm.module = m.id
# skip the predefined admin AND guest USER
WHERE u.id = $kid and c.id=$course and cmc.completionstate!=0 and cm.visible=1 $n
# config reports filters
# %%FILTER_USERS:u.username%%
# %%FILTER_SEARCHTEXT:m.name:~%%
# %%FILTER_STARTTIME:cmc.timemodified:>%% %%FILTER_ENDTIME:cmc.timemodified:<%%
 
ORDER BY u.username";
            
            return $this->mdlfo->query($q);
        }
        
        function getcoursekid($kid){
            $q="SELECT u.firstname, u.lastname, c.id, ctg.name as categoryname, c.fullname
FROM mdl_course AS c
JOIN mdl_course_categories AS ctg ON c.category=ctg.id
JOIN mdl_context AS ctx ON c.id = ctx.instanceid
JOIN mdl_role_assignments AS ra ON ra.contextid = ctx.id
JOIN mdl_user AS u ON u.id = ra.userid
WHERE u.id = '".$kid."' AND c.visible=1
ORDER BY fullname ASC";
           return $this->mdlfo->query($q);
        }
        function getbadge($kid,$limit=null){
            $l="";
            if($limit!=null)$l=" LIMIT 10";
            $q="SELECT  b.id,u.username, b.name AS badgename, d.uniquehash,
CASE
WHEN b.courseid IS NOT NULL THEN
(SELECT c.shortname
    FROM mdl_course AS c
    WHERE c.id = b.courseid)
WHEN b.courseid IS NULL THEN \"*\"
END AS Context,
CASE 
  WHEN t.criteriatype = 1 AND t.method = 1 THEN \"Activity Completion (All)\"
  WHEN t.criteriatype = 1 AND t.method = 2 THEN \"Activity Completion (Any)\"
  WHEN t.criteriatype = 2 AND t.method = 2 THEN \"Manual Award\"
  WHEN t.criteriatype = 4 AND t.method = 1 THEN \"Course Completion (All)\"
  WHEN t.criteriatype = 4 AND t.method = 2 THEN \"Course Completion (Any)\"
  ELSE CONCAT ('Other: ', t.criteriatype)
END AS Criteriatype,
DATE_FORMAT( FROM_UNIXTIME( d.dateissued ) , '%Y-%m-%d' ) AS dateissued,
DATE_FORMAT( FROM_UNIXTIME( d.dateexpire ), '%Y-%m-%d' ) AS dateexpires,
CONCAT ('<a target=\"_new\" href=\"%%WWWROOT%%/badges/badge.php?hash=',d.uniquehash,'\">link</a>') AS Details
FROM mdl_badge_issued AS d 
JOIN mdl_badge AS b ON d.badgeid = b.id
JOIN mdl_user AS u ON d.userid = u.id
JOIN mdl_badge_criteria AS t ON b.id = t.badgeid 
WHERE t.criteriatype <> 0 AND u.id=$kid
ORDER BY d.dateissued DESC $l";
           return $this->mdlfo->query($q);
        }
        function getbadgeimg($badge){
            $q="select contextid from mdl_files where itemid=$badge and filearea='badgeimage'";
            $hasil= $this->mdlfo->query($q)->row_array();
            return "https://elearning.darulabidin.com/pluginfile.php/".$hasil['contextid']."/badges/badgeimage/$badge/f1";
        }
}