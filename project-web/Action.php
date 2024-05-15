<?php 
    $servername = "localhost"; 
    $username = "root"; 
    $password = ""; 
    $dbname = "project_web"; 
 
    // Create connection 
    $conn = new mysqli($servername, $username, $password, $dbname); 
    // Check connection 
    if ($conn->connect_error) { 
    die("Connection failed: " . $conn->connect_error); 
    } 
 
    $result = $conn->query("SELECT * FROM mahasiswa"); 
    if ($result->num_rows > 0) { 
        $data = array(); 
        // echo json_encode(array("status" =>"seccess")); 
        while ($row = $result->fetch_assoc()) { 
            $data[] = array( 
                "id" => $row['id'], 
                "nama" => $row['nama'], 
                "domisili" => $row['domisili'], 
                "tempat_lahir" => $row['tempat_lahir'], 
                "tanggal_lahir" => $row['tanggal_lahir'], 
                "email" => $row['email'], 
                "phone" => $row['phone'], 
                "alamat" => $row['alamat'], 
                "jenis_kelamin" => $row['jenis_kelamin'] 
            ); 
        } 
        echo json_encode(array("status" => "success", "data" => $data)); 
    } else { 
        echo json_encode(array("status" => "gagal")); 
    } 
?>
