<?php
ini_set('memory_limit', '-1');
include_once('db.php');
if(!isset($_SESSION[''])){
    session_start();
}

if($_POST["query"] != '') {
    $search_text = $_POST["query"];
    if($search_text == -1){
        $query = 'SELECT * FROM `athlete` WHERE paymentStatus="2"';
    } else {
        $query = 'SELECT * FROM `athlete` WHERE paymentStatus="2" AND clubId="'.$search_text.'"';
    }
} else {
    $query = 'SELECT * FROM `athlete` WHERE paymentStatus="2"';
}
$result = mysqli_query($con, $query);
$output = '';
$i=0;
if(mysqli_num_rows($result) != 0){
  while($row = mysqli_fetch_array($result)){
  	$i++;
    $athleteId = $row['athleteId'];
    $clubId = $row['clubId'];
    $athleteCode = $row['athleteCode'];
    $clubIdCode = $athleteCode.$athleteId;
    $affiliationCat = $row['affiliationCat'];
    $athleteName = $row['athleteName'];
    $nic = $row['nic'];
    $dob = $row['dob'];
    $gender = $row['gender'];
    if($gender == 1){
    	$gender = "Male";
    } else {
    	$gender = "Female";
    }
    $email = $row['email'];
    $phone1 = $row['phone1'];
    if($affiliationCat == 1){
        $affiliationCat = "Swimming";
    } else if($affiliationCat == 2) {
        $affiliationCat = "Artistic Swimming";
    } else if($affiliationCat == 3) {
        $affiliationCat = "Water Polo";
    } else if($affiliationCat == 4) {
        $affiliationCat = "Diving";
    }
    if($clubId != 0){
        $queryClub = "SELECT clubName FROM `club` WHERE clubId='".$clubId."'";
        $resultClub = mysqli_query($con, $queryClub);
        if(mysqli_num_rows($resultClub) != 0){
            while($rowClub = mysqli_fetch_array($resultClub)){
                $clubName = $rowClub['clubName'];
            }
        }
    } else {
        $clubName = "Unattached";
    }
    $output .= '<tr>
    			<td class="txt-oflo">'.$i.'</td>
    			<td class="txt-oflo">'.$clubIdCode.'</td>
                <td class="txt-oflo">'.$athleteName.'</td>
                <td class="txt-oflo">'.$gender.'</td>
                <td class="txt-oflo">'.$affiliationCat.'</td>
                <td class="txt-oflo">'.$dob.'</td>
                <td class="txt-oflo">'.$clubName.'</td>
            </tr>';
  }
} else {
 $output .= '
 <tr>
  <td colspan="12" align="center">No Data Found</td>
 </tr>
 ';
}
echo $output;
?>