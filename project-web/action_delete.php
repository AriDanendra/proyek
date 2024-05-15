<?php
   $servername = "localhost";
   $username = "root";
   $password = "";
   $dbname = "project_web";

   // Create connection
   $conn = mysqli_connect($servername, $username, $password, $dbname);
   
   // Check connection
   if (!$conn) {
     die("Connection failed: " . mysqli_connect_error());
   }

   $id = $_REQUEST['id']; 
   $query = "DELETE FROM mahasiswa WHERE id='$id'"; 
   $result = $conn->query($query); 
   if ($result) { 
       echo json_encode(array("status" => "success")); 
   } else { 
       echo json_encode(array("status" => "gagal", "error" => $conn->error)); 
   }
   ?>