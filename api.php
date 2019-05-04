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
        
        // echo ($pSearch);
        //SCHWARTTZCHHHHH
        
        // curl_setopt($cSession,CURLOPT_URL,"http://lookup-service-prod.mlb.com/json/named.player_info.bam?sport_code='mlb'&player_id='493316'");
        
        // $pInfo = curl_exec($cSession);
        
        curl_close($cSession);
        
        // $hold = json_decode($pSearch);
        
        // array_push($hold, array('player_position' => $pInfo.player_info.queryResults.row.primary_position));
        
        // $pSearch = json_encode($hold);
    
        echo ($pSearch);
    } 
    //batting
    else if ($_POST['op'] == 2) {
        $pId = $_POST['playerId'];
    
        $cSession = curl_init();
        
        curl_setopt($cSession,CURLOPT_URL,"http://lookup-service-prod.mlb.com/json/named.sport_hitting_tm.bam?league_list_id='mlb'&game_type='R'&season='2019'&player_id='$pId'");
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
        
        curl_setopt($cSession,CURLOPT_URL,"http://lookup-service-prod.mlb.com/json/named.sport_pitching_tm.bam?league_list_id='mlb'&game_type='R'&season='2019'&player_id='$pId'");
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