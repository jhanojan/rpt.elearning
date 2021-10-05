<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_nilai extends CI_Model{
    
    
        function tk($allDataInSheet){
            
                unset($allDataInSheet[1]);
                unset($allDataInSheet[2]);
                unset($allDataInSheet[3]);
            foreach($allDataInSheet as $export){
                    
                    
                    if(!empty($export['B'])){
                    $create=array(
'sisda'=>$export['B'],
'nama'=>$export['C'],
'kehadiran'=>$export['D'],
'lhs'=>$export['E'],
'tematik_ba_angka'=>$export['F'],
'tematik_ba_huruf'=>$export['G'],
'tematik_tugas_angka'=>$export['H'],
'tematik_tugas_huruf'=>$export['I'],
'tematik_stppa'=>$export['J'],
'tematik_virtual'=>$export['K'],
'keislaman_ba_angka'=>$export['L'],
'keislaman_ba_huruf'=>$export['M'],
'keislaman_tugas_angka'=>$export['N'],
'keislaman_tugas_huruf'=>$export['O'],
'keislaman_stppa'=>$export['P'],
'keislaman_virtual'=>$export['Q'],
'pkh_ba_angka'=>$export['R'],
'pkh_ba_huruf'=>$export['S'],
'pkh_tugas_angka'=>$export['T'],
'pkh_tugas_huruf'=>$export['U'],
'pkh_stppa'=>$export['V'],
'pkh_virtual'=>$export['W'],
'total_virtual'=>$export['X'],
                        'modify_on'=>date("Y-m-d H:i:s"),
                        'periode'=>$this->input->post('periode')
                    );
                    $this->db->insert("sv_nilai_tk",$create);
                    }
                }
        }
	
	function sd($allDataInSheet){
            
                unset($allDataInSheet[1]);
                unset($allDataInSheet[2]);
            foreach($allDataInSheet as $export){
                    
                    
                    if(!empty($export['B'])){
                    $create=array(
                        'sisda'=>$export['B'],
                        'nama'=>$export['C'],
                        'kehadiran'=>$export['D'],
                        'lhs'=>$export['E'],
                        'tematik_ba'=>$export['F'],
                        'tematik_tugas'=>$export['G'],
                        'tematik_formatif'=>$export['H'],
                        'tematik_virtual'=>$export['I'],
                        'pai_ba'=>$export['J'],
                        'pai_tugas'=>$export['K'],
                        'pai_formatif'=>$export['L'],
                        'pai_virtual'=>$export['M'],
                        'pjok_ba'=>$export['N'],
                        'pjok_formatif'=>$export['O'],
                        'pjok_virtual'=>$export['P'],
                        'quran_ba'=>$export['Q'],
                        'quran_tugas'=>$export['R'],
                        'quran_formatif'=>$export['S'],
                        'quran_virtual'=>$export['T'],
                        'tik_ba'=>$export['U'],
                        'tik_formatif'=>$export['V'],
                        'tik_virtual'=>$export['W'],
                        'english_ba'=>$export['X'],
                        'english_tugas'=>$export['Y'],
                        'english_formatif'=>$export['Z'],
                        'english_virtual'=>$export['AA'],
                        'modify_on'=>date("Y-m-d H:i:s"),
                        'periode'=>$this->input->post('periode')
                    );
                    $this->db->insert("sv_nilai_sd",$create);
                    }
                }
        }
        function smp($allDataInSheet){
            
                    
                    
                unset($allDataInSheet[1]);
                unset($allDataInSheet[2]);
                unset($allDataInSheet[3]);
                unset($allDataInSheet[4]);
            foreach($allDataInSheet as $export){
                    
                    if(!empty($export['B'])){
                    $create=array(
                       'sisda'=>$export['B'],
'nama'=>$export['C'],
'kelas'=>$export['D'],
'pai_presensi'=>$export['E'],
'pai_ba'=>$export['F'],
'pai_pengetahuan'=>$export['G'],
'pai_keterampilan'=>$export['H'],
'pkn_presensi'=>$export['I'],
'pkn_ba'=>$export['J'],
'pkn_pengetahuan'=>$export['K'],
'pkn_keterampilan'=>$export['L'],
'bi_presensi'=>$export['M'],
'bi_ba'=>$export['N'],
'bi_pengetahuan'=>$export['O'],
'bi_keterampilan'=>$export['P'],
'mtk_presensi'=>$export['Q'],
'mtk_ba'=>$export['R'],
'mtk_pengetahuan'=>$export['S'],
'mtk_keterampilan'=>$export['T'],
'ipa_presensi'=>$export['U'],
'ipa_ba'=>$export['V'],
'ipa_pengetahuan'=>$export['W'],
'ipa_keterampilan'=>$export['X'],
'ips_presensi'=>$export['Y'],
'ips_ba'=>$export['Z'],
'ips_pengetahuan'=>$export['AA'],
'ips_keterampilan'=>$export['AB'],
'en_presensi'=>$export['AC'],
'en_ba'=>$export['AD'],
'en_pengetahuan'=>$export['AE'],
'en_keterampilan'=>$export['AF'],
'pjok_presensi'=>$export['AG'],
'pjok_ba'=>$export['AH'],
'pjok_pengetahuan'=>$export['AI'],
'pjok_keterampilan'=>$export['AJ'],
'sb_presensi'=>$export['AK'],
'sb_ba'=>$export['AL'],
'sb_pengetahuan'=>$export['AM'],
'sb_keterampilan'=>$export['AN'],
'tik_presensi'=>$export['AO'],
'tik_ba'=>$export['AP'],
'tik_pengetahuan'=>$export['AQ'],
'tik_keterampilan'=>$export['AR'],
'bbq_presensi'=>$export['AS'],
'bbq_jilid'=>$export['AT'],
'bbq_nilai'=>$export['AU'],
 
                        'modify_on'=>date("Y-m-d H:i:s"),
                        'periode'=>$this->input->post('periode')
                    );
                    $this->db->insert("sv_nilai_smp",$create);
                    
                }
                }
        }
}