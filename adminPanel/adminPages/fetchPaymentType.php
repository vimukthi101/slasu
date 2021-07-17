<?php

//fetch.php

include_once('../../php/db.php');
if(!isset($_SESSION[''])){
    session_start();
}

if($_POST["query"] != '') {
 $search_text = $_POST["query"];
 $query = 'SELECT * FROM `payment` WHERE paymentType="'.$search_text.'"';
} else {
 $query = 'SELECT * FROM `payment` WHERE status IN (1,2,3)';
}
$result = mysqli_query($con, $query);
$output = '';
if(mysqli_num_rows($result) != 0){
  while($row = mysqli_fetch_array($result)){
    $athleteId = $row['paymentId'];
    $athleteCode = $row['paymentCode'];
    $paymentType = $row['paymentType'];
    $clubId = $row['clubId'];
    $clubIdCode = $athleteCode.$athleteId;
    $amount = $row['amount'];
    $notes = $row['notes'];
    $date = $row['date'];
    $status = $row['status'];
    if($status == 1){
        $status = "Send For Payment";
    } else if($status == 2) {
        $status = "Approved";
    } else if($status == 3) {
        $status = "Rejected";
    } else if($status == 4) {
        $status = "To Be Renewed";
    }
    if($paymentType == 1){
        $paymentType = "Athlete Payment";
    } else if($paymentType == 2) {
        $paymentType = "Coach Payment";
    }
    $queryP = 'SELECT * FROM `club` WHERE clubId='.$clubId;
    $resultP = mysqli_query($con, $queryP);
    if(mysqli_num_rows($resultP) != 0){
        while($rowP = mysqli_fetch_array($resultP)){
            $clubName = $rowP['clubName'];
        }
    }
    $output .= '<tr>
                <td class="txt-oflo">'.$clubIdCode.'</td>
                <td class="txt-oflo">'.$clubName.'</td>
                <td class="txt-oflo">'.$amount.'</td>
                <td class="txt-oflo">'.$notes.'</td>
                <td class="txt-oflo">'.$date.'</td>
                <td class="txt-oflo">'.$paymentType.'</td>
                <td class="txt-oflo">'.$status.'</td>
                <td class="txt-oflo">
                    <form role="form" method="post" action="viewPayment.php">
                        <input type="hidden" name="id" id="id" value="'.$athleteId.'"></input>
                        <input style="float:right;" type="submit" name="submit" value="View" id="submit" class="btn btn-info" style="margin: auto;">
                        </input>
                    </form>
                </td>';
    if($status == "Send For Payment"){
        $output .= '<td class="txt-oflo">
                    <form role="form" method="post" action="editPayment.php">
                        <input type="hidden" name="id" id="id" value="'.$athleteId.'"></input>
                        <input style="float:right;" type="submit" name="submit" value="Approve" id="submit" class="btn btn-success" style="margin: auto;">
                        </input>
                    </form>
                </td>
                <td class="txt-oflo">
                    <form role="form" method="post" action="editPaymentTwo.php">
                        <input type="hidden" name="id" id="id" value="'.$athleteId.'"></input>
                        <input style="float:right;" type="submit" name="submit" value="Reject" id="submit" class="btn btn-warning" style="margin: auto;">
                        </input>
                    </form>
                </td>
            </tr>';
    }
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