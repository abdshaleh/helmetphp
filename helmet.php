<?php

function input_analysis($all_data,$post_data,$url){

	$url_split=explode("?",$url);
	$param=$url_split[1];

//XSS protection (POST)


	foreach($post_data as $xss_check){
		if(preg_match("/[\/<>()]/",$xss_check) || preg_match("(%28|%23|%3c|%3e|%28|%29)i",$xss_check)){
			echo "xss";

			$post_xss=true;
			
		}
		else{
			$post_xss=false;
		}
		

	}

//SQLI protection (GET)


	$xss_check_url=$param;
	if(preg_match("/[\<>()]/",$xss_check_url) || preg_match("(%5C|%3C|%3E|%28|%29)i",$xss_check_url)){
			echo "xss";

			$get_xss=true;
			
		}
		else{
			$get_xss=false;
		}
		



//SQLI protection (GET)


	$sqli_check_url=$url;
	if(preg_match('/[\'"]/',$sqli_check_url) || preg_match('(select|from|order|schema|null)i',$sqli_check_url) || preg_match('(%22|%27)',$sqli_check_url)){
		$get_sqli=true;
		
	}
	else{
		$get_sqli=false;
		
	}


//SQLI protection (POST)


	foreach($post_data as $sqli_check){
		if(preg_match('/[\'")]/',$sqli_check) || preg_match('(select|from|order|schema|null)i',$sqli_check) || preg_match('(%22|%27)',$sqli_check)){
			echo "sqli";

			$post_sqli=true;
			
		}
		else{
			$post_sqli=false;
		}
		

	}

//LFI protection


		$lfi_check=$url;
		if(preg_match('/\.\.\//',$lfi_check) || preg_match('(etc|passwd)', $lfi_check) || preg_match('/\.\.%2F/i',$lfi_check)){
			$lfi=true;
			echo "lfi";
		}
		else{
			$lfi=false;
		}

}


	if($_REQUEST){
		input_analysis($_REQUEST,$_POST,$_SERVER['REQUEST_URI']);
	}
?>