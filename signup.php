<?php
  session_start();

  $httpMethod = strtoupper($_SERVER['REQUEST_METHOD']);

  switch($httpMethod) {
    case "OPTIONS":
      // Allows anyone to hit your API, not just this c9 domain
      header("Access-Control-Allow-Headers: X-ACCESS_TOKEN, Access-Control-Allow-Origin, Authorization, Origin, X-Requested-With, Content-Type, Content-Range, Content-Disposition, Content-Description");
      header("Access-Control-Allow-Methods: POST, GET");
      header("Access-Control-Max-Age: 3600");
      exit();
    case "GET":
      // TODO: Access-Control-Allow-Origin
      http_response_code(401);
      echo "Not Supported";
      break;
    case 'POST':
      // Allow any client to access
      header("Access-Control-Allow-Origin: *");
      // Let the client know the format of the data being returned
      header("Content-Type: application/json");

      // Get the body json that was sent
      $rawJsonString = file_get_contents("php://input");

      //var_dump($rawJsonString);

      // Make it a associative array (true, second param)
      $jsonData = json_decode($rawJsonString, true);

      // First, validate email and password
      // On second thought, let you figure out email validation and do password confirmation

      if (!isset($_POST["password"])) {
        echo json_encode(array(
          "success" => false,
          "message" => "No password provided"));
        return;
      }      
      
      if (count($_POST["password"]) != 2) {
        echo json_encode(array(
          "success" => false,
          "message" => "No confirmation provided"));
        return;
      }      

      if ($_POST["password"][0] != $_POST["password"][1]) {
        echo json_encode(array(
          "success" => false,
          "message" => "Password and confirmation do not match"));
        return;
      }    
      
      $postedPassword = $_POST["password"][0];

      $hashedPassword = password_hash($postedPassword, PASSWORD_DEFAULT);

      // TODO: do stuff to get the $results which is an associative array
      $host = "127.0.0.1";
      $dbname = "final_project";
      $username = "root";
      $password = "";
  
  
       //when connecting from Heroku

    if  (strpos($_SERVER['HTTP_HOST'], 'herokuapp') !== false) {

        $url = parse_url(getenv("CLEARDB_DATABASE_URL"));

        $host = $url["host"];

        $dbname = substr($url["path"], 1);

        $username = $url["user"];

        $password = $url["pass"];

    } 
    
  
  
      // Get Data from DB
      try {
        
        $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
  
        $sql = "INSERT INTO user(id,email, password) " .
               "VALUES (NULL,:email, :hashedPassword) ";
        
        $stmt = $dbConn->prepare($sql);
        $stmt->execute(array (":email" => $_POST['email'],
                              ":hashedPassword" => $hashedPassword));

        $_SESSION["email"] = $record["email"];
        $_SESSION["isAdmin"] = false;
  
        // Sending back down as JSON
        echo json_encode(array("success" => true));
  
        } catch (PDOException $e) {
          echo json_encode(array(
            "success" => false,
            "message" => $e->getMessage()));
        }
      break;
    case 'PUT':
      // TODO: Access-Control-Allow-Origin
      http_response_code(401);
      echo "Not Supported";
      break;
    case 'DELETE':
      // TODO: Access-Control-Allow-Origin
      http_response_code(401);
      break;
  }
?>