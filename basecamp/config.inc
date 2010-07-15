<?php
	require('inc/Basecamp.class.php');
    
    // Enter your basecamp URL, login and password
    $bc = new Basecamp('https://YOURCOMPANY.basecamphq.com/','YOURLOGIN','YOURPASS','simplexml');
    
    // Enter your ID# for your company (can be found in Basecamp)
    $company_id = 0000000;
   
   	// Set your business rules (hours in a work day and number of work days a week)
   	$business_hours = 8;
   	$work_days = 5;
?>