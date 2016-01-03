<?php

	header("Content-Type : application/json");
	
	function get_price($find)
	{
		$mobiles = array(
			"windows"=>25000,
			"apple"=>40000,
			"samsung"=>15000
		);
		
		foreach($mobiles as $mobile=>$price)
		{
			if($mobile == $find)
			{
				return $price;
				break;	
			}	
		}	
	}
	
	function deliver_response($status, $status_message, $data)
	{
		header("HTTP/1.1 $status $status_message");
		
		$response['status'] = $status;
		$response['status_message'] = $status_message;
		$response['data'] = $data;
		
		$json_response = json_encode($response);
		echo $json_response;	
	}
	
	if(!empty($_GET['name']))
	{
		$name = $_GET['name'];
		$price = get_price($name);
		
		if(empty($price))
			deliver_response(200, "Mobile NOT found!", NULL);
		else
			deliver_response(200, "Mobile found!", $price);
	}
	else
		deliver_response(404, "Invalid Request!", NULL);

?>