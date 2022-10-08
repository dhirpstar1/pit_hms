<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('get_year_code'))
{
    function get_year_code()
    {
		$CI = get_instance();
		$CI->load->model('Master_model');
		return $CI->Master_model->get_year_code();
    }   
}
if ( ! function_exists('get_current_iptno'))
{
    function get_current_iptno()
    {
		$CI = get_instance();
		$CI->load->model('Master_model');
		return $CI->Master_model->get_current_iptno();
    }   
}
function dateDiff($start, $end) {
//$start = DateTime::createFromFormat('d/m/Y', $start);
//$end = DateTime::createFromFormat('d/m/Y', $end);
  //$start_ts = strtotime($start->format('Y-m-d'));
  $start_ts = strtotime($start);
  $end_ts = strtotime($end);
  $diff = $end_ts - $start_ts;
  return round($diff / 86400);
}
function array_unshift_ref($array, $value)
{
   $array[0] = $value;
   return array_reverse($array, true);
}

function nested2ul($data) {
  $newdata = array();
  $new_data = array();
  if (sizeof($data) > 0) {
    foreach ($data as $entry) {
      if($entry->PARENT > 0){
        $newdata[] = $entry;
      }
    }

    
    foreach ($data as $entry) {
      if($entry->PARENT == 0 && $entry->CHILD == 0){
        $new_data['OTHERS'][] = $entry;
      }
    }
    //return $data; 
    foreach ($newdata as $entry) {
      foreach ($data as $entrychild) {
        if($entry->PARENT === $entrychild->CHILD)
          {
            $new_data[$entry->FNAME][] = $entrychild;  
          }else{
            //$new_data[] = $entrychild;  
          } 
        } 
      }
    }
    
    //print('<pre>');
//print_r($new_data); exit;
  return $new_data;
}
function dateFormat($date){
	$date = DateTime::createFromFormat('Y-m-d h:i:s', $date);
	return $date->format('d/m/Y');
}
function get_database_date($date){
	$date = DateTime::createFromFormat('d/m/Y', $date);
	return $date->format('Y-m-d h:i:s');
}