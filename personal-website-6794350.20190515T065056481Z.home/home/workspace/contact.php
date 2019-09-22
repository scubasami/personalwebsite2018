<html>
 <body>
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
 /*readfile('server_wroks.html');*/
 echo "Connected successfully (".$db->host_info.")"; 
 
 $sql = "INSERT INTO messages (name, subject, message) VALUES ('$_POST[name]','$_POST[subject]' , '$_POST[message]')";

 if ($db->query($sql) === TRUE) {
 echo "bruv you did it";
 } else {
 echo "Error: " . $sql . "<br>" . $conn->error;
 }
 
 $db->close();
 ?>
 </body>
</html>