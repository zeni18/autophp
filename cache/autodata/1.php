<?php

//generated by AutoPHP v0.1 @2016-06-07 21:32:07

return function($params = array()){

if(isset($params['id'])){
	if(!call_user_func_array(array(wei(), 'isAlpha'), array (
  0 => $params['id'],
))){
		return array('ret' => 10, 'msg' => 'id必须全为数字');
	}
	}else{
		return array('ret' => 10, 'msg' => 'id必须全为数字');
	}



	$ap_twM2K85r = str_replace('{id}', $params['id'], 'sdfs sfsf 这些措施地方舒服{id};');
	$rows_sql_data = wei()->db->fetchAll('select * from ap_auto_config;');


	return array('ret' => 0, 'data' => array(
		'nino12o' => addslashes($ap_twM2K85r),
		'sql_data' => $rows_sql_data,
	));
}

?>