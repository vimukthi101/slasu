<?php

//fetch.php

include_once('../../php/db.php');
if(!isset($_SESSION[''])){
    session_start();
}

if($_POST["query"] != '') {
    $search_text = $_POST["query"];
    if($search_text != "0") {
        $query = 'SELECT clubName,clubId FROM `club` WHERE clubName="'.$search_text.'"';
    }
} else {
    $query = 'SELECT clubName,clubId FROM `club`';
}
if($search_text != "0" || $_POST["query"] == '') {
    $result = mysqli_query($con, $query);
    if(mysqli_num_rows($result) != 0){
      while($row = mysqli_fetch_array($result)){
        $clubId = $row['clubId'];
        $clubName = $row['clubName'];
        $query2 = 'SELECT * FROM `payment` WHERE clubId="'.$clubId.'"';
        $result2 = mysqli_query($con, $query2);
        $output = '';
        if(mysqli_num_rows($result2) != 0){
            while($row2 = mysqli_fetch_array($result2)){
                $athleteId = $row2['paymentId'];
                $athleteCode = $row2['paymentCode'];
                $clubId = $row2['clubId'];
                $clubIdCode = $athleteCode.$athleteId;
                $amount = $row2['amount'];
                $notes = $row2['notes'];
                $date = $row2['date'];
                $status = $row2['status'];
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
                    <td class="txt-oflo">'.$clubName.'</td>
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
        }
      }
    } else {
     $output .= '
     <tr>
      <td colspan="12" align="center">No Data Found</td>
     </tr>
     ';
    }
} else {
    $query2 = 'SELECT * FROM `payment` WHERE clubId IS null';
    $result2 = mysqli_query($con, $query2);
        $output = '';
        if(mysqli_num_rows($result2) != 0){
            while($row2 = mysqli_fetch_array($result2)){
                $athleteId = $row2['paymentId'];
                $athleteCode = $row2['paymentCode'];
                $clubId = $row2['clubId'];
                $clubIdCode = $athleteCode.$athleteId;
                $amount = $row2['amount'];
                $notes = $row2['notes'];
                $date = $row2['date'];
                $status = $row2['status'];
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
                    <td class="txt-oflo">UnAttached</td>
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
    }
}
echo $output;
?>