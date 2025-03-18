<?php 
	require 'education.php';
	$edu = new education;
	$edu->setId($_REQUEST['id']);
	$edu->setLat($_REQUEST['lat']);
	$edu->setLng($_REQUEST['lng']);
	$edu->setlink($_REQUEST['link']);##add to webisite link by sithu 24/1
	$status = $edu->updateCollegesWithLatLng();
	if($status == true) {
		echo "Updated...";
	} else {
		echo "Failed...";
	}
 ?> 