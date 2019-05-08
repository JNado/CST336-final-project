<?php
    if ($_POST['op'] == 1) {
        $pName = $_POST['playerName'];
    
        $cSession = curl_init();
        
        curl_setopt($cSession,CURLOPT_URL,"http://lookup-service-prod.mlb.com/json/named.search_player_all.bam?sport_code='mlb'&active_sw='Y'&name_part='$pName%25'");
        curl_setopt($cSession,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($cSession,CURLOPT_HEADER, false);
        
        curl_setopt($cSession,CURLOPT_HTTPHEADER, array(
            "Accept: application/json",
            "Content-Type: application/json",
        ));
        
        $pSearch = curl_exec($cSession);
        $err = curl_error($cSession);
        
        curl_close($cSession);
        
        echo ($pSearch);
    } 
    //batting
    else if ($_POST['op'] == 2) {
        $pId = $_POST['playerId'];
    
        $cSession = curl_init();
        
        curl_setopt($cSession,CURLOPT_URL,"http://lookup-service-prod.mlb.com/json/named.sport_hitting_tm.bam?league_list_id='mlb'&game_type='R'&season='2017'&player_id='$pId'");
        curl_setopt($cSession,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($cSession,CURLOPT_HEADER, false);
        
        curl_setopt($cSession,CURLOPT_HTTPHEADER, array(
            "Accept: application/json",
            "Content-Type: application/json",
        ));
        
        $results = curl_exec($cSession);
        
        $err = curl_error($cSession);
        
        curl_close($cSession);
        
        echo ($results);
    }
    //pitching
    else if ($_POST['op'] == 3) {
        $pId = $_POST['playerId'];
    
        $cSession = curl_init();
        
        curl_setopt($cSession,CURLOPT_URL,"http://lookup-service-prod.mlb.com/json/named.sport_pitching_tm.bam?league_list_id='mlb'&game_type='R'&season='2017'&player_id='$pId'");
        curl_setopt($cSession,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($cSession,CURLOPT_HEADER, false);
        
        curl_setopt($cSession,CURLOPT_HTTPHEADER, array(
            "Accept: application/json",
            "Content-Type: application/json",
        ));
        
        $results = curl_exec($cSession);
        
        $err = curl_error($cSession);
        
        curl_close($cSession);
        
        echo ($results);
    } else if ($_POST['op'] == 4) {
        session_start();
        $host = "127.0.0.1";
        $dbname = "final_project";
        $username = "root";
        $password = "";
        
        if  (strpos($_SERVER['HTTP_HOST'], 'herokuapp') !== false) {
            $url = parse_url(getenv("CLEARDB_DATABASE_URL"));
            $host = $url["host"];
            $dbname = substr($url["path"], 1);
            $username = $url["user"];
            $password = $url["pass"];
        } 
        
        $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    
        $sql = "INSERT INTO teams (user_id, team_name) VALUES " .
                "(:id, :name)";
        $stmt = $dbConn->prepare($sql);
    
        $stmt->execute(array(":id" => $_POST['user_id'],
                            ":name" => $_POST['teamName']));
        
        // echo json_encode(array("true", "true"));
    } else if ($_POST['op'] == 5) {
        session_start();
        $host = "127.0.0.1";
        $dbname = "final_project";
        $username = "root";
        $password = "";
        
        if  (strpos($_SERVER['HTTP_HOST'], 'herokuapp') !== false) {
            $url = parse_url(getenv("CLEARDB_DATABASE_URL"));
            $host = $url["host"];
            $dbname = substr($url["path"], 1);
            $username = $url["user"];
            $password = $url["pass"];
        } 
        
        $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    
        $sql = "SELECT * FROM teams WHERE user_id=:id";
        
        $stmt = $dbConn->prepare($sql);
    
        $stmt->execute(array(":id" => $_SESSION['id']));
        
        $records = $stmt->fetchAll();
        echo json_encode($records);
    } else if ($_POST['op'] == 6) {
        $host = "127.0.0.1";
        $dbname = "final_project";
        $username = "root";
        $password = "";
        
        if  (strpos($_SERVER['HTTP_HOST'], 'herokuapp') !== false) {
            $url = parse_url(getenv("CLEARDB_DATABASE_URL"));
            $host = $url["host"];
            $dbname = substr($url["path"], 1);
            $username = $url["user"];
            $password = $url["pass"];
        } 
        
        $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    
        $sql = "INSERT INTO players (id, team_id, first_name, last_name, type, b_avg, ops, slg) VALUES " .
                "(:id, :team, :first, :last, :pos, :avg, :o, :s)";
        $stmt = $dbConn->prepare($sql);
    
        $stmt->execute(array(":id" => $_POST['playerId'],
                            ":team" => $_POST['teamId'],
                            ":first" => $_POST['playerFirst'],
                            ":last" => $_POST['playerLast'],
                            ":pos" => $_POST['type'],
                            ":avg" => $_POST['b_avg'],
                            ":o" => $_POST['ops'],
                            ":s" => $_POST['slg']));
        
        // echo json_encode(array("true", "true"));
    } else if ($_POST['op'] == 7) {
        $host = "127.0.0.1";
        $dbname = "final_project";
        $username = "root";
        $password = "";
        
        if  (strpos($_SERVER['HTTP_HOST'], 'herokuapp') !== false) {
            $url = parse_url(getenv("CLEARDB_DATABASE_URL"));
            $host = $url["host"];
            $dbname = substr($url["path"], 1);
            $username = $url["user"];
            $password = $url["pass"];
        } 
        
        $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    
        $sql = "INSERT INTO players (id, team_id, first_name, last_name, type, era, win, loss) VALUES " .
                "(:id, :team, :first, :last, :pos, :era, :w, :l)";
        $stmt = $dbConn->prepare($sql);
    
        $stmt->execute(array(":id" => $_POST['playerId'],
                            ":team" => $_POST['teamId'],
                            ":first" => $_POST['playerFirst'],
                            ":last" => $_POST['playerLast'],
                            ":pos" => $_POST['type'],
                            ":era" => $_POST['era'],
                            ":w" => $_POST['w'],
                            ":l" => $_POST['l']));
        
        // echo json_encode(array("true", "true"));
    } else if ($_POST['op'] == 8) {
        $host = "127.0.0.1";
        $dbname = "final_project";
        $username = "root";
        $password = "";
        
        if  (strpos($_SERVER['HTTP_HOST'], 'herokuapp') !== false) {
            $url = parse_url(getenv("CLEARDB_DATABASE_URL"));
            $host = $url["host"];
            $dbname = substr($url["path"], 1);
            $username = $url["user"];
            $password = $url["pass"];
        } 
        
        $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    
        $sql = "select DISTINCT players.id, first_name, last_name, type, b_avg, ops, slg, era, win, loss from players join teams where team_id=:id";
        
        $stmt = $dbConn->prepare($sql);
    
        $stmt->execute(array(":id" => $_POST['teamId']));
        
        $records = $stmt->fetchAll();
        echo json_encode($records);
    } else if ($_POST['op'] == 9) {
        $host = "127.0.0.1";
        $dbname = "final_project";
        $username = "root";
        $password = "";
        
        if  (strpos($_SERVER['HTTP_HOST'], 'herokuapp') !== false) {
            $url = parse_url(getenv("CLEARDB_DATABASE_URL"));
            $host = $url["host"];
            $dbname = substr($url["path"], 1);
            $username = $url["user"];
            $password = $url["pass"];
        } 
        
        $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    
        $sql = "DELETE FROM teams WHERE id=:id";
        $stmt = $dbConn->prepare($sql);
    
        $stmt->execute(array(":id" => $_POST['teamId']));
    }
?>