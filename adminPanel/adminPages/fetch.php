<?php

//fetch.php

include_once('../../php/db.php');
if(!isset($_SESSION[''])){
    session_start();
}

if($_POST["query"] != '') {
 $search_text = $_POST["query"];
 $query = 'SELECT * FROM `athlete` WHERE affiliationCat="'.$search_text.'"';
} else {
 $query = 'SELECT * FROM `athlete`';
}
$result = mysqli_query($con, $query);
$output = '';
if(mysqli_num_rows($result) != 0){
  while($row = mysqli_fetch_array($result)){
    $athleteId = $row['athleteId'];
    $clubId = $row['clubId'];
    $athleteCode = $row['athleteCode'];
    $clubIdCode = $athleteCode.$athleteId;
    $affiliationCat = $row['affiliationCat'];
    $athleteName = $row['athleteName'];
    $nic = $row['nic'];
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
    $paymentStatus = $row['paymentStatus'];
    if($paymentStatus == 1){
        $paymentStatus = "Pending";
    } else if($paymentStatus == 2) {
        $paymentStatus = "Approved";
    } else if($paymentStatus == 3) {
        $paymentStatus = "Rejected";
    } else if($paymentStatus == 4) {
        $paymentStatus = "To Be Renewed";
    }else {
        $paymentStatus = "Not Paid";
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
    <td class="txt-oflo">'.$clubIdCode.'</td>
                <td class="txt-oflo">'.$clubName.'</td>
                <td class="txt-oflo">'.$athleteName.'</td>
                <td class="txt-oflo">'.$phone1.'</td>
                <td class="txt-oflo">'.$email.'</td>
                <td class="txt-oflo">'.$affiliationCat.'</td>
                <td class="txt-oflo">'.$paymentStatus.'</td>
                <td class="txt-oflo">
                    <form role="form" method="post" action="viewAthlete.php">
                        <input type="hidden" name="id" id="id" value="'.$athleteId.'"></input>
                        <input style="float:right;" type="submit" name="submit" value="View" id="submit" class="btn btn-info" style="margin: auto;">
                        </input>
                    </form>
                </td>
                <td class="txt-oflo">
                    <form role="form" method="post" action="editAthlete.php">
                        <input type="hidden" name="id" id="id" value="'.$athleteId.'"></input>
                        <input style="float:right;" type="submit" name="submit" value="Edit" id="submit" class="btn btn-success" style="margin: auto;">
                        </input>
                    </form>
                </td>
                <td class="txt-oflo">
                    <form role="form" method="post" action="deleteAthlete.php">
                        <input type="hidden" name="delete" id="delete" value="'.$athleteId.'"></input>
                        <input style="float:right;" onclick="return clicked();" type="submit" name="submit" value="Delete" id="submit" class="btn btn-danger" style="margin: auto;">
                        </input>
                    </form>
                </td>
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