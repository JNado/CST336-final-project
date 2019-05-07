<?php
  session_start();
      session_start();
      $host = "127.0.0.1";
      $dbname = "final_project";
      $username = "root";
      $password = "";
      
      if (!isset($_POST["password"])) {
        echo json_encode(array(
          "success" => false,
          "message" => "No password provided"));
        return;
      }      
      
      if (!isset($_POST["new_password"])) {
        echo json_encode(array(
          "success" => false,
          "message" => "New password not provided."));
        return;
      }      

      if ($_POST["password"] == $_POST["new_password"]) {
        echo json_encode(array(
          "success" => false,
          "message" => "Password and new password match"));
        return;
      }

      $hashedPassword = password_hash($_POST['new_password'], PASSWORD_DEFAULT);
      
      if  (strpos($_SERVER['HTTP_HOST'], 'herokuapp') !== false) {
          $url = parse_url(getenv("CLEARDB_DATABASE_URL"));
          $host = $url["host"];
          $dbname = substr($url["path"], 1);
          $username = $url["user"];
          $password = $url["pass"];
      } 
      
      $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
      $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
  
      $sql = "UPDATE user SET password=:pass WHERE email=:e";
      $stmt = $dbConn->prepare($sql);
  
      $stmt->execute(array(":pass" => $hashedPassword,
                           ":e" => $_POST['email']));
      echo json_encode(array(
          "success" => true,
          "message" => "Password changed, must be used at next login."));;
?>