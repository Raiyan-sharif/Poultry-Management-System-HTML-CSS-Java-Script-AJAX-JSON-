<?php
require("db_rw.php");

$i = 0;

$jsonData= getJSONFromDB("select * from user");

$jsn=json_decode($jsonData);
for($i=0;$i<sizeof($jsn);$i++){
	if(trim($_REQUEST['email']) == trim($jsn[$i]->Email)){
		$i = 1;
		break;
	}
}
if($i==1){
	echo "";
	$i = 0;
}
else{
	echo "The mail donot exist";
}

?>