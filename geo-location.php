<?php
mysql_connect('startrishta.db.10691417.hostedresource.com' , 'startrishta' , 'St#A!r@1T32');
mysql_select_db('startrishta');

$query=mysql_query("SELECT * FROM  sr_users where location_lat!='' and location_lon!=''");

while($result=mysql_fetch_assoc($query)){
	
	$city='';
	$country='';
	$location_lat=$result['location_lat'];
	$location_lon=$result['location_lon'];
	$user_id=$result['user_id'];
		
	$geocode=file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?latlng='.$location_lat.','.$location_lon.'&sensor=false');
    $output= json_decode($geocode);
	for($j=0;$j<count($output->results[0]->address_components);$j++){
			if($output->results[0]->address_components[$j]->types[0] == 'locality'){
				$city = $output->results[0]->address_components[$j]->long_name;
			}
			if($output->results[0]->address_components[$j]->types[0] == 'country'){
				$country = $output->results[0]->address_components[$j]->long_name;
			}
        }
		
		mysql_query("UPDATE sr_users SET city = '".$city."' ,country = '".$country."' where user_id='".$user_id."' ");
	
   echo "<hr/><br/>";
}			
			
			// echo '<b>'.$output->results[0]->address_components[4]->types[0].': </b>  '.$output->results[0]->address_components[4]->long_name.'<br/>';
			// echo '<b>'.$output->results[0]->address_components[7]->types[0].': </b>  '.$output->results[0]->address_components[7]->long_name.'<br/>';

			
/*$geocode=file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?latlng=48.283273,14.295041&sensor=false');

        $output= json_decode($geocode);

    for($j=0;$j<count($output->results[0]->address_components);$j++){
                echo '<b>'.$output->results[0]->address_components[$j]->types[0].': </b>  '.$output->results[0]->address_components[$j]->long_name.'<br/>';
            }*/			
?>