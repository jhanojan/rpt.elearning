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
                        'modify_on'=>date("Y-m-d H:i:s"),
                        'periode'=>$this->input->post('periode')
                    );
                    $this->db->insert("sv_nilai_sd",$create);
                    }
                }
        }
        function smp($allDataInSheet){
            
            foreach($allDataInSheet as $export){
                    
                    
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
'pai_ba'=>$export['F'],
'pai_tugas'=>$export['G'],
'pai_forum'=>$export['H'],
'pai_formatif'=>$export['I'],
'pai_chat'=>$export['J'],
'pai_virtual'=>$export['K'],
'pkn_ba'=>$export['L'],
'pkn_tugas'=>$export['M'],
'pkn_forum'=>$export['N'],
'pkn_formatif'=>$export['O'],
'pkn_chat'=>$export['P'],
'pkn_virtual'=>$export['Q'],
'bi_ba'=>$export['R'],
'bi_tugas'=>$export['S'],
'bi_forum'=>$export['T'],
'bi_formatif'=>$export['U'],
'bi_chat'=>$export['V'],
'bi_virtual'=>$export['W'],
'mtk_ba'=>$export['X'],
'mtk_tugas'=>$export['Y'],
'mtk_forum'=>$export['Z'],
'mtk_formatif'=>$export['AA'],
'mtk_chat'=>$export['AB'],
'mtk_virtual'=>$export['AC'],
'ipa_ba'=>$export['AD'],
'ipa_tugas'=>$export['AE'],
'ipa_forum'=>$export['AF'],
'ipa_formatif'=>$export['AG'],
'ipa_chat'=>$export['AH'],
'ipa_virtual'=>$export['AI'],
'ips_ba'=>$export['AJ'],
'ips_tugas'=>$export['AK'],
'ips_forum'=>$export['AL'],
'ips_formatif'=>$export['AM'],
'ips_chat'=>$export['AN'],
'ips_virtual'=>$export['AO'],
'en_ba'=>$export['AP'],
'en_tugas'=>$export['AQ'],
'en_forum'=>$export['AR'],
'en_formatif'=>$export['AS'],
'en_chat'=>$export['AT'],
'en_virtual'=>$export['AU'],
'sbdp_ba'=>$export['AV'],
'sbdp_tugas'=>$export['AW'],
'sbdp_forum'=>$export['AX'],
'sbdp_formatif'=>$export['AY'],
'sbdp_cha'=>$export['AZ'],
'sbdp_virtual'=>$export['BA'],
'pjok_ba'=>$export['BB'],
'pjok_tugas'=>$export['BC'],
'pjok_forum'=>$export['BD'],
'pjok_formatif'=>$export['BE'],
'pjok_chat'=>$export['BF'],
'pjok_virtual'=>$export['BG'],
'quran_ba'=>$export['BH'],
'quran_tugas'=>$export['BI'],
'quran_forum'=>$export['BJ'],
'quran_formatif'=>$export['BK'],
'quran_chat'=>$export['BL'],
'quran_virtual'=>$export['BM'],
'tik_ba'=>$export['BN'],
'tik_tugas'=>$export['BO'],
'tik_forum'=>$export['BP'],
'tik_formatif'=>$export['BQ'],
'tik_chat'=>$export['BR'],
'tik_virtual'=>$export['BS'],
'cibici_ba'=>$export['BT'],
'cibici_tugas'=>$export['BU'],
'cibici_forum'=>$export['BV'],
'cibici_formatif'=>$export['BW'],
'cibici_chat'=>$export['BX'],
'cibici_virtual'=>$export['BY'],
 
                        'modify_on'=>date("Y-m-d H:i:s"),
                        'periode'=>$this->input->post('periode')
                    );
                    $this->db->insert("sv_nilai_smp",$create);
                    }
                }
                }
        }
}