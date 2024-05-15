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

    // Handle insert request
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Retrieve POST data
        $nama = $_POST['nama']; 
        $domisili = $_POST['domisili']; 
        $tempat_lahir = $_POST['tempat_lahir']; 
        $tanggal_lahir = $_POST['tanggal_lahir']; 
        $email = $_POST['email']; 
        $phone = $_POST['phone']; 
        $alamat = $_POST['alamat']; 
        $jenis_kelamin = $_POST['jenis_kelamin']; 
        
        // Prepare SQL statement
        $query = "INSERT INTO mahasiswa (nama, domisili, tempat_lahir, tanggal_lahir, email, phone, alamat, jenis_kelamin) 
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        
        // Prepare and bind parameters
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssssssss", $nama, $domisili, $tempat_lahir, $tanggal_lahir, $email, $phone, $alamat, $jenis_kelamin);
        
        // Execute the statement
        if ($stmt->execute()) {
            $response = array("status" => "success", "id"=> $conn->insert_id); 
            echo json_encode($response); 
        } else { 
            echo json_encode(array("status" => "gagal")); 
        } 
        
        // Close statement
        $stmt->close();
    } else { 
        echo json_encode(array("status" => "Method not allowed")); 
    }
?>
