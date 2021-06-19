<?php

//fetch.php

include_once('../../php/db.php');
if(!isset($_SESSION[''])){
    session_start();
}

if($_POST["query"] != '') {
 $search_text = $_POST["query"];
 $query = 'SELECT * FROM `admin` WHERE role="'.$search_text.'"';
} else {
 $query = 'SELECT * FROM `admin`';
}
$result = mysqli_query($con, $query);
$output = '';
if(mysqli_num_rows($result) != 0){
  while($row = mysqli_fetch_array($result)){
    $adminId = $row['adminId'];
    $firstName = $row['firstName'];
    $secondName = $row['secondName'];
    $nic = $row['nic'];
    $email = $row['email'];
    $mobile = $row['mobile'];
    $role = $row['role'];
    $output .= '<tr>
                <td class="txt-oflo">'.$firstName.'</td>
                <td class="txt-oflo">'.$secondName.'</td>
                <td class="txt-oflo">'.$mobile.'</td>
                <td class="txt-oflo">'.$email.'</td>
                <td class="txt-oflo">'.$nic.'</td>
                <td class="txt-oflo">'.$role.'</td>';
    if($_SESSION["role"] == "sadmin"){
        if ($role == "admin"){
            $output .= '<td class="txt-oflo">
            <form role="form" method="post" action="makeSAdmin.php">
                <input type="hidden" name="id" id="id" value="'.$adminId.'"></input>
                <input style="float:right;" type="submit"  onclick="return sadmin();" name="submit" value="Make Super Admin" id="submit" class="btn btn-info" style="margin: auto;">
                </input>
            </form>
        </td>';
        } else {
            $output .= '<td class="txt-oflo">
            <form role="form" method="post" action="makeAdmin.php">
                <input type="hidden" name="id" id="id" value="'.$adminId.'"></input>
                <input style="float:right;" type="submit"  onclick="return admin();" name="submit" value="Make Admin" id="submit" class="btn btn-info" style="margin: auto;">
                </input>
            </form>
        </td>';
        }
            $output .= '<td class="txt-oflo">
            <form role="form" method="post" action="editAdmin.php">
                <input type="hidden" name="id" id="id" value="'.$adminId.'"></input>
                <input style="float:right;" type="submit" name="submit" value="Edit" id="submit" class="btn btn-success" style="margin: auto;">
                </input>
            </form>
        </td><td class="txt-oflo">
                        <form role="form" method="post" action="deleteAdmin.php">
                            <input type="hidden" name="delete" id="delete" value="'.$adminId.'"></input>
                            <input style="float:right;" onclick="return clicked();" type="submit" name="submit" value="Delete" id="submit" class="btn btn-danger" style="margin: auto;">
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