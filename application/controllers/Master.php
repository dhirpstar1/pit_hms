<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	
	
	function __construct()
	  {
		parent::__construct();
		error_reporting(0);
		
		$this->load->library('ion_auth');
		$this->load->model('Master_model');
		$this->load->helper(array('form', 'my_helper'));
        $this->load->library('form_validation');
		if (!$this->ion_auth->logged_in())
		{
		  //redirect them to the login page
		  redirect('auth/login', 'refresh');
		}
		$this->data['page_title'] = 'HMS - Dashboard';
    $this->pagenum = 150;
    $this->config_data = $data['config_data'] = $this->Master_model->get_cofig_data();
    $this->load->vars($data);

    $this->receipt_types = array('OPD Receipt' => 'OPD Receipt', 'IPD Receipt' => 'IPD Receipt', 'Investigation Receipt' => 'Investigation Receipt', 'Medicine Receipt' => 'Medicine Receipt', 'Procedure Receipt' => 'Procedure Receipt');
	  }
  
  protected function render($the_view = NULL, $template = 'admin_master')
	  {
		parent::render($the_view, $template);
	  }


public function get_year_code(){
	
	list($sday, $smonth, $syear) = explode('/', $this->input->post('startDate'));
	list($eday, $emonth, $eyear) = explode('/', $this->input->post('endDate'));
	
	if($syear == $eyear){
		echo $this->Master_model->get_year_code($syear);
	}else{
		echo 'ok';
	}
}

 public function update( $table='tbl_mst_doctor', $id = null)
	{	

		if ($this->input->post()) { 
  				  $this->Master_model->save_data();
            redirect(str_replace(base_url(),'',$_SERVER['HTTP_REFERER']));	
      }
      
if($id > 0){
  $data['data'] = $this->Master_model->get_data($id, $table);
  if( $table == 'tbl_gynec'){
  $data['saveprocedures'] = $this->Master_model->get_gynec_procedure($id);
  }
  if( $table == 'tbl_panchkarma'){
    $data['savekaramas'] = $this->Master_model->get_panchkarma_karama($id);
    }
    if( $table == 'tbl_physio'){
      $data['savephysio'] = $this->Master_model->get_physio_therapy($id);
    }
    if( $table == 'n_master_fields'){
      //print_r($data['data']); exit;
      if($data['data']->HCODE){
        $data['subheads'] = $this->Master_model->get_subheads($data['data']->HCODE);
        $data['subtestheads'] = $this->Master_model->get_subtestheads($data['data']->TCODE);
      }
    }
}
    $data['departments']    = array('' => '-- Select --') + $this->Master_model->get_list_department();
    $data['wards']          = $this->Master_model->get_list_ward();
    $data['doctors']        = $this->Master_model->get_list_doctor();
    $data['receipt_types']  = $this->receipt_types;
    $data['procedures']     = $this->Master_model->get_list_procedure();
    $data['karamas']        = $this->Master_model->get_list_karamas();
    $data['therapy']        = $this->Master_model->get_list_therapy();

    if( $table == 'n_master_testunderhead' || $table == 'n_master_fields' || $table == 'n_report_testm'){
    $data['testheads'] = $this->Master_model->get_list_lab_heads();
    //$data['subtestheads'] = $this->Master_model->get_list_lab_sub_test_heads();
    }  

    if( $table == 'tbl_opd_patient'){
    $data['next_cr_no'] = $this->Master_model->next_cr_no();
    }
    if( $table == 'tbl_ipd_patient'){
      if($data['data']->department){
        $data['bedids'] = $this->Master_model->get_bedids($data['data']->department, $data['data']->bedid);
      }
      }
      if( $table == 'tbl_karama'){
        $data['karama_parents'] = array_unshift_ref($this->Master_model->get_list_karamas('parent'), '--Select--') ;
        }
        if( $table == 'tbl_therapy'){
          $data['therapy_parents'] = array_unshift_ref($this->Master_model->get_list_therapy('parent'), '--Select--') ;
          }
        if( $table == 'tbl_stock_item'){
          $data['stocktype'] = $this->Master_model->get_stocktype();
          }
          $data['tbl'] = $table;

         
          echo $this->load->view($table,$data, true);
        exit;		
  }
  public function get_data_opd( $table='tbl_mst_doctor', $column = null, $value = null, $opt = null)
	{	
        echo json_encode($this->Master_model->get_data_by_column_opd($table, $column, $value, $opt));
        exit;		
  }
 public function get_doctors( $department='all')
	{	
        echo json_encode($this->Master_model->get_list_doctor($department));
        exit;		
  }

  public function get_data( $table='tbl_mst_doctor', $column = null, $value = null, $opt = null)
	{	
        echo json_encode($this->Master_model->get_data_by_column($table, $column, $value, $opt));
        exit;		
  }
  public function get_data_list( $table='tbl_mst_doctor', $column = null, $value = null, $opt = null)
	{	
        echo json_encode($this->Master_model->get_data_list_by_column($table, $column, $value, $opt));
        exit;		
  }
  public function get_lab_subtesthead_list()
	{	
        echo json_encode($this->Master_model->get_list_lab_sub_test_heads_tccode($this->input->post('subhead')));
        exit;		
  }
  public function get_lab_head_sub_data($table, $felid)
	{	
    if($table == 'n_master_fields'){
        $jsondata = nested2ul($this->Master_model->get_lab_head_sub_data($table, $felid, $this->input->post('selected_subhead')));
       // $jsondata = $this->Master_model->get_lab_head_sub_data($table, $felid, $this->input->post('selected_subhead'));
    }else{
        $jsondata = $this->Master_model->get_lab_head_sub_data($table, $felid, $this->input->post('selected_subhead'));
    }
    echo json_encode($jsondata);
        exit;		
  }
  public function get_custom_list( $table='tbl_mst_doctor', $column = null, $value)
	{	
          $data['listings'] = $this->Master_model->get_list_data($table, $column, $value);
          $data['show_listings'] = true;
          echo $this->load->view($table, $data, true);
  }
  public function selected_test()
	{	
          $data['listings'] = nested2ul($this->Master_model->get_lab_head_sub_data('n_master_fields','',''));
          $data['selected_tests'] = $this->input->post('selected_tests');
          
          echo $this->load->view('selected_test', $data, true);
  }

  

  public function update_with_id( $table='tbl_mst_doctor', $id = null)
	{	
          $this->Master_model->save_data();
          if($this->input->post('tbl') == 'tbl_opd_treatment' || $this->input->post('tbl') == 'tbl_ipd_treatment'){
            echo $this->input->post('crno');
          }else{  
            echo $this->input->post('ID');
          }
          exit;
  }
  public function delete( $table='tbl_mst_doctor', $id = null)
	{	
  			echo $this->Master_model->delete_data($table, $id);
 			  exit;		
	}

  public function get_custom_bed_list( )
	{	
  			echo json_encode($this->Master_model->get_bedids($this->input->post('department')));
 			  exit;		
  }
  public function get_lab_subhead_list( )
	{	
  			echo json_encode($this->Master_model->get_subheads($this->input->post('head')));
 			  exit;		
  }
  

  public function print_data($method = 'tbl_mst_doctor', $ID = 0, $year_code = NULL)
	{
    
    if($ID > 0){
            if($method == 'tbl_opd_patient'){
              $data['data']       = $this->Master_model->get_data_by_column($method, 'CRNO', $ID, false); 
              $data['treatments'] = $this->Master_model->get_list_data('tbl_opd_treatment', 'crno', $ID); 

            }elseif($method == 'tbl_ipd_patient'){
              $data['data']       = $this->Master_model->get_data_by_column($method, 'crno', $ID, false);
              $data['treatments'] = $this->Master_model->get_list_data('tbl_ipd_treatment', 'crno', $ID); 
            }elseif($method == 'tbl_discharge_patient'){
              $data['data']       = $this->Master_model->get_data_by_column($method, 'crno', $ID, false, $year_code);
              $data['treatments'] = $this->Master_model->get_list_data('tbl_ipd_treatment', 'crno', $ID); 
            }elseif($method == 'n_report_testm'){
              $data['data']       = $this->Master_model->get_data_by_column($method, 'ID', $ID, false);
              $data['tests_options'] = $this->Master_model->get_list_dat_lab('n_report_testt', 'PCODE', $ID); 
            }elseif($method == 'tbl_receipt'){
              $data['data']       = $this->Master_model->get_data_by_column($method, 'ID', $ID, false);
            }elseif($method == 'tbl_x_ray'){
              $data['data']       = $this->Master_model->get_data_by_column($method, 'ID', $ID, false);
            }else{
              $data['data']       = $this->Master_model->get_data_by_column($method, 'CRNO', $ID, false);
            }
          $html = $this->load->view('print_'.$method, $data, true);
            if($method == 'n_report_testm'){

              $html .= '<p>&nbsp;</p><table style="font-size:9px!important;"><tr><td style="font-size:9px!important; text-align:left;">Pathologist</td><td style="font-size:9px!important; text-align:right;">Lab Technician</td></tr></table><p>&nbsp;</p><div style="font-size:9px!important; text-align:left;"><p>&nbsp;</p>NOTE: All Pathological tests have technical, biological limitations & different reference values based on the methods and kits used. Kindly
              correlate the report clinically with other investigative finding. A review should be requested in case of any disparity. This report is not
              for medico legal purpose.</div>';
              $this->print_pdf( $html, $method, 'R');


            }elseif($method == 'tbl_discharge_patient'){
				 $this->print_pdf( $html, $method, 'R');
			}else{
              $this->print_pdf( $html, $method, 'L');
            }
  //echo $this->load->view('print_'.$method, $data, true); exit;

exit;
    }else{
      $data['listings'] = $this->Master_model->get_list($method, false, $this->input->post('startDate'), $this->input->post('endDate'), 10000, 0);
      
      
	//print_r($data['listings'] ); exit;
      
      if($method == 'tbl_opd_patient' || $method == 'tbl_ipd_patient'){
      $data['listings_by_departments'] = $this->Master_model->get_list_group($method);
	  

      $data['departments'] = $this->Master_model->get_list_department();
      }elseif($method == 'tbl_gynec'){
          $data['procedures'] = $this->Master_model->get_list_procedure();
          $data['procedures_count'] = $this->Master_model->get_list_procedure_count();
         }elseif($method == 'tbl_panchkarma'){
          $data['karamas'] = $this->Master_model->get_list_karamas();
          $data['karamas_count'] = $this->Master_model->get_list_karamas_count();

        }elseif($method == 'tbl_physio'){
          $data['therapy'] = $this->Master_model->get_list_therapy();
          $data['therapy_count'] = $this->Master_model->get_list_therapy_count();
        }
        
        if($this->input->post('Department')){
          $data['selected_department'] = $this->input->post('Department'); 
        }
       //print_r($data); exit;
      $html =  $this->load->view('print_list_'.$method, $data, true); 
	  
      $this->print_pdf( $html,  $method, 'L');
    }
  }


  public function occupancy_report($method = 'tbl_ipd_patient', $ID = 0)
	{
    $data['listings'] = $this->Master_model->get_list_occupancy($method, false);

    
    $html =  $this->load->view('print_occupancy_report', $data, true); 
    
    $this->print_pdf( $html,  $method, 'L');
  }


  public function print_report($method = 'tbl_mst_doctor', $ID = 0)
	{

    $data['listings'] = $this->Master_model->get_list($method, false, $this->input->post('startDate'), $this->input->post('endDate'), '', '');
	//print_r($data['listings']); exit; 
    if($method == 'tbl_opd_patient' || $method == 'tbl_ipd_patient' ||  $method == 'tbl_discharge_patient'){
      $data['listings_by_departments'] = $this->Master_model->get_list_group($method);
      $data['departments'] = $this->Master_model->get_list_department();
    }
    if($this->input->post('Department')){
      $data['selected_department'] = $this->input->post('Department'); 
    }
	
	$html =  $this->load->view('print_report_'.$method, $data, true); 
    $filename = str_replace("/", '_', $this->input->post('startDate')). "_To_". str_replace("/", '_', $this->input->post('endDate')). "_". $method; 
    $this->print_pdf( $html,  $filename, 'L', $this->input->post('report_type'));
    exit;
  }

function print_pdf($html, $filename, $pagetype = 'L', $type = NULL){
  ini_set('max_execution_time', 0); 
  ini_set('memory_limit','2048M');

$htmlarray = explode('||', $html);

//print_r($htmlarray) ; exit;

  $this->load->library('Pdf');

  // create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('HMS');
$pdf->SetTitle($config_data['hospital_name']);
$pdf->SetSubject($config_data['hospital_name']);
$pdf->SetKeywords('');

// set default header data
$pdf->SetHeaderData('', PDF_HEADER_LOGO_WIDTH, $this->config_data['hospital_name'], $this->config_data['address'], array(0,64,255), array(0,64,128));
$pdf->setFooterData(array(0,64,0), array(0,64,128));

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, 15, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
 require_once(dirname(__FILE__).'/lang/eng.php');
 $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set default font subsetting mode
$pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
$pdf->SetFont('dejavusans', '', 12, '', true);

// Add a page
// This method has several options, check the source code documentation for more information.
// set text shadow effect
$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.1, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));

foreach($htmlarray as $item):

$pdf->AddPage($pagetype , 'A4');
// Set some content to print
// output the HTML content
//$pdf->writeHTML($item, true, false, true, false, '');
// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $item, 0, 1, 0, true, '', true);
// reset pointer to the last page
//$pdf->lastPage();
endforeach;


// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
if($type){
  $filename= "{$filename}.pdf"; 
  $filelocation = FCPATH ."uploads/".UPLOAD_FOLDER.'/';//windows
  $fileNL = $filelocation."/".$filename; //Linux
  $pdf->Output($fileNL, 'F');
}else{
  $pdf->Output($filename, 'I');
}


//============================================================+
// END OF FILE
//============================================================+ 

exit;
  // echo $this->load->view('print_list_'.$method, $data, true); exit;


}


public function downloads($method = 'tbl_ipd_patient', $page = 0)
	{
    $this->load->helper('download');
    $this->load->helper('directory');

		 $numrows = $this->pagenum;
     $this->load->library('pagination');
           
 		    $data['listings']   = $this->Master_model->get_downloads_list($method, false, $config['per_page'], $page);

 		$this->load->view('header', $data);
		$this->load->view('downloads',$data);
		$this->load->view('footer', $data);
	}



public function index($method = 'tbl_mst_doctor', $page = 0)
	{
		 $numrows = $this->pagenum;
		  if($method == 'tbl_receipt'){
			 $numrows = 50;
		 }
		 
        $this->load->library('pagination');
         
        $config['base_url']         = site_url('/master/index/'.$method);
        $config['total_rows']       = $this->Master_model->get_list($method, true,date('Y-m-d'), date('Y-m-d'), 0, 0);
        $config['per_page']         = $numrows;
        $config['uri_segment']      = 4;
        $config['num_links']        = 5;  
        $config['first_link']       = 'First';
        $config['first_tag_open']   = '<li>';
        $config['first_tag_close']  = '</li>';
        $config['last_link']        = 'Last';
        $config['last_tag_open']    = '<li>';
        $config['last_tag_close']   = '</li>';
        $config['full_tag_open']    = '<nav><ul class="pagination">';
        $config['full_tag_close']   = '</ul></nav>';
        $config['cur_tag_open']     = '<li class="active"><a href="#">';
        $config['cur_tag_close']    = '</a></li>';
        $config['num_tag_open']     = '<li>';
        $config['num_tag_close']    = '</li>';
        $config['prev_link']        = '&laquo;';
        $config['prev_tag_open']    = '<li>';
        $config['prev_tag_close']   = '</li>';
        $config['next_link']        = '&raquo;';
        $config['next_tag_open']    = '<li>';
        $config['next_tag_close']   = '</li>';
        
        $this->pagination->initialize($config);
       // $data['field'] = $field;
       // $data['by'] = $by;
 		    $data['listings']   = $this->Master_model->get_list($method, false,date('Y-m-d'), date('Y-m-d'), $config['per_page'], $page);
        $data['page_links'] = $this->pagination->create_links();
        $data['startDate']  = $this->input->post('startDate');
        $data['endDate']  	= $this->input->post('endDate');
		$data['page']  		= $page;
        $data['departments'] = array('' => '-- Select --') + $this->Master_model->get_list_department();
        if($method == 'tbl_gynec'){
          $data['procedures'] = $this->Master_model->get_list_procedure();
          $data['procedures_count'] = $this->Master_model->get_list_procedure_count();
        }
        if($method == 'tbl_panchkarma'){
          $data['karamas'] = $this->Master_model->get_list_karamas();
          $data['karamas_count'] = $this->Master_model->get_list_karamas_count();
        }
        if($method == 'tbl_physio'){
        //  $data['procedures'] = $this->Master_model->get_list_procedure();
         // $data['procedures_count'] = $this->Master_model->get_list_procedure_count();
        }
       
        $data['postcrno']       = $this->input->post('postcrno');
        $data['receipt_types']  = $this->receipt_types;
        $data['stocktype']      = $this->Master_model->get_stocktype();
        $data['Department']    = $this->input->post('Department');

        if($method === 'n_master_fields'){
          $data['listings'] = nested2ul($data['listings']);
        }

 		$this->load->view('header', $data);
		$this->load->view($method.'_list',$data);
		$this->load->view('footer', $data);
	}


public function report($method = 'tbl_mst_doctor', $page = 0)
	{
//ini_set('display_errors', 'On');
		 $numrows = $this->pagenum;
        $this->load->library('pagination');
        
        $config['base_url']         = site_url('/master/report/'.$method);
        $config['total_rows']       = $this->Master_model->get_list($method, true, false, '', '', 0);
       
        $config['per_page']         = $numrows;
        $config['uri_segment']      = 4;
        $config['num_links']        = 5;  
        $config['first_link']       = 'First';
        $config['first_tag_open']   = '<li>';
        $config['first_tag_close']  = '</li>';
        $config['last_link']        = 'Last';
        $config['last_tag_open']    = '<li>';
        $config['last_tag_close']   = '</li>';
        $config['full_tag_open']    = '<nav><ul class="pagination">';
        $config['full_tag_close']   = '</ul></nav>';
        $config['cur_tag_open']     = '<li class="active"><a href="#">';
        $config['cur_tag_close']    = '</a></li>';
        $config['num_tag_open']     = '<li>';
        $config['num_tag_close']    = '</li>';
        $config['prev_link']        = '&laquo;';
        $config['prev_tag_open']    = '<li>';
        $config['prev_tag_close']   = '</li>';
        $config['next_link']        = '&raquo;';
        $config['next_tag_open']    = '<li>';
        $config['next_tag_close']   = '</li>';
        
        $this->pagination->initialize($config);
				

 		$data['listings']   = $this->Master_model->get_list($method, false, '', '', $config['per_page'], $page);
        $data['page_links'] = $this->pagination->create_links();
        $data['startDate']  = ($this->input->post('startDate')) ? $this->input->post('startDate') : date('d/m/Y');
        $data['endDate']    = ($this->input->post('endDate')) ? $this->input->post('endDate') : date('d/m/Y');
        $data['departments']= array('' => '-- Select --') + $this->Master_model->get_list_department();
        $data['Department'] = $this->input->post('Department');

//print_r($data['listings'] ); exit;
 		$this->load->view('header', $data);
		$this->load->view($method.'_report',$data);
		$this->load->view('footer', $data);
	}

  public function doctors($page = 0)
	{
		 $numrows = $this->pagenum;
        $this->load->library('pagination');
         

        $config['base_url']         = site_url('/master/doctors/');
        $config['total_rows']       = $this->Master_model->get_list('tbl_mst_doctor', true);

        $config['per_page']         = $numrows;
        $config['uri_segment']      = 3;
        $config['num_links']        = 5;  
        $config['first_link']       = 'First';
        $config['first_tag_open']   = '<li>';
        $config['first_tag_close']  = '</li>';
        $config['last_link']        = 'Last';
        $config['last_tag_open']    = '<li>';
        $config['last_tag_close']   = '</li>';
        $config['full_tag_open']    = '<nav><ul class="pagination">';
        $config['full_tag_close']   = '</ul></nav>';
        $config['cur_tag_open']     = '<li class="active"><a href="#">';
        $config['cur_tag_close']    = '</a></li>';
        $config['num_tag_open']     = '<li>';
        $config['num_tag_close']    = '</li>';
        $config['prev_link']        = '&laquo;';
        $config['prev_tag_open']    = '<li>';
        $config['prev_tag_close']   = '</li>';
        $config['next_link']        = '&raquo;';
        $config['next_tag_open']    = '<li>';
        $config['next_tag_close']   = '</li>';
        
        $this->pagination->initialize($config);
       // $data['field'] = $field;
       // $data['by'] = $by;
 		$data['listings']   = $this->Master_model->get_list('tbl_mst_doctor', false, $config['per_page'], $page);
        $data['page_links'] = $this->pagination->create_links();
        
		$this->load->view('header', $data);
		$this->load->view('doctors',$data);
		$this->load->view('footer', $data);
  }
  
  public function get_medicines($keyword){
    echo json_encode($this->Master_model->get_medicines_list($keyword));
  }

}
