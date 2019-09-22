<html>
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
 
 ?>
 <br><br>
 </body>
</html>