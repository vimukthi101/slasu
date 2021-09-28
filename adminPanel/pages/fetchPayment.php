<?php

//fetch.php

include_once('../../php/db.php');
if(!isset($_SESSION[''])){
    session_start();
}

if($_POST["query"] != '') {
 $search_text = $_POST["query"];
 if($search_text == 0){
    $query = 'SELECT * FROM `payment` WHERE clubId='.$_SESSION["clubId"];
 } else {
    $query = 'SELECT * FROM `payment` WHERE status="'.$search_text.'" AND clubId='.$_SESSION["clubId"];
 }
} else {
 $query = 'SELECT * FROM `payment` WHERE clubId='.$_SESSION["clubId"];
}
$result = mysqli_query($con, $query);
$output = '';
if(mysqli_num_rows($result) != 0){
  while($row = mysqli_fetch_array($result)){
    $athleteId = $row['paymentId'];
    $athleteCode = $row['paymentCode'];
    $clubIdCode = $athleteCode.$athleteId;
    $amount = $row['amount'];
    $notes = $row['notes'];
    $date = $row['date'];
    $status = $row['status'];
    if($status == 1){
        $status = "Pending";
    } else if($status == 2) {
        $status = "Approved";
    } else if($status == 3) {
        $status = "Rejected";
    } else if($status == 4) {
        $status = "To Be Renewed";
    }
    $output .= '<tr>
                <td class="txt-oflo">'.$clubIdCode.'</td>
                <td class="txt-oflo">'.$amount.'</td>
                <td class="txt-oflo">'.$notes.'</td>
                <td class="txt-oflo">'.$date.'</td>
                <td class="txt-oflo">'.$status.'</td>
                <td class="txt-oflo">
                    <form role="form" method="post" action="viewPayment.php">
                        <input type="hidden" name="id" id="id" value="'.$athleteId.'"></input>
                        <input style="float:right;" type="submit" name="submit" value="View" id="submit" class="btn btn-info" style="margin: auto;">
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