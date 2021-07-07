<?php

//fetch.php

include_once('../../php/db.php');
if(!isset($_SESSION[''])){
    session_start();
}

if($_POST["query"] != '') {
 $search_text = $_POST["query"];
 $query = 'SELECT * FROM `coach` WHERE affiliationCat="'.$search_text.'" AND clubId='.$_SESSION["clubId"];
} else {
 $query = 'SELECT * FROM `coach` WHERE clubId='.$_SESSION["clubId"];
}
$result = mysqli_query($con, $query);
$output = '';
if(mysqli_num_rows($result) != 0){
  while($row = mysqli_fetch_array($result)){
    $athleteId = $row['coachId'];
    $athleteCode = $row['coachCode'];
    $clubIdCode = $athleteCode.$athleteId;
    $affiliationCat = $row['affiliationCat'];
    $athleteName = $row['coachName'];
    $nic = $row['nic'];
    $email = $row['coachEmail'];
    $phone1 = $row['coachMobileOne'];
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
                <td class="txt-oflo">'.$athleteName.'</td>
                <td class="txt-oflo">'.$nic.'</td>
                <td class="txt-oflo">'.$phone1.'</td>
                <td class="txt-oflo">'.$email.'</td>
                <td class="txt-oflo">'.$affiliationCat.'</td>
                <td class="txt-oflo">
                    <form role="form" method="post" action="viewCoach.php">
                        <input type="hidden" name="id" id="id" value="'.$athleteId.'"></input>
                        <input style="float:right;" type="submit" name="submit" value="View" id="submit" class="btn btn-info" style="margin: auto;">
                        </input>
                    </form>
                </td>
                <td class="txt-oflo">
                    <form role="form" method="post" action="editCoach.php">
                        <input type="hidden" name="id" id="id" value="'.$athleteId.'"></input>
                        <input style="float:right;" type="submit" name="submit" value="Edit" id="submit" class="btn btn-success" style="margin: auto;">
                        </input>
                    </form>
                </td>
                <td class="txt-oflo">
                    <form role="form" method="post" action="deleteCoach.php">
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