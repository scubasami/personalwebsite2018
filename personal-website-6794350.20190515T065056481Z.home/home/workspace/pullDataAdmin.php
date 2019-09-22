<head>
<title>The data</title>
<body>
<h1>
Database information
</h1>
<?php
$servername = getenv('IP');
$username = getenv('C9_USER');
$password = "";
$database = "c9";
$dbport = 3306;

// Create connection
$db = new mysqli($servername, $username, $password, $database, $dbport);
// Check connection
if ($db->connect_error) {
die("Connection failed: " . $db->connect_error);
}
echo "Connected successfully (".$db->host_info.")";
echo "<br><hr>";

//Get the username and password that they typed
 function checkInput($str) {
        $str = @strip_tags($str);
        $str = @stripslashes($str);
        //$str = mysql_real_escape_string($str);
        $invalid_characters = array("$", "%", "#", "<", ">", "|");
        $str = str_replace($invalid_characters, "", $str);
        return $str;
    }
$name = $_POST['username'];  
$pass = $_POST['password'];
 
$passm = checkInput($pass); 
//hash ( string $md5 , string $pass [, bool $raw_output = FALSE ] ) : string; 
//Check our database to see if there are any records where this matches.
$sqlStr = "SELECT * FROM users WHERE username = '$name' and password = '$passm';";

$result = $db->query($sqlStr);
$num_rows = $result->num_rows;

//If there are one or more people in our user list with this user/password combo, display info.
if ($num_rows > 0)
{
$sqlStr = "Select * from messages;";

$selRes = $db->query($sqlStr);
echo $sqlRes;
if ($selRes)
{
while($selRow = mysqli_fetch_assoc($selRes))
{
 echo $selRow['name'] . ', ' . $selRow['subject'] . ', ' . $selRow['message']  . '<br/>';
}
}
}

//There was nobody with this name & password.
else
{
echo 'Invalid username & password.';
}
?>
<br><br>
</body>
</html>
