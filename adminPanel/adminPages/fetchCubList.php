<?php
ini_set('memory_limit', '-1');
//fetch.php

include_once('../../php/db.php');
if(!isset($_SESSION[''])){
    session_start();
}

if($_POST["query"] != '') {
 $search_text = $_POST["query"];
 $query = 'SELECT * FROM `club` WHERE affiliationCat="'.$search_text.'"';
} else {
 $query = 'SELECT * FROM `club`';
}
$result = mysqli_query($con, $query);
$output = '';
if(mysqli_num_rows($result) != 0){
  while($row = mysqli_fetch_array($result)){
    $clubName = $row['clubName'];
    $clubId = $row['clubId'];
    $clubCode = $row['clubCode'];
    $clubIdCode = $clubCode.$clubId;
    $affiliationCat = $row['affiliationCat'];
    $athleteName = $row['operatorName'];
    $operatorMobile = $row['operatorMobile'];
    $clubContactOne = $row['clubContactOne'];
    $district = $row['district'];
    $status = $row['status'];
    if($affiliationCat == 1){
        $affiliationCat = "Ordinary Member (Colombo District)";
    } else if($affiliationCat == 2) {
        $affiliationCat = "Ordinary Member (Other Districts)";
    } else if($affiliationCat == 3) {
        $affiliationCat = "Novice Members";
    } else if($affiliationCat == 4) {
        $affiliationCat = "Participant Members (Govt./ Semi Govt. Schools)";
    } else if($affiliationCat == 5) {
        $affiliationCat = "Participant Members (International Schools and Ancillary Clubs)";
    }
    $paymentStatus = $row['affiliationFeeStatus'];
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
    $output .= '<tr>
                <td class="txt-oflo">'.$clubIdCode.'</td>
                <td class="txt-oflo">'.$clubName.'</td>
                <td class="txt-oflo">'.$affiliationCat.'</td>
                <td class="txt-oflo">'.$athleteName.'</td>
                <td class="txt-oflo">'.$operatorMobile.'</td>
                <td class="txt-oflo">'.$clubContactOne.'</td>
                <td class="txt-oflo">'.$paymentStatus.'</td>';
    if($status != 2){
        $output .= '<td class="txt-oflo">
            <form role="form" method="post" action="activate.php">
                <input type="hidden" name="id" id="id" value="'.$clubId.'"></input>
                <input style="float:right;" type="submit" name="submit" value="Activate" id="submit" class="btn btn-success" style="margin: auto;">
                </input>
            </form>
        </td>';
    } else {
        $output .= '<td class="txt-oflo">
            <form role="form" method="post" action="disable.php">
                <input type="hidden" name="id" id="id" value="'.$clubId.'"></input>
                <input style="float:right;" type="submit" name="submit" value="Disable" id="submit" class="btn btn-warning" style="margin: auto;">
                </input>
            </form>
        </td>';
    }
        $output .= '<td class="txt-oflo">
                        <form role="form" method="post" action="viewClub.php">
                            <input type="hidden" name="id" id="id" value="'.$clubId.'"></input>
                            <input style="float:right;" type="submit" name="submit" value="View" id="submit" class="btn btn-info" style="margin: auto;">
                            </input>
                        </form>
                    </td>
                    <td class="txt-oflo">
                        <form role="form" method="post" action="editClub.php">
                            <input type="hidden" name="id" id="id" value="'.$clubId.'"></input>
                            <input style="float:right;" type="submit" name="submit" value="Edit" id="submit" class="btn btn-success" style="margin: auto;">
                            </input>
                        </form>
                    </td>
                    <td class="txt-oflo">
                        <form role="form" method="post" action="deleteClub.php">
                            <input type="hidden" name="delete" id="delete" value="'.$clubId.'"></input>
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