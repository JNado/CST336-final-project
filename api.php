<?php
    if ($_POST['op'] == 1) {
        $pName = $_POST['playerName'];
    
        $cSession = curl_init();
        
        $searchTerm = $_POST["q"];
        
        curl_setopt($cSession,CURLOPT_URL,"http://lookup-service-prod.mlb.com/json/named.search_player_all.bam?sport_code='mlb'&active_sw='Y'&name_part='$pName%25'");
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
?>