<?php

//fetch.php

include_once('../../php/db.php');
if(!isset($_SESSION[''])){
    session_start();
}

if($_POST["query"] != '') {
 $search_text = $_POST["query"];
 $query = 'SELECT * FROM `club` WHERE status="'.$search_text.'"';
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
        $affiliationCat = "Swimming";
    } else if($affiliationCat == 2) {
        $affiliationCat = "Artistic Swimming";
    } else if($affiliationCat == 3) {
        $affiliationCat = "Water Polo";
    } else if($affiliationCat == 4) {
        $affiliationCat = "Diving";
    } else if($affiliationCat == 5) {
        $affiliationCat = "All";
    }
    $output .= '<tr>
    <td class="txt-oflo">'.$clubIdCode.'</td>
                <td class="txt-oflo">'.$clubName.'</td>
                <td class="txt-oflo">'.$affiliationCat.'</td>
                <td class="txt-oflo">'.$athleteName.'</td>
                <td class="txt-oflo">'.$operatorMobile.'</td>
                <td class="txt-oflo">'.$clubContactOne.'</td>
                <td class="txt-oflo">'.$district.'</td>';
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