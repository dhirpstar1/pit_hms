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
class Dispensary_model extends CI_Model
{
	
	/**
	 * Database object
	 *
	 * @var object
	 */
	public function __construct()
	{
		ini_set('max_execution_time', 0);
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
		$sdate = DateTime::createFromFormat('d/m/Y',($this->input->post('startDate')) ? $this->input->post('startDate'): date('d/m/Y'));
		$edate = DateTime::createFromFormat('d/m/Y', ($this->input->post('endDate')) ? $this->input->post('endDate'): date('d/m/Y'));
		
		$startDate 	= $sdate->format('m/d/Y');
		$endDate 	= $edate->format('m/d/Y');

				
		$this->db->select("tbl_opd_patient.Department, 
		count(tbl_opd_patient.Department) as gcount, 
		SUM(CASE WHEN tbl_opd_patient.Sex = 'M' THEN 1 ELSE 0 END) as mcount, 
		SUM(CASE WHEN tbl_opd_patient.Sex = 'M' AND tbl_opd_patient.OldCRNO > 0 THEN 1 ELSE 0 END) as oldmcount, 
		SUM(CASE WHEN tbl_opd_patient.Sex = 'F' THEN 1 ELSE 0 END) as fcount,
		SUM(CASE WHEN tbl_opd_patient.Sex = 'F' AND tbl_opd_patient.OldCRNO > 0 THEN 1 ELSE 0 END) as oldfcount, 
		");
		if($table === 'tbl_discharge_patient'){
			$this->db->select("SUM(tbl_discharge_patient.nod) as sumnod");
		}
		//$startDate = ($this->input->post('startDate')) ? $this->input->post('startDate'): date('m/d/Y');
		//$endDate = ($this->input->post('endDate')) ? $this->input->post('endDate'): date('m/d/Y');
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

			if('print_report' === $this->router->fetch_method() || 'report' === $this->router->fetch_method()){ 
			}else{
				$this->db->where("tbl_ipd_patient.isadmit", 1); 
			}
			if($startDate && $endDate){
				$this->db->where("DATE_FORMAT(tbl_ipd_patient.doa,'%Y-%m-%d') >=", date("Y-m-d", strtotime($startDate)));
				$this->db->where("DATE_FORMAT(tbl_ipd_patient.doa,'%Y-%m-%d') <=", date("Y-m-d", strtotime($endDate)));
			}
		}
		
		if($table === 'tbl_discharge_patient')
		{
			$this->db->join('tbl_opd_patient', 'tbl_opd_patient.CRNO = tbl_discharge_patient.crno AND tbl_opd_patient.Series = tbl_discharge_patient.Series', 'left');
			$this->db->join('tbl_ipd_patient', 'tbl_ipd_patient.crno = tbl_discharge_patient.crno', 'left');
			$this->db->join('tbl_bedmaster', 'tbl_ipd_patient.bedid = tbl_bedmaster.ID', 'inner');
			$this->db->where("DATE_FORMAT(tbl_discharge_patient.dod,'%Y-%m-%d') >=", date("Y-m-d", strtotime($startDate)));
				$this->db->where("DATE_FORMAT(tbl_discharge_patient.dod,'%Y-%m-%d') <=", date("Y-m-d", strtotime($endDate)));
		
		}
		
		
		/*if($table === 'tbl_discharge_patient')
		{
			$this->db->join('tbl_opd_patient', 'tbl_discharge_patient.crno = tbl_opd_patient.CRNO AND 
			// tbl_discharge_patient.Series = tbl_opd_patient.Series', 'left');
			tbl_discharge_patient.Series = tbl_discharge_patient.Series', 'left');
			
			//$this->db->join('tbl_bedmaster', 'tbl_ipd_patient.bedid = tbl_bedmaster.ID', 'left');
			$this->db->where("DATE_FORMAT(tbl_discharge_patient.dod,'%Y-%m-%d') >=", date("Y-m-d", strtotime($startDate)));
			$this->db->where("DATE_FORMAT(tbl_discharge_patient.dod,'%Y-%m-%d') <=", date("Y-m-d", strtotime($endDate)));
		
		}*/
////////	
		
if($this->input->post('Department')){
	$this->db->where("tbl_opd_patient.Department", $this->input->post('Department'));
}
if($group){
	$this->db->group_by($group);
}

//$this->db->get()->result(); 
	//		echo  $this->db->last_query();
//exit;

return $this->db->get()->result(); 

}


	 function get_list($table, $type = FALSE, $startDate, $endDate, $limit, $page=0)
		{
			
			if ($table !== 'tbl_medicine_master_stock'){
				if($this->input->post('startDate') && $this->input->post('endDate')){
					$sdate = DateTime::createFromFormat('d/m/Y', $this->input->post('startDate'));
					$edate = DateTime::createFromFormat('d/m/Y', $this->input->post('endDate'));
					$startDate 	= $sdate->format('m/d/Y');
					$endDate 	= $edate->format('m/d/Y');
				} else {
					$startDate	= date('m/d/y');
					$endDate	= date('m/d/y');
				}
			}
			$this->db->select($table.".*");
			if ($table == 'tbl_medicine_dispencing_sales'){
				$this->db->select("tbl_opd_patient.PName");
				$this->db->select("tbl_medicine_master_stock.med_name");
			}else if ($table == 'tbl_medicine_add_puchase'){
				$this->db->select("tbl_medicine_master_stock.med_name");
			}
			$this->db->from($table);
			if('report' !== $this->router->fetch_method() && $table === 'tbl_medicine_master_stock'){
				//$this->db->where("DATE_FORMAT(tbl_medicine_master_stock.created,'%Y-%m-%d') >=", date("Y-m-d", strtotime($startDate)));
				//$this->db->where("DATE_FORMAT(tbl_medicine_master_stock.created,'%Y-%m-%d') <=", date("Y-m-d", strtotime($endDate)));
			 }

			 if ($table == 'tbl_medicine_dispencing_sales'){
				$this->db->join('tbl_opd_patient', 'tbl_opd_patient.CRNO = tbl_medicine_dispencing_sales.crno and tbl_opd_patient.Series = tbl_medicine_dispencing_sales.Series');
				$this->db->join('tbl_medicine_master_stock', 'tbl_medicine_master_stock.ID = tbl_medicine_dispencing_sales.med_id');
			}

			if ($table == 'tbl_medicine_add_puchase'){
				$this->db->join('tbl_medicine_master_stock', 'tbl_medicine_master_stock.ID = tbl_medicine_add_puchase.med_id');
			}
			if ($table !== 'tbl_medicine_master_stock'){
				if ($startDate && $endDate) {
						$this->db->where("DATE_FORMAT(".$table.".created,'%Y-%m-%d') >=", date("Y-m-d", strtotime($startDate)));
						$this->db->where("DATE_FORMAT(".$table.".created,'%Y-%m-%d') <=", date("Y-m-d", strtotime($endDate)));
				} else if($startDate) {
						$this->db->where("DATE_FORMAT(".$table.".created,'%Y-%m-%d') =", date("Y-m-d", strtotime($startDate)));
				}			
			}
			if ($this->input->post('category')) {
				$this->db->where($table.".category", $this->input->post('category'));
			}
			
			if ($table == 'tbl_medicine_dispencing_sales'){
				if($this->input->post('dispensary_sale_report') == 3) {
					$this->db->where($table.".ipdno", 1);
				} else if($this->input->post('dispensary_sale_report') == 2) {
					$this->db->where($table.".ipdno", NULL);
				}
			}
		if($type){
            return $this->db->get()->num_rows();
        }else{
			if($limit){
				$this->db->limit($limit, $page);
			}
			
			/*print_r('<pre>');
			print_r($this->db->get()->result()); 
			echo  $this->db->last_query();
			exit;	*/
            return $this->db->get()->result(); 
        }
	}
function get_list_data($table, $column, $value){ 
			$yearcode = $this->get_year_code();
			$this->db->select("*");
			$this->db->from($table);
			$this->db->where(array($column => $value)); 
			if($table == 'tbl_opd_treatment'){
				$this->db->where(array('Series' => $yearcode));
			}
			/*print_r('<pre>');
			print_r($this->db->get()->result()); 
			echo  $this->db->last_query();
			exit;	*/
			//echo $table; exit;
			return $this->db->get()->result(); 
}
function get_list_dat_lab($table, $column, $value){
	$this->db->select($table.".*, n_master_testunderhead.TNAME as headname, PARENT_T.FNAME as parent_headname");
	$this->db->from($table);
	$this->db->join('n_master_testunderhead', $table.'.TCODE = n_master_testunderhead.TCODE', 'inner');
	$this->db->join('n_master_fields', $table.'.TNAME = n_master_fields.FNAME', 'inner');
	$this->db->join('n_master_fields as PARENT_T', 'PARENT_T.PARENT = n_master_fields.CHILD', 'inner');
	$this->db->where(array($table.'.'.$column => $value));
	$this->db->group_by($table.'.ID');
	//$this->db->get()->result();
	//echo $this->db->last_query(); exit;


	return $this->db->get()->result(); 
}
	function get_bedids($department = null, $bedid = NULL){
		$this->db->select('*');
		$this->db->from('tbl_bedmaster');
		if($department):
			$this->db->where(array('Department' => $department));
		endif;	
		$this->db->where(array('Available' => 0));

		if($bedid):
			$this->db->or_where(array('ID' => $bedid));
		endif;

		foreach($this->db->get()->result() as $item):
			$beds[$item->ID] = $item->Description; 
	endforeach;	
	return $beds;
	}
	

function next_cr_no(){
		$yearcode = $this->get_year_code();
		$this->db->select_max('CRNO');
		$this->db->where(array('Series' => $yearcode));
		$result = $this->db->get('tbl_opd_patient')->row();
if($result->CRNO){
	return ((int)$result->CRNO + 1);
}else{
	return ((int)$result->CRNO + 1 + (int)$this->get_year_start());
}
		
		
	}

	function save_data(){
		$table = $this->input->post('tbl');
		$update = $this->input->post();
 		unset($update['ID']);		
		unset($update['tbl']);
		if($update['med_date']){
			$update['med_date'] 		= get_database_date($update['med_date']);
		}
		if($update['date_of_expiry']){
			$update['date_of_expiry'] 		= get_database_date($update['date_of_expiry']);
		}
		if($update['pur_date']){
			$update['pur_date'] 		= get_database_date($update['pur_date']);
		}
		$id = $this->input->post('ID');
	            if($id){
					if($table == 'tbl_ipd_patient'){
					$saved_data = $this->get_data($id, 'tbl_ipd_patient');
						if($saved_data->bedid == $update['bedid']){
							$updatebed['Available'] 	= 1;
							$this->db->where('ID', $update['bedid']);
							$this->db->update('tbl_bedmaster', $updatebed); 
						}else{
							$updatebed['Available'] 	= 1;
							$this->db->where('ID', $update['bedid']);
							$this->db->update('tbl_bedmaster', $updatebed); 
							$updatebed['Available'] 	= 0;
							$this->db->where('ID', $saved_data->bedid);
							$this->db->update('tbl_bedmaster', $updatebed); 
						}
					}
					if($table == 'tbl_medicine_dispencing_sales'){
						$this->db->select("tbl_medicine_dispencing_sales.*");
						$this->db->from('tbl_medicine_dispencing_sales');
						$this->db->where(array("tbl_medicine_dispencing_sales.ID" => $id));
						$saleMedData = $this->db->get()->row();
					}

				if((int)$saleMedData->unit_qty !== (int)$update['unit_qty'])
						{
							$unit_qty = (int)$update['unit_qty'] - (int)$saleMedData->unit_qty;	
						}
					$this->db->where('ID', $id);
					$this->db->update($table, $update);		
				} else {		
					$this->db->insert($table, $update);
					$id = $this->db->insert_id();
					$unit_qty = (int)  $update['unit_qty'];
				}
				if($table == 'tbl_medicine_dispencing_sales'){
					$this->db->select("tbl_medicine_master_stock.*");
					$this->db->from('tbl_medicine_master_stock');
					$this->db->where(array("tbl_medicine_master_stock.ID" => $update['med_id']));
					$medData = $this->db->get()->row();
					
					if($medData->ID > 0) {
						$updatData['qty'] = (int) $medData->qty - (int) $update['qty'];
						$updatData['unit_qty'] = (int) $medData->unit_qty - $unit_qty;					
						$this->db->where('ID', $medData->ID);
						$this->db->update('tbl_medicine_master_stock', $updatData); 
					}
				}
				if($table == 'tbl_medicine_add_puchase'){
					$this->db->select("tbl_medicine_master_stock.*");
					$this->db->from('tbl_medicine_master_stock');
					$this->db->where(array("tbl_medicine_master_stock.ID" => $update['med_id']));
					$medData = $this->db->get()->row();
					if($medData->ID > 0) {
						$updatData['qty'] = (int) $medData->qty + (int) $update['qty'];
						$updatData['unit_qty'] = (int) $medData->unit_qty + (int)  $update['unit_qty'];
						$this->db->where('ID', $medData->ID);
						$this->db->update('tbl_medicine_master_stock', $updatData); 
	
					}
				}
				
		return true;
	}

	function get_list_occupancy(){
			$this->db->select("tbl_opd_patient.*, tbl_ipd_patient.*, tbl_bedmaster.Description as bedname");
			$this->db->from('tbl_ipd_patient');
			$this->db->join('tbl_opd_patient', 'tbl_ipd_patient.crno = tbl_opd_patient.CRNO AND tbl_ipd_patient.Series = tbl_opd_patient.Series', 'inner');
			$this->db->join('tbl_bedmaster', 'tbl_ipd_patient.bedid = tbl_bedmaster.ID', 'inner');
			$this->db->where("tbl_ipd_patient.isadmit", 1);
			return $this->db->get()->result(); 
			
	}	

	function get_categories()
	{
			$this->db->select("name");
			$this->db->from('tbl_medicine_category');
			$this->db->order_by('ID', 'desc');
			$data = $this->db->get()->result(); 
			$datareturn = array();
			foreach($data as $item):
					$datareturn[$item->name] = $item->name; 
			endforeach;	
			return $datareturn;
	}
	function get_units()
	{
			$this->db->select("name");
			$this->db->from('tbl_medicine_unit');
			$this->db->order_by('ID', 'desc');
			$data = $this->db->get()->result(); 
			$datareturn = array();
			foreach($data as $item):
					$datareturn[$item->name] = $item->name; 
			endforeach;	
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
		//echo $table; exit;
				//foreach($data as $item):
				////$datareturn[$item->ID] = $item->therapy_title; 
			//	endforeach;	
		//print_r($data); exit;
		return $data;
	}
	function get_list_doctor($department= NULL){
		$this->db->select("DNAME");
			$this->db->from('tbl_mst_doctor');
			if($department){
				$this->db->where(array('tbl_mst_doctor.department' => urldecode($department)));	
			}
			$this->db->order_by('ID', 'desc');
			$data = $this->db->get()->result(); 
			foreach($data as $item):
					$datareturn[$item->DNAME] = $item->DNAME; 
			endforeach;	
			//echo $this->db->last_query(); exit;
			//print_r($datareturn); exit;
			return $datareturn;
	}

	function get_data_by_column_opd($table, $column, $value, $opt){ 
		$yearcode = $this->get_year_code();
		
			if($table == 'tbl_ipd_patient'){
				$this->db->select('tbl_opd_patient.*, tbl_opd_patient.ID as OPDID, tbl_ipd_patient.*, DATE_FORMAT(doa, "%m/%d/%Y") AS doa, tbl_bedmaster.Description');
				$this->db->join('tbl_bedmaster', 'tbl_ipd_patient.bedid = tbl_bedmaster.ID', 'left');
			}elseif($table == 'tbl_opd_patient'){
				$this->db->select('tbl_ipd_patient.*, tbl_opd_patient.*, DATE_FORMAT(tbl_ipd_patient.doa, "%m/%d/%Y") AS doa, , DATE_FORMAT(tbl_opd_patient.opddate, "%m/%d/%Y") AS opddate');
			}else{
				$this->db->select($table.'.*');
			}
	
			$this->db->from($table);
			
			if($table == 'tbl_ipd_patient'){
				$this->db->join('tbl_opd_patient', 'tbl_ipd_patient.crno = tbl_opd_patient.CRNO AND tbl_ipd_patient.Series = tbl_opd_patient.Series', 'left');
				$this->db->where(array('tbl_ipd_patient.'.$column => $value));
				//$this->db->where(array('tbl_ipd_patient.Series' => $yearcode));
				//$this->db->where(array('tbl_ipd_patient.isAdmit' => 0));
			}elseif($table == 'tbl_opd_patient'){
				$this->db->join('tbl_ipd_patient', 'tbl_ipd_patient.crno = tbl_opd_patient.CRNO AND tbl_ipd_patient.Series = tbl_opd_patient.Series', 'left');
				$this->db->where(array('tbl_opd_patient.'.$column => $value));
				//$this->db->where(array('tbl_opd_patient.Series' => $yearcode));
				//$this->db->where(array('tbl_opd_patient.isAdmit' => 1));
			}else{
				$this->db->where(array($column => $value));
			}
			
			if($opt == "true"){
				$this->db->where(array('tbl_opd_patient.Sex' => 'F'));
			}
			
			return $this->db->get()->row(); 	
		}

		function get_data_by_column_phar($table, $column, $value, $opt, $year_code=NULL)
			{ 
				$yearcode = $this->get_year_code();
				$this->db->select('tbl_opd_patient.*, DATE_FORMAT(tbl_ipd_patient.doa, "%d/%m/%Y") AS doa, tbl_bedmaster.Description');
				$this->db->from('tbl_opd_patient');
				$this->db->join('tbl_ipd_patient', 'tbl_ipd_patient.crno = tbl_opd_patient.CRNO AND tbl_ipd_patient.Series = tbl_opd_patient.Series', 'left');
				$this->db->join('tbl_bedmaster', 'tbl_ipd_patient.bedid = tbl_bedmaster.ID', 'left');
				$this->db->where(array('tbl_opd_patient.CRNO' => $value));
				if($yearcode){
					$this->db->where(array('tbl_opd_patient.Series' => $yearcode));
				}
				return $this->db->get()->row(); 	
			}

	function get_data_by_column($table, $column, $value, $opt, $year_code=NULL){ 
	$yearcode = $this->get_year_code();


		if($table == 'tbl_ipd_patient' || $table == 'tbl_discharge_patient'){
			
			$this->db->select('tbl_opd_patient.*, tbl_opd_patient.ID as OPDID, tbl_ipd_patient.*, DATE_FORMAT(tbl_ipd_patient.doa, "%d/%m/%Y") AS doa, tbl_bedmaster.Description, tbl_discharge_patient.dod');
		if($table == 'tbl_discharge_patient'){
			$this->db->select('tbl_discharge_patient.investigations, tbl_discharge_patient.treatmentgiven, tbl_discharge_patient.treatmentadviced, tbl_discharge_patient.followupafter, tbl_discharge_patient.conditionondischarge, tbl_discharge_patient.finaldiagnosis as Diagnosis');
		}
	$table = 'tbl_ipd_patient';
		}elseif($table == 'tbl_opd_patient'){
			$this->db->select('tbl_ipd_patient.*, tbl_opd_patient.*, DATE_FORMAT(tbl_ipd_patient.doa, "%d/%m/%Y") AS doa, , DATE_FORMAT(tbl_opd_patient.opddate, "%d/%m/%Y") AS opddate');
		}elseif($table == 'tbl_diet'){
			$this->db->select('tbl_diet.*, tbl_opd_patient.*, tbl_ipd_patient.ipdno, DATE_FORMAT(tbl_diet.sdate, "%d/%m/%Y") AS sdate');
		}elseif($table == 'tbl_x_ray'){
			$this->db->select('tbl_x_ray.*, tbl_opd_patient.*, tbl_ipd_patient.ipdno, DATE_FORMAT(tbl_x_ray.xdate, "%d/%m/%Y") AS xdate');
		}elseif($table == 'tbl_surgery'){
			$this->db->select('tbl_surgery.*, tbl_opd_patient.*, DATE_FORMAT(tbl_surgery.sdate, "%d/%m/%Y") AS sdate');
		}elseif($table == 'n_report_testm'){
			$this->db->select('n_report_testm.*, tbl_opd_patient.*, tbl_ipd_patient.ipdno, DATE_FORMAT(n_report_testm.DDATE, "%d/%m/%Y") AS DDATE, n_report_testm.ID as labid');
		}else{
			$this->db->select($table.'.*');
		}

		$this->db->from($table);
		
		if($table == 'tbl_ipd_patient' || $table == 'tbl_discharge_patient'){
			$this->db->join('tbl_opd_patient', 'tbl_ipd_patient.crno = tbl_opd_patient.CRNO AND tbl_ipd_patient.Series = tbl_opd_patient.Series', 'left');
			$this->db->join('tbl_bedmaster', 'tbl_ipd_patient.bedid = tbl_bedmaster.ID', 'left');

			$this->db->join('tbl_discharge_patient', 'tbl_ipd_patient.crno = tbl_discharge_patient.crno AND tbl_ipd_patient.Series = tbl_discharge_patient.Series', 'left');

			$this->db->where(array('tbl_ipd_patient.'.$column => $value));
			if($year_code){
				$this->db->where(array('tbl_ipd_patient.Series' => $year_code));
			}
			//$this->db->where(array('tbl_ipd_patient.Series' => $yearcode));
			
			//$this->db->where(array('tbl_ipd_patient.isAdmit' => 1));
		}elseif($table == 'tbl_opd_patient'){
			$this->db->join('tbl_ipd_patient', 'tbl_ipd_patient.crno = tbl_opd_patient.CRNO AND tbl_ipd_patient.Series = tbl_opd_patient.Series', 'left');
			$this->db->where(array('tbl_opd_patient.'.$column => $value));
			$this->db->where(array('tbl_opd_patient.Series' => $yearcode));
			//$this->db->where(array('tbl_opd_patient.isAdmit' => 1));
		}elseif($table == 'tbl_diet'){
			$this->db->join('tbl_opd_patient', 'tbl_diet.CRNO = tbl_opd_patient.CRNO AND tbl_diet.Series = tbl_opd_patient.Series', 'left');
			$this->db->join('tbl_ipd_patient', 'tbl_ipd_patient.crno = tbl_diet.crno AND tbl_ipd_patient.Series = tbl_diet.Series', 'left');

			$this->db->where(array('tbl_diet.'.$column => $value));
		}elseif($table == 'tbl_x_ray'){
			$this->db->join('tbl_opd_patient', 'tbl_x_ray.CRNO = tbl_opd_patient.CRNO AND tbl_x_ray.Series = tbl_opd_patient.Series', 'left');
			$this->db->join('tbl_ipd_patient', 'tbl_ipd_patient.crno = tbl_x_ray.crno AND tbl_ipd_patient.Series = tbl_x_ray.Series', 'left');

			$this->db->where(array('tbl_x_ray.'.$column => $value));
		}elseif($table == 'tbl_surgery'){
			$this->db->join('tbl_opd_patient', 'tbl_surgery.CRNO = tbl_opd_patient.CRNO AND tbl_surgery.Series = tbl_opd_patient.Series', 'left');
			$this->db->where(array('tbl_surgery.'.$column => $value));
		}elseif($table == 'n_report_testm'){
			$this->db->join('tbl_opd_patient', 'tbl_opd_patient.CRNO = n_report_testm.crno AND tbl_opd_patient.Series = n_report_testm.Series', 'left');
			$this->db->join('tbl_ipd_patient', 'tbl_ipd_patient.crno = n_report_testm.crno AND tbl_ipd_patient.Series = n_report_testm.Series', 'left');
			$this->db->where(array('n_report_testm.'.$column => $value));
		}else{
			$this->db->where(array($column => $value));
		}
		
		if($opt == "true"){
			$this->db->where(array('tbl_opd_patient.Sex' => 'F'));
		}
//print_r($this->db->get()->row()); exit;
		return $this->db->get()->row(); 	
	}
	function get_data($id, $table) { 
		if($table == 'tbl_ipd_patient'){ 
			$this->db->select("tbl_opd_patient.*,tbl_opd_patient.ID as OPDID, tbl_ipd_patient.*");
		}elseif($table == 'tbl_discharge_patient'){
			$this->db->select("tbl_opd_patient.*, tbl_discharge_patient.*, tbl_ipd_patient.bedid, tbl_ipd_patient.ipdno");
		}elseif($table == 'tbl_diet'){
			$this->db->select("tbl_opd_patient.*, tbl_diet.*");

		}elseif($table == 'tbl_x_ray'){
			$this->db->select("tbl_opd_patient.*, tbl_x_ray.*, tbl_ipd_patient.bedid");

		}elseif($table == 'tbl_surgery'){
			$this->db->select("tbl_opd_patient.*, tbl_surgery.*");

		}elseif($table == 'tbl_panchkarma'){
			$this->db->select("tbl_panchkarma.*, tbl_ipd_patient.ipdno");
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

			}elseif($table == 'tbl_x_ray'){
				$this->db->join('tbl_opd_patient', 'tbl_opd_patient.CRNO = tbl_x_ray.crno', 'left');
				$this->db->join('tbl_ipd_patient', 'tbl_ipd_patient.crno = tbl_opd_patient.CRNO', 'left');

			}elseif($table == 'tbl_surgery'){
				$this->db->join('tbl_opd_patient', 'tbl_opd_patient.CRNO = tbl_surgery.crno', 'left');
			}
			elseif($table == 'tbl_panchkarma'){
				$this->db->join('tbl_ipd_patient', 'tbl_ipd_patient.crno = tbl_panchkarma.Crno', 'left');
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

		//$this->db->get()->result();
		//echo $this->db->last_query(); exit;


		return $this->db->get()->result();
	}
	function get_all_patient_opd($type){
		$this->db->select("count(tbl_opd_patient.ID) AS total_count, sum(tbl_opd_patient.Sex = 'F') AS female_count,  SUM(tbl_opd_patient.Sex = 'M') AS male_count, tbl_opd_patient.Department");
		$this->db->from('tbl_opd_patient');
		$this->db->where(array('DATE(tbl_opd_patient.opddate)' => date('Y-m-d')));
		$this->db->group_by('Department');

		//$this->db->get()->result();
		//echo $this->db->last_query(); exit;


		return $this->db->get()->result();
	}

	function get_all_beds(){

		$this->db->select("count(tbl_ipd_patient.ID) AS unvailable");
		$this->db->join('tbl_opd_patient', 'tbl_ipd_patient.crno = tbl_opd_patient.CRNO AND tbl_ipd_patient.Series = tbl_opd_patient.Series', 'inner');
		$this->db->from('tbl_ipd_patient');
		$this->db->where(array('tbl_ipd_patient.isadmit' => 1));
		$object = new stdClass();
		$object->unvailable = $this->db->get()->row()->unvailable;
		$this->db->select("count(tbl_bedmaster.ID) AS total_count");
		$this->db->from('tbl_bedmaster');
				
		$object->total_count = $this->db->get()->row()->total_count;
		return $object;
	}

	function get_all_beds_old(){
		$this->db->select("count(tbl_bedmaster.ID) AS total_count");
		//$this->db->join('tbl_ipd_patient', 'tbl_ipd_patient.bedid = tbl_bedmaster.ID', 'inner');
		$this->db->from('tbl_bedmaster');
		return $this->db->get()->row();
	}
	function delete_data($table, $id){
			$this->db->where(array('ID' => $id));
			$this->db->delete($table);
			return $id;
	}
	function get_year_code($year = NULL){
			$year = ($year) ? $year : date('Y');
			$this->db->select("*");
			$this->db->from('tbl_series');
			$this->db->where(array('SessionYear' => $year));
			return $this->db->get()->row()->IPDCode;
	}
function get_year_start(){
			$this->db->select("*");
			$this->db->from('tbl_series');
			$this->db->where(array('SessionYear' => date('Y')));
			return $this->db->get()->row()->yearstart;
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

function get_list_lab_heads(){

	$this->db->select("*");
	$this->db->from('n_master_head');
	$this->db->order_by('ID', 'desc');
	$data = $this->db->get()->result(); 
	$datareturn[0] = '--Select--';
	foreach($data as $item):
			$datareturn[$item->HCODE] = $item->HNAME; 
	endforeach;	
	return $datareturn;
}

function get_subheads($code){
	$this->db->select("*");
	$this->db->from('n_master_testunderhead');
	$this->db->where('HCODE', $code);
	$this->db->order_by('ID', 'desc');
	$data = $this->db->get()->result(); 	
	foreach($data as $item):
			$datareturn[$item->TCODE] = $item->TNAME; 
	endforeach;	

	return $datareturn;
}

function get_subtestheads($code){
	$this->db->select("*");
	$this->db->from('n_master_fields');
	$this->db->where('TCODE', $code);
	$this->db->where('CHILD', NULL);
	$this->db->order_by('ID', 'desc');
	$data = $this->db->get()->result(); 
	$datareturn[0] = '--Select--';	
	foreach($data as $item):
			$datareturn[$item->ID] = $item->FNAME; 
	endforeach;	

	return $datareturn;
}

function get_list_lab_sub_test_heads(){

	$this->db->select("*");
	$this->db->from('n_master_fields');
	$this->db->where('CHILD', NULL);

	$this->db->order_by('ID', 'desc');
	$data = $this->db->get()->result(); 
	$datareturn[0] = '--Select--';
	foreach($data as $item):
			$datareturn[$item->ID] = $item->FNAME; 
	endforeach;	
	return $datareturn;
}

function get_list_lab_sub_test_heads_tccode($tccode){

	$this->db->select("*");
	$this->db->from('n_master_fields');
	$this->db->where('CHILD', NULL);
	$this->db->where('TCODE', $tccode);
	$this->db->order_by('ID', 'desc');
	$data = $this->db->get()->result(); 
	$datareturn[0] = '--Select--';
	foreach($data as $item):
			$datareturn[$item->ID] = $item->FNAME; 
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
				$datareturn[$item->karama_id] = $item->karama_value; 
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

	function get_lab_head_sub_data($table, $field, $codes){
			$this->db->select("*");
			$this->db->from($table);
			if($field){
				$this->db->where_in($field, $codes);
			}
			$this->db->order_by('ID', 'desc');
			return $this->db->get()->result();	
	}

	function get_current_iptno(){
			$code =  $this->get_year_code();
			$this->db->select("MAX(tbl_ipd_patient.ipdno) as cipdno");
			$this->db->from('tbl_ipd_patient');
			$this->db->where(array('tbl_ipd_patient.Series' => $code));
			return ((int)$this->db->get()->row()->cipdno + 1);
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

	function get_downloads_list($method, $type = false){
	$map = directory_map(FCPATH.'uploads/'.UPLOAD_FOLDER.'/');
		if($type){
			return count($map);
		}else{
			return $map;	
		}
	}

	function get_medicines_list($keyword) {
		$this->db->select("tbl_medicine_purchase.name");
		$this->db->from('tbl_medicine_purchase');
		$this->db->like('tbl_medicine_purchase.name', $keyword);
		$this->db->limit(10, 0);
		return $this->db->get()->result(); 
		
	}

	function search_medicines_list($keyword) {
		$this->db->select("tbl_medicine_master_stock.ID, CONCAT(med_name, '_',batch_id,'_',rack) AS med_name ");
		$this->db->from('tbl_medicine_master_stock');
		if($keyword){
			$this->db->like('tbl_medicine_master_stock.med_name', $keyword);
		}
		$this->db->limit(10, 0);
		return $this->db->get()->result(); 
	}
	function get_medicine ($id, $column) {
		$this->db->select("tbl_medicine_master_stock.".$column);
		$this->db->from('tbl_medicine_master_stock');
		$this->db->like('tbl_medicine_master_stock.id', $id);
		return $this->db->get()->row()->$column; 
	}
}