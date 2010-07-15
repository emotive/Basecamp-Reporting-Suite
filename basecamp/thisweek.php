<LINK REL=StyleSheet HREF="style.css" TYPE="text/css" MEDIA=screen>



<?php 

// show errors
error_reporting(E_ALL);
ini_set('display_errors', '1');


	
// create connection	
require('config.inc');


?>


<h1>Hours This Week</h1>
<?php

$startdate = date('Y-m-d', mktime(1, 0, 0, date('m'), date('d')-date('w'), date('Y')));
$enddate = date('Y-m-d', mktime(1, 0, 0, date('m'), date('d')-date('w')+6, date('Y')));

echo "<h3>".$startdate." - ".$enddate."</h3>";

// Declare company hours variable

$companyhours = 0;
$totalemployees = 0;

// get all of the company employees
$response = $bc->getPeople();


    foreach($response['body']->person as $person)
    
    	if ($person->{'company-id'} == $company_id) {    
      		
			$totalhours = 0;

			// Get last week hours
			$response_hours = $bc->getTimeEntryReport($from=$startdate, $to=$enddate);
			//print_r($response);

			foreach($response_hours['body']->{'time-entry'} as $time) {
	
				if ((int)$time->{'person-id'} == (int)$person->{'id'}) {
				
					// total up the hours
					$totalhours = $totalhours + (float)$time->{'hours'};
	
				}
	
			}

			// print the total
			echo "<div class='person'>";
      		echo $person->{'first-name'}." ".$person->{'last-name'}."<br><span class='number'>".round($totalhours,2)."</span><br><span class='summary'>".round(($totalhours/($business_hours*$work_days)*100),1)."% complete</span>";
      		echo "</div>";
      		
      		// add up the company hours
      		$companyhours = $companyhours + $totalhours;
			$totalemployees = $totalemployees + 1;

		}

// Display company hours

echo "<div class='company'>";
echo "company total<br><span class='number'>".round($companyhours,2)."</span><br><span class='summary'>".round(($companyhours/($business_hours*$work_days*$totalemployees)*100),1)."% complete</span>";
echo "</div>";


?>
