<?php
include_once('../../php/db.php');
if(!isset($_SESSION[''])){
    session_start();
}

$query = 'SELECT * FROM `athlete` WHERE paymentStatus IN (0,3,4) AND regType=3';
$result = mysqli_query($con, $query);
$output = '';
if(mysqli_num_rows($result) != 0){
  while($row = mysqli_fetch_array($result)){
    $athleteId = $row['athleteId'];
    $athleteCode = $row['athleteCode'];
    $clubIdCode = $athleteCode.$athleteId;
    $affiliationCat = $row['affiliationCat'];
    $athleteName = $row['athleteName'];
    $nic = $row['nic'];
    $email = $row['email'];
    $phone1 = $row['phone1'];
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
    if($affiliationCat == 1){
        $affiliationCat = "Swimming";
    } else if($affiliationCat == 2) {
        $affiliationCat = "Artistic Swimming";
    } else if($affiliationCat == 3) {
        $affiliationCat = "Water Polo";
    } else if($affiliationCat == 4) {
        $affiliationCat = "Diving";
    }
    $output .= '<tr>
                <td class="txt-oflo"><input type="checkbox" id="editAthlete[]" name="editAthlete[]" value="'.$athleteId.'"></td>
                <td class="txt-oflo">'.$clubIdCode.'</td>
                <td class="txt-oflo">'.$athleteName.'</td>
                <td class="txt-oflo">'.$nic.'</td>
                <td class="txt-oflo">'.$phone1.'</td>
                <td class="txt-oflo">'.$email.'</td>
                <td class="txt-oflo">'.$affiliationCat.'</td>
                <td class="txt-oflo">'.$paymentStatus.'</td>
                <td class="txt-oflo">
                    <form role="form" method="post" action="viewAthlete.php">
                        <input type="hidden" name="id" id="id" value="'.$athleteId.'"></input>
                        <input style="float:right;" type="submit" name="submit" value="Invoice" id="submit" class="btn btn-info" style="margin: auto;">
                        </input>
                    </form>
                </td>
            </tr>';
  }
} else {
 $output .= '
 <tr>
  <td colspan="12" align="center">No Not Paid Athletes.</td>
 </tr>
 ';
}
echo $output;
?>