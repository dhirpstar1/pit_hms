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