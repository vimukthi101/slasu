<?php
include_once('db.php');
if(!isset($_SESSION[''])){
    session_start();
}

if($_POST["query"] != '') {
    $search_text = $_POST["query"];
    if($search_text == -1){
        $query = 'SELECT * FROM `coach` WHERE paymentStatus="2"';
    } else {
        $query = 'SELECT * FROM `coach` WHERE paymentStatus="2" AND clubId="'.$search_text.'"';
    }
} else {
    $query = 'SELECT * FROM `coach` WHERE paymentStatus="2"';
}
$result = mysqli_query($con, $query);
$output = '';
$i=0;
if(mysqli_num_rows($result) != 0){
  while($row = mysqli_fetch_array($result)){
    $i++;
    $athleteId = $row['coachId'];
    $clubId = $row['clubId'];
    $coachCode = $row['coachCode'];
    $clubIdCode = $coachCode.$athleteId;
    $affiliationCat = $row['affiliationCat'];
    $athleteName = $row['coachName'];
    $nic = $row['nic'];
    $email = $row['coachEmail'];
    $phone1 = $row['coachMobileOne'];
    $gender = $row['gender'];
    $photoForId = $row['photoForId'];
    if($gender == 1){
        $gender = "Male";
    } else {
        $gender = "Female";
    }
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
                <td>'.$i.'</td>
                <td>'.$clubIdCode.'</td>
                <td>'.$athleteName.'</td>
                <td>'.$gender.'</td>
                <td>'.$affiliationCat.'</td>
                <td>'.$phone1.'</td>
                <td>'.$clubName.'</td>
                <td><img width="100" height="100" src="data:image/jpeg;base64,'.base64_encode($photoForId).'"/></td>
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