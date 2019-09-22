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
 echo "Connected successfully (".$db->host_info.")";
 
 $sql = "INSERT INTO names (first_name, last_name) VALUES ('$_POST[firstname]','$_POST[lastname]')";

 if ($db->query($sql) === TRUE) {
 echo "New record created successfully";
 } else {
 echo "Error: " . $sql . "<br>" . $conn->error;
 }
 
 $db->close();
 ?>
 </body>
</html>