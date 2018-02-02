<?php
include('config.php');
global $con;
$countryId = isset($_POST['countryId'])  ? $_POST['countryId'] : 0;
$stateId = isset($_POST['stateId'])  ? $_POST['stateId'] : 0;
$command = isset($_POST['get'])  ? $_POST['get'] : "";

switch($command){
case "country":
$statement = "SELECT country_id, country_name FROM countries";
$dt=mysqli_query($con,$statement);
while($result=mysqli_fetch_array($dt))
{
	echo $result1 = "<option value=".$result['country_id'].">" .$result['country_name']. "</option>";
}
break;

case "state":
$result1 ="<option>Select State</option>";
$statement = "SELECT state_id,state_name FROM states WHERE country_id=".$countryId;
$dt=mysqli_query($con,$statement);

while($result=mysqli_fetch_array($dt))
{
	 $result1 .= "<option value=".$result['state_id'].">" .$result['state_name']. "</option>";
}
echo $result1;
break;

case "city":
$result1 ="<option>Select City</option>";
$statement = "SELECT city_id, city_name FROM cities WHERE state_id=".$stateId;
$dt=mysqli_query($con,$statement);

while($result=mysqli_fetch_array($dt))
{
	 $result1 .= "<option value=".$result['city_id'].">" .$result['city_name']. "</option>";
}
echo $result1;
break;
}

exit();

?>