<?php
require_once('includes\header.inc');
$refreshTime = 1;

function authentication($user, $pass){
    global $conn;

    mysqli_select_db($conn, "users");
    $query = "SELECT * FROM users";
    $result = aQuery($query);

    if($result->num_rows > 0 ){
        while($row = $result->fetch_assoc()) {
            if(!strcmp($user, $row["username"]) && !strcmp($pass, $row["password"])){
                return true;
            }
        }
    }

    return false;
}

if(!$_POST["username"] && !$_POST["password"]){
?>
    <div id="content">
        <div id="main-menu">
        <p>Error: No username or password</p>
        </div>
    </div>

<?php
}else{

    if(authentication($_POST["username"], $_POST["password"])){
        echo "<h1>Access Granted!!</h1>";
        header('Refresh: '.$refreshTime.'; URL = admin.php');

    }else{
        echo "<h1>Bad username and password</h1>";
        header('Refresh: '.$refreshTime.'; URL = login.php');
    }
?>
<?php
}
require_once('includes\footer.inc');
?>