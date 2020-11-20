<!--?php
require_once('../logic/connector.php');
$sql = "select * from student";
$res =$conn->query($sql);
// query products
$num =$res->num_rows;
//echo $num;
if($res->num_rows>0){
	$products_arr=array();
    $products_arr["records"]=array();
	
	while($row=$res->fetch_assoc()){
		 extract($row);
        $product_item=array(
            "id" => $id,
            "first name" => $fname,
            "sir name" => $sirname,
			"othernaem" => $othername,
            "admission number" => $admno,
			"dob" => $dob,
			"gender" =>$gender,
			"class" => $class,
			"stream" => $stream,
            "email" => $email,
			"phone" => $phone,
			"county" => $county
        );
  
        array_push($products_arr["records"], $product_item);
	}
	echo json_encode($products_arr);
}
 /*if(mysqli_num_rows($result)>0){
 $row = mysqli_fetch_array($result);
 $amount = $row['id'];
 $response_code = $row['fname'];
 $response_desc = $row['sirname'];
 response($amount, $response_code,$response_desc);
 //mysqli_close($con);
 }else{
 response(NULL, NULL, 200,"No Record Found");
 }
 function response($amount,$response_code,$response_desc){
 $response['amount'] = $amount;
 $response['response_code'] = $response_code;
 $response['response_desc'] = $response_desc;
 
 $json_response = json_encode($response);
 echo $json_response;
}*/
?-->
<!--?php
	require_once('../logic/connector.php');
	$sql = "select * from student";
	$result = $conn->query($sql);
	if($result->num_rows>0){
		$products_arr=array();
    $products_arr["records"]=array();
	
	while($row=$result->fetch_assoc()){
		 extract($row);
        $product_item=array(
            "id" => $id,
            "first name" => $fname,
            "sir name" => $sirname,
			"othernaem" => $othername,
            "admission number" => $admno,
			"dob" => $dob,
			"gender" =>$gender,
			"class" => $class,
			"stream" => $stream,
            "email" => $email,
			"phone" => $phone,
			"county" => $county
        );
  
        array_push($products_arr["records"], $product_item);
	}
	echo json_encode($products_arr);
	}
	
	
?-->
<!--?php
require_once('../logic/connector.php');
$sql="SELECT * FROM student";
$result=mysqli_query($conn,$sql);
$check=mysqli_fetch_array($result);
    if(isset($check)){
        
        $Results[0]="Present";
        $Results[1]=$check['id'];
        $Results[2]=$check['fname'];
        /*$Results[3]=$check['date'];
        $Results[4]=$check['time'];
        $Results[5]=$check['brought_by'];
        $Results[6]=$check['uniform_status'];
        $Results[7]=$check['personal_items_status'];
        $Results[8]=$check['comment'];
        $Results[9]=$check['sign_out_teacher'];
        $Results[10]=$check['sign_out_time'];
        $Results[11]=$check['taken_by'];
        $Results[12]=$check['sign_out_uniform_status'];
        $Results[13]=$check['sign_out_personal_items_status'];
        $Results[14]=$check['sign_out_comments'];*/
        
        echo json_encode(['Attendance'=>$Results]); 
    }else{
         $Results[0]="Absent";
         echo json_encode(['Attendance'=>$Results]); 
    }
?-->
<!--?php
include('../logic/connector.php');
/*if(isset($_GET['admission_no']) && isset($_GET['exam_name'])){
        $admission_no=$_GET['admission_no'];
        $exam_name=$_GET['exam_name'];
    }*/

$sql="SELECT * FROM student";
$result=mysqli_query($conn,$sql);
$count=mysqli_num_rows($result);
$rows=array();
if($count>0){
    
while($data=mysqli_fetch_assoc($result)){
    $rows[]=$data; 
}
//print json_encode(["Results"=>$rows]);
//print json_encode($rows);
  
}else{
    echo "sorry";
}
$ro =  json_encode($rows);
$daat =  json_decode($ro,true);
print $daat[0]["id"];
print $ro;
?-->
<html>
	<head></head>
	<body>
		<h2 style="background:green">this is the new bla bla</h2>
	</body>
</html>
<?php
	require('../logic/connector.php');
	$fname = $_GET['fname'];
	$sql = "select * from student where fname='$fname'";
	$res = $conn->query($sql);
	if($res->num_rows>0){
		while($row=$res->fetch_assoc()){
			echo $row['id'];
			echo $row['fname'];
		}
	}
?>