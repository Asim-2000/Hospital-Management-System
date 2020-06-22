<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$con = mysqli_connect("localhost", "root","","hmsdb");

/*

*/

if(isset($_POST['admin_login'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
	$query = "select * from admin where admin_username = '$username' and admin_password = '$password'";
	$result = mysqli_query($con, $query);
	if(mysqli_num_rows($result)==1){
		header("Location:../../pages/administrator/dashboard.php");
	}
	else{
		echo "<script> alert('Incorrect Username or Password Entered.') </script>";
		echo "<script> window.open('../../index.php','_self')</script>";
	}
}

if(isset($_POST['doc_login'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
	$query = "select * from doctor where doc_username = '$username' and doc_password = '$password'";
	$result = mysqli_query($con, $query);
	if(mysqli_num_rows($result)==1){
		while($row = mysqli_fetch_array($result)){
			$_SESSION['docid'] = $row['doc_id'];
		}
		header("Location:../../pages/doctor/dashboard.php");	
	}
	else{
		echo "<script> alert('Incorrect Username or Password Entered.') </script>";
		echo "<script> window.open('../../index.php','_self')</script>";
	}
	
}
if(isset($_POST['phar_login'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
	$query = "select * from pharmacist where phar_username = '$username' and phar_password = '$password'";
	$result = mysqli_query($con, $query);
	if(mysqli_num_rows($result)==1){
		header("Location:../../pages/pharmacist/dashboard.php");
	}
	else{
		echo "<script> alert('Incorrect Username or Password Entered.') </script>";
		echo "<script> window.open('../../index.php','_self')</script>";
	}
}

/*

*/

if( isset($_POST['doc_pat_register'])){
	$fname =$_POST['fname'];
	$lname =$_POST['lname'];
	$email =$_POST['email'];
	$contact =$_POST['contact'];
	$gender =$_POST['gender'];
	$bdgroup =$_POST['bdgroup'];
	$docapp =$_POST['docapp'];
	$query = "insert into patient(patient_fname, patient_lname, patient_email, patient_contact, patient_gender, patient_bg,doc_id) values ('$fname','$lname','$email','$contact','$gender','$bdgroup','$docapp')";
	$result = mysqli_query($con,$query);
	if($result){
		echo "<script> alert('Patient Registered') </script>";
		echo "<script> window.open('../../pages/doctor/add_patient.php','_self')</script>";
	}
	else{
		echo "<script> alert('Error') </script>";
		echo "<script> window.open('../../pages/doctor/add_patient.php','_self')</script>";
	
	}

}

if( isset($_POST['admin_pat_register'])){
	$fname =$_POST['fname'];
	$lname =$_POST['lname'];
	$email =$_POST['email'];
	$contact =$_POST['contact'];
	$gender =$_POST['gender'];
	$bdgroup =$_POST['bdgroup'];
	$docapp =$_POST['docapp'];
	$query = "insert into patient(patient_fname, patient_lname, patient_email, patient_contact, patient_gender, patient_bg,doc_id) values ('$fname','$lname','$email','$contact','$gender','$bdgroup',(SELECT doc_id FROM doctor WHERE doc_fname = '$docapp'))";
	$result = mysqli_query($con,$query);
	if($result){
		echo "<script> alert('Patient Registered') </script>";
		echo "<script> window.open('../../pages/administrator/add_patient.php','_self')</script>";
	}
	else{
		echo "<script> alert('Error') </script>";
		 echo "<script> window.open('../../pages/administrator/add_patient.php','_self')</script>";
	}

}

if( isset($_POST['doc_register'])){
	$username =$_POST['username'];
	$password =$_POST['password'];
	$fname =$_POST['fname'];
	$lname =$_POST['lname'];
	$email =$_POST['email'];
	$contact =$_POST['contact'];
	$qualif =$_POST['qualification'];
	$gender =$_POST['gender'];
	$query = "insert into doctor(doc_username,doc_password,doc_fname, doc_lname, doc_email, doc_contact, doc_gender, doc_qualification) values ('$username','$password','$fname','$lname','$email','$contact','$gender','$qualif')";
	$result = mysqli_query($con,$query);
	if($result){
		echo "<script> alert('Doctor Registered') </script>
		<script> window.open('../../pages/administrator/add_doctor.php','_self')</script>
		";
	}
	else{
		
		echo "<script> alert('Error') </script>";
		echo "$con->error";

	}

}

if( isset($_POST['phar_register'])){
	$username =$_POST['username'];
	$password =$_POST['password'];
	$fname =$_POST['fname'];
	$lname =$_POST['lname'];
	$email =$_POST['email'];
	$contact =$_POST['contact'];
	$query = "insert into pharmacist(phar_username,phar_password,phar_fname, phar_lname, phar_email, phar_contact) values ('$username','$password','$fname','$lname','$email','$contact')";
	$result = mysqli_query($con,$query);
	if($result){
		echo "<script> alert('Pharmacist Registered') </script>";
		echo "<script> window.open('../../pages/administrator/add_pharmacist.php','_self')</script>";
	}
	else{
		echo "<script> alert('Error') </script>";
		 echo "$con->error";
	}

}

if( isset($_POST['med_register'])){
	$name =$_POST['name'];
	$type =$_POST['type'];
	$cost =$_POST['cost'];
	$sale =$_POST['sale'];
	$supplier =$_POST['supplier'];
	$query = "insert into medicine(medicine_name,medicine_type,medicine_cost, medicine_sale, company_id)values ('$name','$type','$cost','$sale', (select company_id from company where company_name = '$supplier'))";
	$result = mysqli_query($con,$query);
	if($result){
		echo "<script> alert('Medicine Registered') </script>";
		echo "<script> window.open('../../pages/pharmacist/add_medicine.php','_self')</script>";
	}
	else{
		echo $con->error;
		// echo "<script> alert('Error') </script>
		// <script> window.open('../../pages/pharmacist/add_medicine.php'</script>";
	}

}

if( isset($_POST['com_register'])){
	$name =$_POST['name'];
	$type =$_POST['description'];
	$contact =$_POST['contact'];
	$address =$_POST['address'];
	$query = "insert into company(company_name,company_description,company_contact,company_address)values ('$name','$type','$contact','$address')";
	$result = mysqli_query($con,$query);
	if($result){
		echo "<script> alert('Supplier Registered') </script>";
		echo "<script> window.open('../../pages/pharmacist/add_company.php','_self')</script>";
	}
	else{
		echo "<script> alert('Error') </script>";
		 echo "
		 <script> window.open('../../pages/pharmacist/add_company.php'</script>";
	}

}

if( isset($_POST['shipment_register'])){
	$medicine_name =$_POST['medicine_name'];
	$medicine_quantity =$_POST['medicine_quantity'];
	$shipment_date =$_POST['shipment_date'];
	$query = " insert into inventory (medicine_id,company_id,inventory_medquantity,inventory_shipdate)  values ((select medicine_id from medicine where medicine_name = '$medicine_name'),(select company_id from medicine where medicine_name = '$medicine_name'),'$medicine_quantity','$shipment_date') ";
	
	$query2 = " UPDATE medicine SET medicine.medicine_quantity = medicine.medicine_quantity + '$medicine_quantity' where medicine.medicine_id = (select inventory.medicine_id from inventory where inventory_shipdate = '$shipment_date') "; 

	$result = mysqli_query($con,$query);
	$result2 = mysqli_query($con,$query2);
	if($result2){
		echo "<script> alert('Shipment Registered') </script>";
		echo "<script> window.open('../../pages/pharmacist/add_inventory.php','_self')</script>";
	}
	else{
		echo "<script> alert('Shipment already in record') </script>";
		echo "<script> window.open('../../pages/pharmacist/add_inventory.php','_self')</script>";
	}
}

/*

*/

if( isset($_POST['update_admin'])){
	$username =$_POST['username'];
	$password =$_POST['password'];
	$confirmpassword=$_POST['confirmpassword'];
	$fname =$_POST['fname'];
	$lname =$_POST['lname'];
	$email =$_POST['email'];
	$contact =$_POST['contact'];
	if ($password==$confirmpassword){
		$query = "UPDATE admin SET admin_username='$username',admin_fname='$fname',admin_lname='$lname',  admin_password='$password', admin_contact='$contact', admin_email='$email' WHERE admin_id=1;";
		$result = mysqli_query($con,$query);
	}
    else{
		echo "<script> alert('Password Missmatch') </script>";
		echo "$con->error";
	}
	if($result){
		echo "<script> alert('Admin Info Updated') </script>";
		echo "<script> window.open('../../pages/administrator/user.php','_self')</script>";
		}
	else{
		echo "<script> window.open('../../pages/administrator/user.php','_self')</script>";
	}
}

if( isset($_POST['update_phar'])){
	$username =$_POST['username'];
	$password =$_POST['password'];
	$confirmpassword=$_POST['confirmpassword'];
	$fname =$_POST['fname'];
	$lname =$_POST['lname'];
	$email =$_POST['email'];
	$contact =$_POST['contact'];
	if ($password==$confirmpassword){
		$query = "UPDATE pharmacist SET phar_username='$username',phar_fname='$fname',phar_lname='$lname',  phar_password='$password', phar_contact='$contact', phar_email='$email' WHERE phar_id=1;";
		$result = mysqli_query($con,$query);
	}
    else{
		echo "<script> alert('Password Missmatch') </script>";
		echo "$con->error";
	}
	if($result){
		echo "<script> alert('Pharmacist Info Updated') </script>";
		echo "<script> window.open('../../pages/pharmacist/user.php','_self')</script>";
		}
	else{
		echo "<script> window.open('../../pages/pharmacist/user.php','_self')</script>";
	}
}

if( isset($_POST['update_doc'])){
	$username =$_POST['username'];
	$password =$_POST['password'];
	$confirmpassword=$_POST['confirmpassword'];
	$fname =$_POST['fname'];
	$lname =$_POST['lname'];
	$email =$_POST['email'];
	$contact =$_POST['contact'];
	if ($password==$confirmpassword){
		$query = "UPDATE doctor SET doc_username='$username',doc_fname='$fname',doc_lname='$lname',  doc_password='$password', doc_contact='$contact', doc_email='$email' WHERE doc_id=1;";
		$result = mysqli_query($con,$query);
	}
    else{
		echo "<script> alert('Password Missmatch') </script>";
		echo "$con->error";
	}
	if($result){
		echo "<script> alert('Doctor Info Updated') </script>";
		echo "<script> window.open('../../pages/Doctor/user.php','_self')</script>";
		}
	else{
		echo "<script> window.open('../../pages/Doctor/user.php','_self')</script>";
	}

}

/*

*/

if(isset($_POST['prescribe_btn'])){
	$pid =$_POST['patient_id'];
	$medid =$_POST['med_id'];
	$medquantity =$_POST['med_quantity'];
	$query = "insert into prescription(patient_id,medicine_id,medicine_quantity) values ('$pid',(select medicine_id from medicine where medicine_name = '$medid'),'$medquantity')";
	$result = mysqli_query($con, $query);
	if($result){
		echo "<script> alert('Prescription Registered') </script>";
		echo "<script> window.open('../../pages/doctor/add_prescription.php','_self')</script>";
	}
	else{
		echo "<script> alert('Error') </script>";
		 echo "$con->error
		 <script> window.open('../../pages/doctor/add_prescription.php'</script>";
	}

}

if(isset($_POST['viewbtn'])){
	$pid =$_POST['pid'];
	$query = "
	SELECT patient_fname, patient_lname, SUM(prescription.medicine_quantity*medicine_sale) as patientbill 
	FROM prescription join medicine using (medicine_id) join patient using (patient_id)
	WHERE medicine_id in (SELECT medicine_id FROM prescription WHERE patient_id= '$pid')
	";
	$result = mysqli_query($con, $query);
	if($result){
		while($row= mysqli_fetch_array($result)){
			$pf = $row['patient_fname'];
			$pl = $row['patient_lname'];
			$pb = $row['patientbill'];
		}
		$_SESSION['fname']= $pf;
		$_SESSION['pb']=  $pb;
		$_SESSION['lname']=  $pl;
	 	echo "<script> window.open('../../pages/pharmacist/view_bill.php','_self')</script>";
	 }
	else{
		echo "<script> window.open('../../pages/pharmacist/view_bill.php','_self')</script>";
	}

}

if(isset($_POST['paybtn'])){
	$pid = $_POST['pid'];
	$query = " UPDATE medicine,prescription
	SET medicine.medicine_quantity = medicine.medicine_quantity-prescription.medicine_quantity
	WHERE medicine.medicine_id in (SELECT medicine_id from prescription WHERE patient_id='$pid');";

	$result = mysqli_query($con, $query); 
	if($result){
			unset ($_SESSION['pfname']);
			unset ($_SESSION['plname']);
			unset ($_SESSION['pbill']);
			
			$query2= "Delete from prescription where patient_id = '$pid' ";
			$result1 = mysqli_query($con, $query2);

			echo "<script> alert('Payment Updated')</script>";
			echo "<script> window.open('../../pages/pharmacist/view_bill.php','_self')</script>";
	}
	else{
		echo "<script> alert('Transaction Failed')</script>";
		echo "<script> window.open('../../pages/pharmacist/view_bill.php','_self')</script>";
	}

}

/*

*/

function get_patient_details(){
	global $con;
	$query = "select patient.*, doc_fname from patient join doctor using (doc_id)";
	$result = mysqli_query($con, $query);
	while ($row=mysqli_fetch_array($result)) {
		$patientid1 =$row['patient_id'];
		$fname =$row['patient_fname'];
		$lname =$row['patient_lname'];
		$email =$row['patient_email'];
		$contact =$row['patient_contact'];
		$gender =$row['patient_gender'];
		$bg =$row['patient_bg'];
		$docapp =$row['doc_fname'];
		echo "<tr>
		<td>$patientid1</td>
		<td>$fname</td>
		<td>$lname</td>
		<td>$contact</td>
		<td>$email</td>
		<td>$gender</td>
		<td>$bg</td>
		<td>$docapp</td>
			</tr>";
	}
}


function get_doctor_details(){
	global $con;
	$query = "select * from doctor";
	$result = mysqli_query($con, $query);
	while ($row=mysqli_fetch_array($result)) {
		$docid1 = $row['doc_id'];
		$username =$row['doc_username'];
		$password =$row['doc_password'];
		$fname =$row['doc_fname'];
		$lname =$row['doc_lname'];
		$email =$row['doc_email'];
		$contact =$row['doc_contact'];
		$gender =$row['doc_gender'];
		$qualification =$row['doc_qualification'];
		echo "<tr>
		<td>$docid1</td>
		<td>$username</td>
		<td>$password</td>
		<td>$fname</td>
		<td>$lname</td>
		<td>$contact</td>
		<td>$email</td>
		<td>$gender</td>
		<td>$qualification</td>
			</tr>";
	}
}


function get_phar_details(){
	global $con;
	$query = "select * from pharmacist";
	$result = mysqli_query($con, $query);
	while ($row=mysqli_fetch_array($result)) {
		$pharid1 = $row['phar_id'];
		$username =$row['phar_username'];
		$password =$row['phar_password'];
		$fname =$row['phar_fname'];
		$lname =$row['phar_lname'];
		$email =$row['phar_email'];
		$contact =$row['phar_contact'];
		echo "<tr>
		<td>$pharid1</td>
		<td>$username</td>	
		<td>$password</td>
		<td>$fname</td>
		<td>$lname</td>
		<td>$email</td>
		<td>$contact</td>
			</tr>";
	}
}

function get_doc_patient_details($string){
	global $con;
	$query = "select patient.*, doc_fname from patient join doctor using (doc_id) where doc_id = '$string'";
	$result = mysqli_query($con, $query);
	while ($row=mysqli_fetch_array($result)) {
		$patientid = $row['patient_id'];
		$fname =$row['patient_fname'];
		$lname =$row['patient_lname'];
		$email =$row['patient_email'];
		$contact =$row['patient_contact'];
		$gender =$row['patient_gender'];
		$bg =$row['patient_bg'];
		$docapp =$row['doc_fname'];
		echo "<tr>
		<td>$patientid</td>
		<td>$fname</td>
		<td>$lname</td>
		<td>$email</td>
		<td>$contact</td>
		<td>$gender</td>
		<td>$bg</td>
		</tr>";
	}
}

function view_shipments(){
	global $con;
	$query = "select inventory_id,company_name,medicine_name,inventory_medquantity,(inventory_medquantity*medicine_cost) as inventory_medtotalcost,inventory_shipdate from inventory join company using (company_id) join
	medicine using (medicine_id)";
	$result = mysqli_query($con, $query);
	while ($row=mysqli_fetch_array($result)) {
		$inventory_id = $row['inventory_id'];
		$company_name =$row['company_name'];
		$medicine_name =$row['medicine_name'];
		$medicine_quantity =$row['inventory_medquantity'];
		$total_cost =$row['inventory_medtotalcost'] ;
		$shipment_date =$row['inventory_shipdate'];
		echo "<tr>
		<td>$inventory_id</td>
		<td>$company_name</td>
		<td>$medicine_name</td>
		<td>$medicine_quantity</td>
		<td>$total_cost</td>
		<td>$shipment_date</td>
		</tr>";
	}
}

function view_inventory(){
	global $con;
	$query = "select * from medicine";
	$result = mysqli_query($con, $query);
	while ($row=mysqli_fetch_array($result)) {
		$medicine_id =$row['medicine_id'];
		$medicine_name =$row['medicine_name'];
		$medicine_type =$row['medicine_type'];
		$medicine_cost =$row['medicine_cost'];
		$medicine_sale =$row['medicine_sale'];
		$medicine_quantity =$row['medicine_quantity'] ;
		echo "<tr>
		<td>$medicine_id</td>
		<td>$medicine_name</td>
		<td>$medicine_type</td>
		<td>$medicine_cost</td>
		<td>$medicine_sale</td>
		<td>$medicine_quantity</td>
		</tr>";
	}
}

/*

*/

function display_docs(){
	global $con;
	$query = "select * from doctor";
	$result = mysqli_query($con, $query);
	while($row = mysqli_fetch_array($result)){
		$name = $row["doc_fname"];
	    echo '<option value="'.$name.'">'.$name.'</option>';
	}
}

function display_pat_ids(){
	global $con;
	$query = "select patient_id from patient where patient_id in (select distinct patient_id from prescription);";
	$result = mysqli_query($con, $query);
	while($row = mysqli_fetch_array($result)){
		$name = $row["patient_id"];
	    echo '<option value="'.$name.'">'.$name.'</option>';
	}


}

function display_meds(){
	global $con;
	$query = "select * from medicine";
	$result = mysqli_query($con, $query);
	while($row = mysqli_fetch_array($result)){
		$name = $row["medicine_name"];
	    echo '<option value="'.$name.'">'.$name.'</option>';
	}
}

function display_comps(){
	global $con;
	$query = "select * from company";
	$result = mysqli_query($con, $query);
	while($row = mysqli_fetch_array($result)){
		$name = $row["company_name"];
	    echo '<option value="'.$name.'">'.$name.'</option>';
	}
}

function display_pat_id($doc_id){
	global $con;
	$query = "select patient_id from patient where doc_id = '$doc_id'";
	$result = mysqli_query($con, $query);
	while($row = mysqli_fetch_array($result)){
		$pat_id = $row["patient_id"];
	    echo '<option value="'.$pat_id.'">'.$pat_id.'</option>';
	}
}

/*

*/

function doc_count(){
	global $con;
	$query = "select count(*) as doc_count from doctor";
	$result = mysqli_query($con, $query);
	while($row = mysqli_fetch_array($result)){
		$count = $row["doc_count"];
	    echo $count;
	}
}

function pat_count(){
	global $con;
	$query = "select count(*) as pat_count from patient";
	$result = mysqli_query($con, $query);
	while($row = mysqli_fetch_array($result)){
		$count = $row["pat_count"];
	    echo $count;
	}
}

function phar_count(){
	global $con;
	$query = "select count(*) as phar_count from pharmacist";
	$result = mysqli_query($con, $query);
	while($row = mysqli_fetch_array($result)){
		$count = $row["phar_count"];
	    echo $count;
	}
}

function supplier_count(){
	global $con;
	$query = "select count(*) as supplier_count from company";
	$result = mysqli_query($con, $query);
	while($row = mysqli_fetch_array($result)){
		$count = $row["supplier_count"];
	    echo $count;
	}
}

function medquantity_count(){
	global $con;
	$query = "select sum(inventory_medquantity) as med_count from inventory group by medicine_id";
	$result = mysqli_query($con, $query);
	while($row = mysqli_fetch_array($result)){
		$count = $row["med_count"];
	    echo $count;
	}
}

function med_count(){
	global $con;
	$query = "select count(*) as med_count from medicine";
	$result = mysqli_query($con, $query);
	while($row = mysqli_fetch_array($result)){
		$count = $row["med_count"];
	    echo $count;
	}
}

function doc_pat_count($doc_id){
	global $con;
	$query = "select count(patient_id) as doc_pat_count from patient where doc_id = '$doc_id' group by doc_id";
	$result = mysqli_query($con, $query);
	while($row = mysqli_fetch_array($result)){
		$count = $row["doc_pat_count"];
	    echo $count;
	}
}

function doc_prescription_count($doc_id){
	global $con;
	$query = "select count(distinct patient_id) as prescription_count from prescription where patient_id in (select patient_id from patient where doc_id = '$doc_id')";
	$result = mysqli_query($con, $query);
	while($row = mysqli_fetch_array($result)){
		$count = $row["prescription_count"];
	    echo $count;
	}
}

function prescription_count(){
	global $con;
	$query = "select count(distinct patient_id) as prescription_count from prescription";
	$result = mysqli_query($con, $query);
	while($row = mysqli_fetch_array($result)){
		$count = $row["prescription_count"];
	    echo $count;
	}
}

function shipment_count(){
	global $con;
	$query = "select count(inventory_id) as inventory_count from inventory";
	$result = mysqli_query($con, $query);
	while($row = mysqli_fetch_array($result)){
		$count = $row["inventory_count"];
	    echo $count;
	}
}


?>
