<?php
/**
 * Name:    Master Model
 * Author:  Ben Edmunds
 *           ben.edmunds@gmail.com
 * @benedmunds
 *
 * Added Awesomeness: Phil Sturgeon
 *
 * Created:  10.01.2009
 *
 * Description:  Modified auth system based on redux_auth with extensive customization. This is basically what Redux Auth 2 should be.
 * Original Author name has been kept but that does not mean that the method has not been modified.
 *
 * Requirements: PHP5 or above
 *
 * @package    CodeIgniter-Ion-Auth
 * @author     Ben Edmunds
 * @link       http://github.com/benedmunds/CodeIgniter-Ion-Auth
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Ion Auth Model
 * @property Bcrypt $bcrypt The Bcrypt library
 * @property Ion_auth $ion_auth The Ion_auth library
 */
class Master_model extends CI_Model
{
	
	/**
	 * Database object
	 *
	 * @var object
	 */
	public function __construct()
	{
		$this->load->helper('cookie');
		$this->load->helper('date');
		$this->load->database();
		// initialize the database
	}

	/**
	 * Hashes the password to be stored in the database.
	 *
	 * @param string $password
	 * @param bool   $salt
	 * @param bool   $use_sha1_override
	 *
	 * @return false|string
	 * @author Mathew
	 */

	function get_list_group($table, $group= 'tbl_opd_patient.Department')
	{
		
		$this->db->select("tbl_opd_patient.Department, 
		count(tbl_opd_patient.Department) as gcount, 
		SUM(CASE WHEN tbl_opd_patient.Sex = 'M' THEN 1 ELSE 0 END) as mcount, 
		SUM(CASE WHEN tbl_opd_patient.Sex = 'M' AND tbl_opd_patient.OldCRNO > 0 THEN 1 ELSE 0 END) as oldmcount, 
		SUM(CASE WHEN tbl_opd_patient.Sex = 'F' THEN 1 ELSE 0 END) as fcount,
		SUM(CASE WHEN tbl_opd_patient.Sex = 'F' AND tbl_opd_patient.OldCRNO > 0 THEN 1 ELSE 0 END) as oldfcount, 
		");

		$startDate = ($this->input->post('startDate')) ? $this->input->post('startDate'): date('m/d/Y');
		$endDate = ($this->input->post('endDate')) ? $this->input->post('endDate'): date('m/d/Y');
		if($table === 'tbl_opd_patient')
		{
			if($startDate && $endDate){
				$this->db->where("DATE_FORMAT(tbl_opd_patient.opddate,'%Y-%m-%d') >=", date("Y-m-d", strtotime($startDate)));
				$this->db->where("DATE_FORMAT(tbl_opd_patient.opddate,'%Y-%m-%d') <=", date("Y-m-d", strtotime($endDate)));
			}				
		}
	
		$this->db->from($table);
		if($table === 'tbl_ipd_patient')
		{
			$this->db->join('tbl_opd_patient', 'tbl_ipd_patient.crno = tbl_opd_patient.CRNO AND tbl_ipd_patient.Series = tbl_opd_patient.Series', 'left');
			//$this->db->join('tbl_bedmaster', 'tbl_ipd_patient.bedid = tbl_bedmaster.ID', 'left');
			$this->db->where("DATE_FORMAT(tbl_ipd_patient.doa,'%Y-%m-%d') >=", date("Y-m-d", strtotime($startDate)));
				$this->db->where("DATE_FORMAT(tbl_ipd_patient.doa,'%Y-%m-%d') <=", date("Y-m-d", strtotime($endDate)));
		
		}
		if($table === 'tbl_discharge_patient')
		{
			$this->db->join('tbl_opd_patient', 'tbl_discharge_patient.crno = tbl_opd_patient.CRNO AND tbl_discharge_patient.Series = tbl_discharge_patient.Series', 'left');
			//$this->db->join('tbl_bedmaster', 'tbl_ipd_patient.bedid = tbl_bedmaster.ID', 'left');
			$this->db->where("DATE_FORMAT(tbl_discharge_patient.dod,'%Y-%m-%d') >=", date("Y-m-d", strtotime($startDate)));
				$this->db->where("DATE_FORMAT(tbl_discharge_patient.dod,'%Y-%m-%d') <=", date("Y-m-d", strtotime($endDate)));
		
		}
////////	
		
if($this->input->post('Department')){
	$this->db->where("tbl_opd_patient.Department", $this->input->post('Department'));
}
if($group){
	$this->db->group_by($group);
}

	// $this->db->get()->result(); 
	//		echo  $this->db->last_query();
//exit;

return $this->db->get()->result(); 

}


	 function get_list($table, $type = FALSE, $startDate, $endDate, $limit, $page=0)
				{
					if($this->input->post('startDate') && $this->input->post('endDate')){
						$startDate = $this->input->post('startDate');
						$endDate = $this->input->post('endDate');
						}else{
						$startDate	= date('m/d/y');
						$endDate	= date('m/d/y');
						}


			if($table === 'tbl_ipd_patient')
			{
			$this->db->select("tbl_opd_patient.*, tbl_ipd_patient.*, tbl_bedmaster.Description as bedname");
			$this->db->from($table);
			$this->db->join('tbl_opd_patient', 'tbl_ipd_patient.crno = tbl_opd_patient.CRNO AND tbl_ipd_patient.Series = tbl_opd_patient.Series', 'left');
			$this->db->join('tbl_bedmaster', 'tbl_ipd_patient.bedid = tbl_bedmaster.ID', 'left');

			if($this->input->post('startDate') && $this->input->post('endDate')){
				$this->db->where("DATE_FORMAT(tbl_ipd_patient.doa,'%Y-%m-%d') >=", date("Y-m-d", strtotime($this->input->post('startDate'))));
				$this->db->where("DATE_FORMAT(tbl_ipd_patient.doa,'%Y-%m-%d') <=", date("Y-m-d", strtotime($this->input->post('endDate'))));
			}else{
				$this->db->where("DATE_FORMAT(tbl_ipd_patient.doa,'%Y-%m-%d') >=", date("Y-m-d", strtotime($startDate)));
				$this->db->where("DATE_FORMAT(tbl_ipd_patient.doa,'%Y-%m-%d') <=", date("Y-m-d", strtotime($endDate)));
			}
		}elseif($table === 'tbl_discharge_patient')
		{
		$this->db->select("tbl_opd_patient.*, tbl_discharge_patient.*, tbl_ipd_patient.bedid,tbl_bedmaster.Description as bedname");
		$this->db->from($table);
		$this->db->join('tbl_opd_patient', 'tbl_opd_patient.CRNO = tbl_discharge_patient.crno AND tbl_opd_patient.Series = tbl_discharge_patient.Series', 'left');
		$this->db->join('tbl_ipd_patient', 'tbl_ipd_patient.crno = tbl_discharge_patient.crno', 'left');
		$this->db->join('tbl_bedmaster', 'tbl_ipd_patient.bedid = tbl_bedmaster.ID', 'inner');
		if($this->input->post('startDate') && $this->input->post('endDate')){
			$startDate = $this->input->post('startDate');
			$endDate = $this->input->post('endDate');
			}else{
			$startDate	= date('m/d/y');
			$endDate	= date('m/d/y');
			}
			$this->db->where("DATE_FORMAT(tbl_discharge_patient.dod,'%Y-%m-%d') >=", date("Y-m-d", strtotime($startDate)));
			$this->db->where("DATE_FORMAT(tbl_discharge_patient.dod,'%Y-%m-%d') <=", date("Y-m-d", strtotime($endDate)));
			
			
	}elseif($table === 'tbl_diet')
	{
	$this->db->select("tbl_opd_patient.*, tbl_diet.*");
	$this->db->from($table);
	$this->db->join('tbl_opd_patient', 'tbl_opd_patient.CRNO = tbl_diet.CRNO AND tbl_opd_patient.Series = tbl_diet.Series', 'left');
	if($this->input->post('startDate') && $this->input->post('endDate')){
		$startDate = $this->input->post('startDate');
		$endDate = $this->input->post('endDate');
		}else{
		$startDate	= date('m/d/y');
		$endDate	= date('m/d/y');
		}
		$this->db->where("DATE_FORMAT(tbl_diet.sdate,'%Y-%m-%d') >=", date("Y-m-d", strtotime($startDate)));
		$this->db->where("DATE_FORMAT(tbl_diet.sdate,'%Y-%m-%d') <=", date("Y-m-d", strtotime($endDate)));
		
		
}elseif($table === 'tbl_surgery')
{
$this->db->select("tbl_opd_patient.*, tbl_surgery.*");
$this->db->from($table);
$this->db->join('tbl_opd_patient', 'tbl_opd_patient.CRNO = tbl_surgery.CRNO AND tbl_opd_patient.Series = tbl_surgery.Series', 'left');
if($this->input->post('startDate') && $this->input->post('endDate')){
	$startDate = $this->input->post('startDate');
	$endDate = $this->input->post('endDate');
	}else{
	$startDate	= date('m/d/y');
	$endDate	= date('m/d/y');
	}
	$this->db->where("DATE_FORMAT(tbl_surgery.sdate,'%Y-%m-%d') >=", date("Y-m-d", strtotime($startDate)));
	$this->db->where("DATE_FORMAT(tbl_surgery.sdate,'%Y-%m-%d') <=", date("Y-m-d", strtotime($endDate)));
	
	
}elseif($table === 'tbl_karama'){
	$this->db->select("tbl_karama.*, tbl_karama_parent.name as parent");
	$this->db->from($table);
	$this->db->join('tbl_karama as tbl_karama_parent', 'tbl_karama.parent_id = tbl_karama_parent.id', 'left');
}elseif($table === 'tbl_therapy'){
	$this->db->select("tbl_therapy.*, tbl_therapy_parent.name as parent");
	$this->db->from($table);
	$this->db->join('tbl_therapy as tbl_therapy_parent', 'tbl_therapy.parent_id = tbl_therapy_parent.id', 'left');
}elseif($table === 'tbl_gynec'){
			
			$this->db->select("tbl_gynec.*, tbl_opd_patient.Age, GROUP_CONCAT(DISTINCT CONCAT(tbl_gynec_procedure.procedure_title,' - ',tbl_gynec_procedure.procedure_value) 
			ORDER BY tbl_gynec_procedure.procedure_id desc
			SEPARATOR ' <br> ') as LocalProcedure");
			$this->db->from($table);
			$this->db->join('tbl_opd_patient', 'tbl_gynec.Crno = tbl_opd_patient.CRNO AND tbl_gynec.series = tbl_opd_patient.Series', 'inner');
			$this->db->join('tbl_gynec_procedure', 'tbl_gynec.ID = tbl_gynec_procedure.gynec_id', 'left');
			
			$this->db->where("DATE_FORMAT(tbl_gynec.gdate,'%Y-%m-%d') >=", date("Y-m-d", strtotime($startDate)));
			$this->db->where("DATE_FORMAT(tbl_gynec.gdate,'%Y-%m-%d') <=", date("Y-m-d", strtotime($endDate)));

		}elseif($table === 'tbl_panchkarma'){
			$this->db->select("tbl_panchkarma.*,  GROUP_CONCAT(DISTINCT CONCAT(tbl_pankarama_karama.karama_title,' - ',tbl_pankarama_karama.karama_value) 
			ORDER BY tbl_pankarama_karama.panchkarama_id desc
			SEPARATOR ' <br> ') as karamas_data");
			$this->db->from($table);
			$this->db->join('tbl_opd_patient', 'tbl_panchkarma.Crno = tbl_opd_patient.CRNO AND tbl_panchkarma.series = tbl_opd_patient.Series', 'inner');
			$this->db->join('tbl_pankarama_karama', 'tbl_pankarama_karama.panchkarama_id = tbl_panchkarma.ID', 'left');

			$this->db->where("DATE_FORMAT(tbl_panchkarma.pdate,'%Y-%m-%d') >=", date("Y-m-d", strtotime($startDate)));
			$this->db->where("DATE_FORMAT(tbl_panchkarma.pdate,'%Y-%m-%d') <=", date("Y-m-d", strtotime($endDate)));
		}elseif($table === 'tbl_physio'){
			$this->db->select("tbl_physio.*,  GROUP_CONCAT(DISTINCT CONCAT(tbl_physio_therapy.therapy_title,' - ',tbl_physio_therapy.therapy_value) 
			ORDER BY tbl_physio_therapy.physio_id desc
			SEPARATOR ' <br> ') as therapy_data");
			$this->db->from($table);
			$this->db->join('tbl_opd_patient', 'tbl_physio.Crno = tbl_opd_patient.CRNO AND tbl_physio.series = tbl_opd_patient.Series', 'inner');
			$this->db->join('tbl_physio_therapy', 'tbl_physio_therapy.physio_id = tbl_physio.ID', 'left');

			$this->db->where("DATE_FORMAT(tbl_physio.pdate,'%Y-%m-%d') >=", date("Y-m-d", strtotime($startDate)));
			$this->db->where("DATE_FORMAT(tbl_physio.pdate,'%Y-%m-%d') <=", date("Y-m-d", strtotime($endDate)));
		}else{
			//echo $table; exit;
			$this->db->select("*");
			$this->db->from($table);
			//// add where condition for "tbl_opd_patient"
			$startDate = ($this->input->post('startDate')) ? $this->input->post('startDate'): date('m/d/Y');
			$endDate = ($this->input->post('endDate')) ? $this->input->post('endDate'): date('m/d/Y');
			if($table === 'tbl_opd_patient' || $table === 'tbl_ipd_patient')
			{
				if($startDate && $endDate){
					$this->db->where("DATE_FORMAT(tbl_opd_patient.opddate,'%Y-%m-%d') >=", date("Y-m-d", strtotime($startDate)));
					$this->db->where("DATE_FORMAT(tbl_opd_patient.opddate,'%Y-%m-%d') <=", date("Y-m-d", strtotime($endDate)));
				}				
			}	
		}		
		if($this->input->post('Department')){
			$this->db->where("tbl_opd_patient.Department", $this->input->post('Department'));
		}
		if($table === 'tbl_gynec'){
			$this->db->group_by('tbl_gynec.ID');
		}
		if($table === 'tbl_panchkarma'){
			$this->db->group_by('tbl_panchkarma.ID');
		}
		if($table === 'tbl_physio'){
			$this->db->group_by('tbl_physio.ID');
		}
		$this->db->order_by($table.'.ID', 'desc');	
	 if($type){
            return $this->db->get()->num_rows();
        }else{
			 $this->db->limit($limit, $page);
			 
			//print_r($this->db->get()->result()); 
		//	echo  $this->db->last_query();
		//	 exit;
            return $this->db->get()->result(); 
        }
	}
function get_list_data($table, $column, $value){
			$this->db->select("*");
			$this->db->from($table);
			$this->db->where(array($column => $value));
			return $this->db->get()->result(); 
}

	function get_bedids($department = null){
		$this->db->select('*');
		$this->db->from('tbl_bedmaster');
		if($department):
			$this->db->where(array('Department' => $department));
		endif;	
		$this->db->where(array('Available' => 0));
		foreach($this->db->get()->result() as $item):
			$beds[$item->ID] = $item->Description; 
	endforeach;	
	return $beds;
	}
	function next_cr_no(){
		$this->db->select_max('CRNO');
		$result = $this->db->get('tbl_opd_patient')->row();  
		return $result->CRNO + 1;
	}

	function save_data(){
		$table = $this->input->post('tbl');
		
		$update = $this->input->post();
		//print_r($update); exit;
		if($table == 'tbl_gynec'){
			$procudreData = $update['name'];
			unset($update['name']);
		}
		if($table == 'tbl_panchkarma'){
			$karamaData = $update['name'];
			unset($update['name']);
		}
		if($table == 'tbl_physio'){
			$therapyData = $update['name'];
			unset($update['name']);
		}
		if($update['tbl'] === 'tbl_bedmaster')
		{
			$update['Description'] = $update['Department'].','.$update['Ward'] .','.$update['bedCode'];
		}

		unset($update['ID']);		
		unset($update['tbl']);
		//print_r($update); exit;
		if($update['opddate']){
			$update['opddate'] = date('Y-m-d h:i:s', strtotime($update['opddate']));
		}
		if($update['doa']){
			$update['doa'] 		= date('Y-m-d h:i:s', strtotime($update['doa']));
			
		}
		//////////////////////for anc//////////////////
		if($update['ddate']){
			$update['ddate'] 		= date('Y-m-d h:i:s', strtotime($update['ddate']));
		}

		if($update['lmp']){
			$update['lmp'] 		= date('Y-m-d h:i:s', strtotime($update['lmp']));
		}
		if($update['edd']){
			$update['edd'] 		= date('Y-m-d h:i:s', strtotime($update['edd']));
		}
		//////////////////////for certificates//////////////////
		if($update['dod']){
			$update['dod'] 		= date('Y-m-d h:i:s', strtotime($update['dod']));
			$update['nod']		= dateDiff($update['doa'], $update['dod']);
		}
		if($update['birthdate']){
			$update['birthdate'] 		= date('Y-m-d h:i:s', strtotime($update['birthdate']));
		}
		if($update['deathdate']){
			$update['deathdate'] 		= date('Y-m-d h:i:s', strtotime($update['deathdate']));
		}
		if($update['Doj']){
			$update['Doj'] 		= date('Y-m-d h:i:s', strtotime($update['Doj']));
		}
		if($update['validupto']){
			$update['validupto'] 		= date('Y-m-d h:i:s', strtotime($update['validupto']));
		}
		// for diet table
		if($update['sdate']){
			$update['sdate'] 		= date('Y-m-d h:i:s', strtotime($update['sdate']));
		}
		if($update['height'] && $update['weight']){
			$update['BMI'] 		= round(((float)$update['weight']  / (float)((float)$update['height'] * (float)$update['height'])), 2);
		}
		/// for surgery table
		if($table == 'tbl_surgery'){
		if(!$update['patient_verified']){ $update['patient_verified'] = 0; }
		if(!$update['site_surgery_verified']){ $update['site_surgery_verified'] = 0; }
		if(!$update['side_surgery_verified']){ $update['side_surgery_verified'] = 0; }
		if(!$update['surgery_major_minor']){ $update['surgery_major_minor'] = 0; }
		if(!$update['preoperative_medication']){ $update['preoperative_medication'] = 0; }
		}
		
//print_r($update); exit;
				$id = $this->input->post('ID');
	
                if($id){
                $this->db->where('ID', $id);
				$this->db->update($table, $update);   

                }else{					
			if($table == 'tbl_ipd_patient'){
				$updateopd['isAdmit'] 	= 1;
				$update['isadmit'] 	= 1;
				$this->db->where('CRNO', $update['crno']);
				$this->db->where('Series', $update['Series']);
				$this->db->update('tbl_opd_patient', $updateopd); 
				$updatebed['Available'] 	= 1;
				$this->db->where('ID', $update['bedid']);
				$this->db->update('tbl_bedmaster', $updatebed); 
			}
			if($table == 'tbl_discharge_patient'){
				$updateipd['isadmit'] 	= 0;
				$this->db->where('crno', $update['crno']);
				$this->db->where('Series', $update['Series']);
				$this->db->update('tbl_ipd_patient', $updateipd); 

				$updateopd['isAdmit'] 	= 0;
				$this->db->where('CRNO', $update['crno']);
				$this->db->where('Series', $update['Series']);
				$this->db->update('tbl_opd_patient', $updateopd); 

				$updatebed['Available'] 	= 0;
				$this->db->where('ID', $update['bedid']);
				$this->db->update('tbl_bedmaster', $updatebed); 
				unset($update['bedid']);
			}

				$this->db->insert($table, $update); 
				$id = $this->db->insert_id();
				//print_r($update); exit;
			}

				if($table == 'tbl_gynec' && $procudreData){
					$this->db->where('gynec_id', $id);
					$this->db->delete('tbl_gynec_procedure');
					$indertData = [];
					foreach($procudreData as $key => $item){
						$insertData['gynec_id'] 		= $id;
						$insertData['procedure_title'] 	= $this->db->select('name')->from('tbl_procedure')->where('ID', $key)->get()->row()->name;
						$insertData['procedure_id'] 	= $key;
						$insertData['procedure_value'] 	= $item;
						$allinsertData[] 				= $insertData;
					}
					$this->db->insert_batch('tbl_gynec_procedure', $allinsertData); 	
				}		
				if($table == 'tbl_panchkarma' && $karamaData){
					$this->db->where('panchkarama_id', $id);
					$this->db->delete('tbl_pankarama_karama');
					$indertData = [];
					foreach($karamaData as $key => $item){
						$insertData['panchkarama_id'] 	= $id;
						$insertData['karama_title'] 	= $this->db->select('name')->from('tbl_karama')->where('ID', $key)->get()->row()->name;
						$insertData['karama_id'] 		= $key;
						$insertData['karama_value'] 	= $item;
						$allinsertData[] 				= $insertData;
					}
					$this->db->insert_batch('tbl_pankarama_karama', $allinsertData); 	
				}



				if($table == 'tbl_physio' && $therapyData){
					$this->db->where('physio_id', $id);
					$this->db->delete('tbl_physio_therapy');
					$indertData = [];
					foreach($therapyData as $key => $item){
						$insertData['physio_id'] 	= $id;
						$insertData['therapy_title'] 	= $this->db->select('name')->from('tbl_therapy')->where('ID', $key)->get()->row()->name;
						$insertData['therapy_id'] 		= $key;
						$insertData['therapy_value'] 	= $item;
						$allinsertData[] 				= $insertData;
					}
				
					$this->db->insert_batch('tbl_physio_therapy', $allinsertData); 	
				}
return true;
	}

	function get_list_occupancy(){
			$this->db->select("tbl_opd_patient.*, tbl_ipd_patient.*, tbl_bedmaster.Description as bedname");
			$this->db->from('tbl_ipd_patient');
			$this->db->join('tbl_opd_patient', 'tbl_ipd_patient.crno = tbl_opd_patient.CRNO AND tbl_ipd_patient.Series = tbl_opd_patient.Series', 'left');
			$this->db->join('tbl_bedmaster', 'tbl_ipd_patient.bedid = tbl_bedmaster.ID', 'left');
			$this->db->where("tbl_opd_patient.isadmit", 1);
			return $this->db->get()->result(); 
			
	}	
	function get_list_department()
	{
			$this->db->select("Department");
			$this->db->from('tbl_departmentmaster');
			$this->db->order_by('ID', 'desc');
			$data = $this->db->get()->result(); 
			foreach($data as $item):
					$datareturn[$item->Department] = $item->Department; 
			endforeach;	
			//print_r($datareturn); exit;
			return $datareturn;
	}
function get_list_ward()
	{
			$this->db->select("Ward");
			$this->db->from('tbl_wardmaster');
			$this->db->order_by('ID', 'desc');
			$data = $this->db->get()->result(); 
			foreach($data as $item):
					$datareturn[$item->Ward] = $item->Ward; 
			endforeach;	
			//print_r($datareturn); exit;
			return $datareturn;
	}
	function get_data_list_by_column($table, $column, $value, $opt)
	{
			$this->db->select("*");
			$this->db->from($table);
			$this->db->order_by('ID', 'desc');
			$this->db->where(array($table.'.'.$column => $value));
			$data = $this->db->get()->result(); 
		echo $table; exit;
				//foreach($data as $item):
				////$datareturn[$item->ID] = $item->therapy_title; 
			//	endforeach;	


		//print_r($data); exit;
		return $data;
	}
	function get_list_doctor(){
		$this->db->select("DNAME");
			$this->db->from('tbl_mst_doctor');
			$this->db->order_by('ID', 'desc');
			$data = $this->db->get()->result(); 
			foreach($data as $item):
					$datareturn[$item->DNAME] = $item->DNAME; 
			endforeach;	
			//print_r($datareturn); exit;
			return $datareturn;
	}
	function get_data_by_column($table, $column, $value, $opt){
		if($table == 'tbl_ipd_patient'){
			$this->db->select('tbl_opd_patient.*, tbl_opd_patient.ID as OPDID, tbl_ipd_patient.*, DATE_FORMAT(doa, "%m/%d/%Y") AS doa, tbl_bedmaster.Description');
			$this->db->join('tbl_bedmaster', 'tbl_ipd_patient.bedid = tbl_bedmaster.ID', 'left');
		}elseif($table == 'tbl_opd_patient'){
			$this->db->select('tbl_ipd_patient.*, tbl_opd_patient.*, DATE_FORMAT(tbl_ipd_patient.doa, "%m/%d/%Y") AS doa');
		}elseif($table == 'tbl_diet'){
			$this->db->select('tbl_diet.*, tbl_opd_patient.*, DATE_FORMAT(tbl_diet.sdate, "%m/%d/%Y") AS sdate');
		}elseif($table == 'tbl_surgery'){
			$this->db->select('tbl_surgery.*, tbl_opd_patient.*, DATE_FORMAT(tbl_surgery.sdate, "%m/%d/%Y") AS sdate');
		}else{
			$this->db->select($table.'.*');
			
		}

		$this->db->from($table);
		if($table == 'tbl_ipd_patient'){
			$this->db->join('tbl_opd_patient', 'tbl_ipd_patient.crno = tbl_opd_patient.CRNO AND tbl_ipd_patient.Series = tbl_opd_patient.Series', 'left');
			$this->db->where(array('tbl_ipd_patient.'.$column => $value));
			//$this->db->where(array('tbl_ipd_patient.isAdmit' => 0));
		}elseif($table == 'tbl_opd_patient'){
			$this->db->join('tbl_ipd_patient', 'tbl_ipd_patient.crno = tbl_opd_patient.CRNO AND tbl_ipd_patient.Series = tbl_opd_patient.Series', 'left');
			$this->db->where(array('tbl_opd_patient.'.$column => $value));
			//$this->db->where(array('tbl_opd_patient.isAdmit' => 1));
		}elseif($table == 'tbl_diet'){
			$this->db->join('tbl_opd_patient', 'tbl_diet.CRNO = tbl_opd_patient.CRNO AND tbl_diet.Series = tbl_opd_patient.Series', 'left');
			$this->db->where(array('tbl_diet.'.$column => $value));
		}elseif($table == 'tbl_surgery'){
			$this->db->join('tbl_opd_patient', 'tbl_surgery.CRNO = tbl_opd_patient.CRNO AND tbl_surgery.Series = tbl_opd_patient.Series', 'left');
			$this->db->where(array('tbl_surgery.'.$column => $value));
		}else{
			$this->db->where(array($column => $value));
		}
		
		if($opt == "true"){
			$this->db->where(array('tbl_opd_patient.Sex' => 'F'));
		}
		
		return $this->db->get()->row(); 	
	}
	function get_data($id, $table) { 
		if($table == 'tbl_ipd_patient'){ 
			$this->db->select("tbl_opd_patient.*,tbl_opd_patient.ID as OPDID, tbl_ipd_patient.*");
		}elseif($table == 'tbl_discharge_patient'){
			$this->db->select("tbl_opd_patient.*, tbl_discharge_patient.*, tbl_ipd_patient.bedid, tbl_ipd_patient.ipdno");
		}elseif($table == 'tbl_diet'){
			$this->db->select("tbl_opd_patient.*, tbl_diet.*");

		}elseif($table == 'tbl_surgery'){
			$this->db->select("tbl_opd_patient.*, tbl_surgery.*");

		}else{
			$this->db->select("*");
		}
			
			$this->db->from($table);
			if($table == 'tbl_ipd_patient'){
				$this->db->join('tbl_opd_patient', 'tbl_ipd_patient.crno = tbl_opd_patient.CRNO AND tbl_ipd_patient.Series = tbl_opd_patient.Series', 'left');
			}elseif($table == 'tbl_discharge_patient'){
				$this->db->join('tbl_opd_patient', 'tbl_opd_patient.CRNO = tbl_discharge_patient.crno', 'left');
				$this->db->join('tbl_ipd_patient', 'tbl_ipd_patient.crno = tbl_opd_patient.CRNO', 'left');
			}elseif($table == 'tbl_diet'){
				$this->db->join('tbl_opd_patient', 'tbl_opd_patient.CRNO = tbl_diet.crno', 'left');
				$this->db->join('tbl_ipd_patient', 'tbl_ipd_patient.crno = tbl_opd_patient.CRNO', 'left');

			}elseif($table == 'tbl_surgery'){
				$this->db->join('tbl_opd_patient', 'tbl_opd_patient.CRNO = tbl_surgery.crno', 'left');
			}
			$this->db->where(array($table.'.ID' => $id));

			//print_r( $this->db->get()->row()); exit;

			return $this->db->get()->row();
	}

	function get_all_patient_ipd($type){
		$this->db->select("count(tbl_ipd_patient.ID) AS total_count, sum(tbl_opd_patient.Sex = 'F') AS female_count,  SUM(tbl_opd_patient.Sex = 'M') AS male_count, tbl_ipd_patient.department");
		$this->db->join('tbl_opd_patient', 'tbl_ipd_patient.crno = tbl_opd_patient.CRNO AND tbl_ipd_patient.Series = tbl_opd_patient.Series', 'inner');
		$this->db->from('tbl_ipd_patient');
		$this->db->where(array('tbl_ipd_patient.isadmit' => 1));
		$this->db->group_by('tbl_ipd_patient.department');
		return $this->db->get()->result();
	}
	function get_all_patient_opd($type){
		$this->db->select("count(tbl_opd_patient.ID) AS total_count, sum(tbl_opd_patient.Sex = 'F') AS female_count,  SUM(tbl_opd_patient.Sex = 'M') AS male_count, tbl_opd_patient.Department");
		$this->db->from('tbl_opd_patient');
		$this->db->where('DATE(tbl_opd_patient.opddate) = CURDATE()');
		$this->db->group_by('Department');

		//$this->db->get()->result();
		//echo $this->db->last_query(); exit;


		return $this->db->get()->result();
	}

	function get_all_beds(){
		$this->db->select("count(tbl_bedmaster.ID) AS total_count, SUM(CASE WHEN Available = 1 THEN 1 ELSE 0 END) AS unvailable");
		$this->db->from('tbl_bedmaster');
		return $this->db->get()->row();
	}
	function delete_data($table, $id){
			$this->db->where(array('ID' => $id));
			$this->db->delete($table);
			return $id;
	}
	function get_year_code(){
			$this->db->select("*");
			$this->db->from('tbl_series');
			return $this->db->get()->row()->IPDCode;
	}

	function get_karama($type){

		$this->db->select("ID, name");
			$this->db->from('tbl_karama');
			if($type){
				$this->db->where('parent_id', 0);
			}
			$this->db->order_by('ID', 'desc');
			$data = $this->db->get()->result(); 
			foreach($data as $item):
					$datareturn[$item->ID] = $item->name; 
			endforeach;	
			//print_r($datareturn); exit;
			return $datareturn;
	}
	function get_stocktype(){

			$this->db->select("*");
			$this->db->from('tbl_stocktype');
			$this->db->order_by('ID', 'desc');
			$data = $this->db->get()->result(); 
			foreach($data as $item):
					$datareturn[$item->ID] = $item->ward; 
			endforeach;	
			return $datareturn;
	}
	function get_list_procedure(){

		$this->db->select("*");
		$this->db->from('tbl_procedure');
		$this->db->order_by('ID', 'desc');
		$data = $this->db->get()->result(); 
		foreach($data as $item):
				$datareturn[$item->ID] = $item->name; 
		endforeach;	
		return $datareturn;
}
function get_list_procedure_count(){

	$this->db->select("procedure_id, count(procedure_id) as procedure_count	");
	$this->db->from('tbl_gynec');

	$this->db->join('tbl_gynec_procedure', 'tbl_gynec_procedure.gynec_id = tbl_gynec.ID', 'inner');
	$this->db->where(array('procedure_value !=' => ''));
	$this->db->group_by('tbl_gynec_procedure.procedure_id');
	return $this->db->get()->result(); 
	
}


////////////////////////////////////////////////////
function get_list_karamas(){
	$this->db->select("*");
	$this->db->from('tbl_karama');
	$this->db->order_by('parent_id', 'asc');
	$data = $this->db->get()->result(); 
	
	foreach($data as $item):
			$datareturn[$item->ID] = $item->name; 
	endforeach;	
	return $datareturn;
}
function get_list_karamas_count(){
$this->db->select("karama_id, count(karama_id) as karama_count");
$this->db->from('tbl_panchkarma');
$this->db->join('tbl_pankarama_karama', 'tbl_pankarama_karama.panchkarama_id = tbl_panchkarma.ID', 'inner');
$this->db->where(array('tbl_pankarama_karama.karama_value !=' => ''));
$this->db->group_by('tbl_pankarama_karama.karama_id');
return $this->db->get()->result(); 

}

function get_list_therapy_count(){
	$this->db->select("therapy_id, count(therapy_id) as therapy_count");
	$this->db->from('tbl_physio');
	$this->db->join('tbl_physio_therapy', 'tbl_physio_therapy.physio_id = tbl_physio.ID', 'inner');
	$this->db->where(array('tbl_physio_therapy.therapy_value !=' => ''));
	$this->db->group_by('tbl_physio_therapy.therapy_id');


	//	$this->db->get()->result();
	//	echo $this->db->last_query(); exit;
	
	return $this->db->get()->result(); 
	
	}


///////////////////////////////////////////////////





function get_list_therapy(){
	$this->db->select("*");
	$this->db->from('tbl_therapy');
	$this->db->order_by('parent_id', 'asc');
	$data = $this->db->get()->result(); 
	
	foreach($data as $item):
			$datareturn[$item->ID] = $item->name; 
	endforeach;	
	return $datareturn;
}



function get_gynec_procedure($id){
	$this->db->select("*");
	$this->db->from('tbl_gynec_procedure');
	$this->db->where('gynec_id', $id);
	$this->db->order_by('ID', 'desc');
	$data = $this->db->get()->result(); 
	foreach($data as $item):
			$datareturn[$item->procedure_id] = $item->procedure_value; 
	endforeach;	
	return $datareturn;
}
function get_panchkarma_karama($id){
	$this->db->select("*");
	$this->db->from('tbl_pankarama_karama');
	$this->db->where('panchkarama_id', $id);
	$this->db->order_by('ID', 'desc');
	$data = $this->db->get()->result(); 
	foreach($data as $item):
			$datareturn[$item->karama_id	] = $item->karama_value; 
	endforeach;	
	return $datareturn;
}

function get_physio_therapy($id){
	$this->db->select("*");
	$this->db->from('tbl_physio_therapy');
	$this->db->where('physio_id', $id);
	$this->db->order_by('ID', 'desc');
	$data = $this->db->get()->result(); 
	foreach($data as $item):
			$datareturn[$item->therapy_id] = $item->therapy_value; 
	endforeach;	
	return $datareturn;
}
	function get_current_iptno(){
			$code =  $this->get_year_code();
			$this->db->select("MAX(tbl_ipd_patient.ipdno) as cipdno");
			$this->db->from('tbl_ipd_patient');
			$this->db->where(array('tbl_ipd_patient.Series' => $code));
			return $this->db->get()->row()->cipdno + 1;
	}
	function get_cofig_data(){

		$this->db->select("*");
		$this->db->from('tbl_settings');
		$data = $this->db->get()->result(); 
		foreach($data as $item):
			$datareturn[$item->field ] = $item->value; 
	endforeach;	
	return $datareturn;
	}
}
