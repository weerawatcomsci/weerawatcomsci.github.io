<?php
function dbcon(){
  $server='148.72.232.174:3306';
	$user='Notkak199412';
	$pass='0959518332';
	$dbname='findhouse';
	return new mysqli($server,$user,$pass,$dbname);
}
 $db = dbcon();
  echo "<pre>";var_export($db);exit();
 $sqlstr="SELECT *FROM property
 INNER JOIN address ON address.address_id = property.address_id
  INNER JOIN user ON user.user_id = property.user_id";
 $query=$db->query($sqlstr);
 // echo "<pre>";var_export($query);exit();
 $result ['property'] = [];
 while ( $row = $query->fetch_assoc()) {
  //  echo "<pre>";var_export($row['Image']);exit();
  $result2['property_id'] = $row['property_id'];
  $result2['contact'] = $row['first_name']." ".$row['last_name'];
  $result2['propertyname'] = $row['propertyname'];
  $result2['location'] = $row['house']." ".$row['number']." ".$row['road']." ".$row['subdistrict']." ".$row['district']." ".$row['province']." ".$row['zipcode'];
  $result2['status'] = $row['proptype'];
  $result2['price'] = $row['price'];
  $result2['description'] = $row['detail'];
  $result2['activation'] = $row['activation'];
  $result2['img1'] = "http://192.168.25.2:8181/FindHouse/".$row['img1'];
  $result2['img2'] = "http://192.168.25.2:8181/FindHouse/".$row['img2'];
  $result2['img3'] = "http://192.168.25.2:8181/FindHouse/".$row['img3'];
  $result2['img4'] = "http://192.168.25.2:8181/FindHouse/".$row['img4'];
  $result2['img5'] = "http://192.168.25.2:8181/FindHouse/".$row['img5'];
  $result2['lat'] = $row['lat'];
  $result2['lng'] = $row['lng'];
  array_push($result['property'],$result2);
 // 	array_push($result['property'], "http://192.168.25.2:8181/FindHouse/".$row['Image']);
 }
header('Content-Type: application/json;charset=utf-8');
 // $test['users']= $result;
 echo json_encode($result);
//$con goes here
    // $result=$db->query("SELECT * FROM property");
    // $response["property"] = array();
    //
    //     while($row = $result->fetch_assoc())    {
    //
    //         $stuff= array();
    //
    //         /* ADD THE TABLE COLUMNS TO THE JSON OBJECT CONTENTS */
    //         $stuff["property_id"] = $row['property_id'];
    //         array_push($response["property"], $stuff);
    //
    //         // $response[] = $row;
    //     }
    //     // success
    //     $response["success"] = 1;
    //     echo(json_encode($response));
    //
    //
    // /* CLOSE THE CONNECTION */
    // mysqli_close($db);
?>
