<?php
	require('inc/Basecamp.class.php');
    
    // Enter your basecamp URL, login and password
    $bc = new Basecamp('https://emotivellc.basecamphq.com/','mbriney','emotive1','simplexml');
    
    // Enter your ID# for your company (can be found in Basecamp)
    $company_id = 1325254;
   
   	// Set your business rules (hours in a work day and number of work days a week)
   	$business_hours = 8;
   	$work_days = 5;
?>