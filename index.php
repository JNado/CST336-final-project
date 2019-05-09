<?php
    session_start();

    if (!isset($_SESSION['email'])){
      header("Location: login.html");
    }
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Baseball Dream Team: Team Maker</title>

        <meta charset="utf-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <!--<link href="css/font-awesome.min.css" rel="stylesheet">-->
        <!--<link href="css/simple-line-icons.css" rel="stylesheet">-->

        <link href="./style.css" rel="stylesheet" type="text/css">
    </head>
    <body id ="index">
        <button id ="logout">Logout <img src="img/lo.png" height=20px></button>
        <button id ="changePass">Change Password</button>
        
        <style type="text/css">
            th, td {
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <br><br>
        <div id="ruleset">
            <h3>Baseball Dream Team - Rules and Usage: </h3>
            <p>
                1. You can have any players you want, but only in positions that they are declared in.<br>
                2. You can have a maximum of 25 players, just like the active roster of the MLB. <br>
                3. Search for a player using the search bar at the top and select the player you'd like from the options provided. <br>
                4. Search using last name only, this will provide a more thorough search of the player database. <br>
                5. All stats data will be for the 2017 regular season. <br>
                6. To switch between your different teams, select which team you'd like to view from the "Available Teams" table below. <br>
            </p>
        </div>
        
        <div id="teamnav">
            <h3 id="teamLabel">Team Name: </h3>
        </div>
        
        
        <div id="search">
            <h3>Last Name Search: </h3><br>
            <input type="text" id="lookUp" name="lastNameSearch" size="30"/>
            <input type="button" id="searchButton" value="Search"/>
        </div>
        
        <br><br>
        
        <div id="results">
            <h4>Search Results: </h4>
            <table id="resultsList">
                <tr>
                    <th></th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Team</th>
                    <th>Player ID</th>
                    <th>Player Position</th>
                    <th><a href="#myModal" data-toggle='modal' onclick='modal(1)'> (Player Position Guide)</a></th><!--<img src="img/guide.png">-->
                </tr>
            </table>
            
            <input type="button" id="addResult" value="Add Player(s)"/>
        </div>
        
        <br><br><br>
        
        <div id="pitcher">
            <h4>Pitcher(s)</h4>
            <table id="pitcherList">
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>ERA</th>
                    <th>Win/Loss</th>
                    <th></th>
                </tr>
            </table>
        </div>
        <div id="catcher">
            <h4>Catcher(s)</h4>
            <table id="catcherList">
                <tr>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Batting Average</th>
                    <th>On Base Percentage</th>
                    <th>Slugging Percentage</th>
                    <th></th>
                </tr>
            </table>
        </div>
        <div id="first_base">
            <h4>First Basemen</h4>
            <table id="firstList">
                <tr>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Batting Average</th>
                    <th>On Base Percentage</th>
                    <th>Slugging Percentage</th>
                    <th></th>
                </tr>
            </table>
        </div>
        <div id="second_base">
            <h4>Second Basemen</h4>
            <table id="secondList">
                <tr>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Batting Average</th>
                    <th>On Base Percentage</th>
                    <th>Slugging Percentage</th>
                    <th></th>
                </tr>
            </table>
        </div>
        <div id="third_base">
            <h4>Third Basemen</h4>
            <table id="thirdList">
                <tr>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Batting Average</th>
                    <th>On Base Percentage</th>
                    <th>Slugging Percentage</th>
                    <th></th>
                </tr>
            </table>
        </div>
        <div id="short_stop">
            <h4>Short Stop(s)</h4>
            <table id="shortList">
                <tr>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Batting Average</th>
                    <th>On Base Percentage</th>
                    <th>Slugging Percentage</th>
                    <th></th>
                </tr>
            </table>
        </div>
        <div id="left_field">
            <h4>Left Fielder(s)</h4>
            <table id="leftList">
                <tr>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Batting Average</th>
                    <th>On Base Percentage</th>
                    <th>Slugging Percentage</th>
                    <th></th>
                </tr>
            </table>
        </div>
        <div id="center_field">
            <h4>Center Fielder(s)</h4>
            <table id="centerList">
                <tr>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Batting Average</th>
                    <th>On Base Percentage</th>
                    <th>Slugging Percentage</th>
                    <th></th>
                </tr>
            </table>
        </div>
        <div id="right_field">
            <h4>Right Fielder(s)</h4>
            <table id="rightList">
                <tr>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Batting Average</th>
                    <th>On Base Percentage</th>
                    <th>Slugging Percentage</th>
                    <th></th>
                </tr>
            </table>
        </div>

                            <!-- Modal -->
      <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
        
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Player Position Guide</h4>
            </div>
            <div class="modal-body">
              <p id="omD"></p>
            </div>
            <div class="modal-footer">
              <!--<button type=button class="btn btn-default" data-dismiss="modal">Close</button>-->
            </div>
          </div>
          
        </div>
      </div>
    
        <script src="./JQuery.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

        <script>
        /*global $*/
            var currTeamID = 0;
            var teamTotal = 0;

            $.ajax({
                type: "POST",
                url: "api.php",
                dataType: "json",
                data: {
                    'op' : '5'
                },
                success: function(data, status) {
                    // console.log(data);
                    if (data.length == 0) { $("#teamLabel").html($("#teamLabel").html() + " No teams have been created yet"); }
                    else {
                        $("#teamLabel").html($("#teamLabel").html() + data[0].team_name);
                        currTeamID = data[0].id;
    
                        data.forEach(function(element) {
                            $("#teamList").append("<td> <input type='button' name='teamButton' data-id='" + element.id + "' value='" + element.team_name + "'/>");
                        });
                        
                        displayTeam(currTeamID);
                        
                        // $("input[name='teamButton']").click(function() {
                        //     var holdTeamId = $(this).attr("data-id");
                        //     currTeamID = holdTeamId;
                        //     $("#teamLabel").html($("Available Teams: (Current = " + $(this).attr("value") + ")"));
                            
                        //     displayTeam(holdTeamId);
                        // });
                    }
                },
                complete: function(data, status) {
                    // console.log(status);
                }
            });
            $(document).ready(function() {
                $("#logout").on("click", function() {
                    window.location = "logout.php";
                });
                
                $("#changePass").on("click", function() {
                    window.location = "changepass.html";
                });
               
                //This populates the drop down selection  
                // source api : https://appac.github.io/mlb-data-api-docs/
                $("#searchButton").on("click", function() {
                    $.ajax({
                        type: "POST",
                        url: "api.php",
                        dataType: "json",
                        data: {
                            
                            'playerId' : "",
                            'playerName' : $("#lookUp").val(),
                            'op' : '1'
                        },
                        
                        success: function(data, status) {
                            // console.log(data);
                
                            $("#resultsList tr").not(":first").remove();
                            
                            if (data.search_player_all.queryResults.totalSize > 1) {
                                data.search_player_all.queryResults.row.forEach(function(element) {
                                    $("#resultsList").append("<tr>" +
                                                                 "<td><input type='checkbox' name='optionList' class='player_choice' id='" + element['player_id'] +"' pos='"+ element['position'] +"' firstN = '"+ element['name_first']+"' lastN = '" + element['name_last']+"' />&nbsp;</td>" + 
                                                                 "<td>" + element['name_first'] + "</td>" +
                                                                 "<td>" + element['name_last'] + "</td>" +
                                                                 "<td>" + element['team_full'] + "</td>" +
                                                                 "<td>" + element['player_id'] + "</td>" +
                                                                 "<td>" + element['position'] + "</td>" +
                                                             "</tr>");
                                });
                            } else {
                                $("#resultsList").append("<tr>" +
                                                             "<td><input type='checkbox' name='optionList' class='player_choice' id='" + data.search_player_all.queryResults.row.player_id +"' pos='"+ data.search_player_all.queryResults.row.position +"' firstN = '"+ data.search_player_all.queryResults.row.name_first +"' lastN = '" + data.search_player_all.queryResults.row.name_last +"' />&nbsp;</td>" + 
                                                             "<td>" + data.search_player_all.queryResults.row.name_first + "</td>" +
                                                             "<td>" + data.search_player_all.queryResults.row.name_last + "</td>" +
                                                             "<td>" + data.search_player_all.queryResults.row.team_full + "</td>" +
                                                             "<td>" + data.search_player_all.queryResults.row.player_id + "</td>" +
                                                             "<td>" + data.search_player_all.queryResults.row.position + "</td>" +
                                                         "</tr>");
                            }
                             
                        },
                        
                        complete: function(data, status) {
                            // console.log(status);
                        }
                    });
                });
                
                $("#addResult").on("click", function() {
                    $("[name=optionList]").each(function() {
                        if ($(this).is(":checked")) {
                            if($(this).attr("pos") == "P"){
                                idFunctionPitch($(this).attr("id"), $(this).attr("firstN"), $(this).attr("lastN"), 1);
                            }
                            else{
                                idFunctionBat($(this).attr("id"),$(this).attr("firstN"), $(this).attr("lastN"), $(this).attr("pos"), 1);
                            }
                        }
                    });
                
                });
            });
            
            function idFunctionBat(id, f, l, p, piv){
                $.ajax({
                    type: "POST",
                    url: "api.php",
                    dataType: "json",
                    data: {
                        'playerId' : id,
                        // 'playerName' : $("[name=lastNameSearch]").val(),
                        'op' : '2'
                    },
                    success: function(data, status) {
                        // console.log(data);
                        
                        if (data.sport_hitting_tm.queryResults.totalSize == 0) { 
                            alert("There are no available statistics for this player.")
                            return;
                        }
                        
                        //Depending on players position, put players in list
                        if(p == "1B"){
                            if($('#first_base').text().indexOf(f) < 1 & $('#first_base').text().indexOf(l) < 1){
                                $("#firstList").append("<tr id='" + id + "table'>" + 
                                                       "<th>" + f +"</th>" + 
                                                       "<th>" + l +"</th>" +
                                                       "<th>" + data.sport_hitting_tm.queryResults.row["avg"] + "</th>" + 
                                                       "<th>" + data.sport_hitting_tm.queryResults.row["ops"] +"</th>" + 
                                                       "<th>" + data.sport_hitting_tm.queryResults.row["slg"] +"</th>" + 
                                                       "<th><input type='button' data-id='" + id + "' name='deleteButtonT' value='Delete'/></th>" + 
                                                       "</tr>");
                            }
                        }
                        
                        if(p == "2B"){
                            if($('#second_base').text().indexOf(f) < 1 & $('#second_base').text().indexOf(l) < 1){
                                $("#secondList").append("<tr id='" + id + "table'>" + 
                                                       "<th>" + f +"</th>" + 
                                                       "<th>" + l +"</th>" +
                                                       "<th>" + data.sport_hitting_tm.queryResults.row["avg"] + "</th>" + 
                                                       "<th>" + data.sport_hitting_tm.queryResults.row["ops"] +"</th>" + 
                                                       "<th>" + data.sport_hitting_tm.queryResults.row["slg"] +"</th>" + 
                                                       "<th><input type='button' data-id='" + id + "' name='deleteButtonT' value='Delete'/></th>" + 
                                                       "</tr>");
                            }
                        }
                        
                        if(p == "3B"){
                            if($('#third_base').text().indexOf(f) < 1 & $('#third_base').text().indexOf(l) < 1){
                                $("#thirdList").append("<tr id='" + id + "table'>" + 
                                                       "<th>" + f +"</th>" + 
                                                       "<th>" + l +"</th>" +
                                                       "<th>" + data.sport_hitting_tm.queryResults.row["avg"] + "</th>" + 
                                                       "<th>" + data.sport_hitting_tm.queryResults.row["ops"] +"</th>" + 
                                                       "<th>" + data.sport_hitting_tm.queryResults.row["slg"] +"</th>" + 
                                                       "<th><input type='button' data-id='" + id + "' name='deleteButtonT' value='Delete'/></th>" + 
                                                       "</tr>");
                            }
                        }
                        
                        if(p == "C"){
                            if($('#catcher').text().indexOf(f) < 1 & $('#catcher').text().indexOf(l) < 1){
                                $("#catcherList").append("<tr id='" + id + "table'>" + 
                                                       "<th>" + f +"</th>" + 
                                                       "<th>" + l +"</th>" +
                                                       "<th>" + data.sport_hitting_tm.queryResults.row["avg"] + "</th>" + 
                                                       "<th>" + data.sport_hitting_tm.queryResults.row["ops"] +"</th>" + 
                                                       "<th>" + data.sport_hitting_tm.queryResults.row["slg"] +"</th>" + 
                                                       "<th><input type='button' data-id='" + id + "' name='deleteButtonT' value='Delete'/></th>" + 
                                                       "</tr>");
                            }
                        }
                        
                        if(p == "SS"){
                            if($('#short_stop').text().indexOf(f) < 1 & $('#short_stop').text().indexOf(l) < 1){
                                $("#shortList").append("<tr id='" + id + "table'>" + 
                                                       "<th>" + f +"</th>" + 
                                                       "<th>" + l +"</th>" +
                                                       "<th>" + data.sport_hitting_tm.queryResults.row["avg"] + "</th>" + 
                                                       "<th>" + data.sport_hitting_tm.queryResults.row["ops"] +"</th>" + 
                                                       "<th>" + data.sport_hitting_tm.queryResults.row["slg"] +"</th>" + 
                                                       "<th><input type='button' data-id='" + id + "' name='deleteButtonT' value='Delete'/></th>" + 
                                                       "</tr>");
                            }    
                        }
                        
                        if(p == "LF"){
                            if($('#left_field').text().indexOf(f) < 1 & $('#left_field').text().indexOf(l) < 1){
                                $("#leftList").append("<tr id='" + id + "table'>" + 
                                                       "<th>" + f +"</th>" + 
                                                       "<th>" + l +"</th>" +
                                                       "<th>" + data.sport_hitting_tm.queryResults.row["avg"] + "</th>" + 
                                                       "<th>" + data.sport_hitting_tm.queryResults.row["ops"] +"</th>" + 
                                                       "<th>" + data.sport_hitting_tm.queryResults.row["slg"] +"</th>" + 
                                                       "<th><input type='button' data-id='" + id + "' name='deleteButtonT' value='Delete'/></th>" + 
                                                       "</tr>");
                            }            
                        }
                        
                        if(p == "RF"){
                            if($('#right_field').text().indexOf(f) < 1 & $('#right_field').text().indexOf(l) < 1){
                                $("#rightList").append("<tr id='" + id + "table'>" + 
                                                       "<th>" + f +"</th>" + 
                                                       "<th>" + l +"</th>" +
                                                       "<th>" + data.sport_hitting_tm.queryResults.row["avg"] + "</th>" + 
                                                       "<th>" + data.sport_hitting_tm.queryResults.row["ops"] +"</th>" + 
                                                       "<th>" + data.sport_hitting_tm.queryResults.row["slg"] +"</th>" + 
                                                       "<th><input type='button' data-id='" + id + "' name='deleteButtonT' value='Delete'/></th>" + 
                                                       "</tr>");
                            }
                        }
                        
                        if(p == "CF"){
                            if($('#center_field').text().indexOf(f) < 1 & $('#center_field').text().indexOf(l) < 1){
                                $("#centerList").append("<tr id='" + id + "table'>" + 
                                                       "<th>" + f +"</th>" + 
                                                       "<th>" + l +"</th>" +
                                                       "<th>" + data.sport_hitting_tm.queryResults.row["avg"] + "</th>" + 
                                                       "<th>" + data.sport_hitting_tm.queryResults.row["ops"] +"</th>" + 
                                                       "<th>" + data.sport_hitting_tm.queryResults.row["slg"] +"</th>" + 
                                                       "<th><input type='button' data-id='" + id + "' name='deleteButtonT' value='Delete'/></th>" + 
                                                       "</tr>");
                            }                 
                        }
                        
                        $("input[name='deleteButtonT']").click(function() {
                            $("#" + $(this).attr("data-id") + "table").remove();
                            removePlayerDB(id);
                        });
                        
                        if (piv == 1) {
                            //add player to database
                            $.ajax({
                                type: "POST",
                                url: "api.php",
                                dataType: "json",
                                data: {
                                    'teamId' : currTeamID,
                                    'playerId' : id,
                                    'playerFirst' : f,
                                    'playerLast' : l,
                                    'type' : p,
                                    'b_avg' : data.sport_hitting_tm.queryResults.row["avg"],
                                    'ops' : data.sport_hitting_tm.queryResults.row["ops"],
                                    'slg' : data.sport_hitting_tm.queryResults.row["slg"],
                                    'op' : '6'
                                },
                                success: function(data, status) {
                                    // console.log(data);
                                },
                                complete: function(data, status) {
                                    // console.log(status);
                                }
                            });
                        }
                    },
                    complete: function(data, status) {
                        // console.log(status);
                    }
                });
            }
        
            function idFunctionPitch(id, f, l, piv){
                $.ajax({
                    type: "POST",
                    url: "api.php",
                    dataType: "json",
                    data: {
                        'playerId' : id,
                        // 'playerName' : $("[name=lastNameSearch]").val(),
                        'op' : '3'
                    },
                    success: function(data, status) {
                        // console.log(data);
    
                        if (data.sport_pitching_tm.queryResults.totalSize == 0) { 
                            alert("There are no available statistics for this player.")
                            return;
                        }
                        
                        //This checks to see if a player was already added. if player is already in list, dont add again.
                        if($('#pitcher').text().indexOf(f) < 1 & $('#pitcher').text().indexOf(l) < 1){
                            $("#pitcherList").append("<tr id='" + id + "table'>" + 
                                                     "<th>" + f +"</th>" + 
                                                     "<th>" + l +"</th>" +
                                                     "<th>" + data.sport_pitching_tm.queryResults.row['era'] +"</th>" + 
                                                     "<th>" + data.sport_pitching_tm.queryResults.row['w'] + " / " + data.sport_pitching_tm.queryResults.row['l'] + "</th>" + 
                                                     "<th><input type='button' data-id='" + id + "' name='deleteButtonP' value='Delete'/></th>" +
                                                     "</tr>");
                        }
                        
                        $("input[name='deleteButtonP']").click(function() {
                            $("#" + $(this).attr("data-id") + "table").remove();
                            removePlayerDB(id);
                        });
                        
                        if (piv == 1) {
                            $.ajax({
                                type: "POST",
                                url: "api.php",
                                dataType: "text",
                                data: {
                                    'teamId' : currTeamID,
                                    'playerId' : id,
                                    'playerFirst' : f,
                                    'playerLast' : l,
                                    'type' : "P",
                                    'era' : data.sport_pitching_tm.queryResults.row["era"],
                                    'w' : data.sport_pitching_tm.queryResults.row["w"],
                                    'l' : data.sport_pitching_tm.queryResults.row["l"],
                                    'op' : '7'
                                },
                                success: function(data, status) {
                                    // console.log(data);
                                },
                                complete: function(data, status) {
                                    // console.log(status);
                                }
                            });
                        }
                    },
                    complete: function(data, status) {
                        // console.log(status);
                    }
                });
            }
            
            function removePlayerDB(id) {
                $.ajax({
                    type: "POST",
                    url: "api.php",
                    dataType: "json",
                    data: {
                        'playerId' : id,
                        'op' : '9'
                    },
                    success: function(data, status) {
                        // console.log(data);
                    },
                    complete: function(data, status) {
                        // console.log(status);
                    }
                });
            }
            
            function displayTeam(id) {
                $.ajax({
                    type: "POST",
                    url: "api.php",
                    dataType: "json",
                    data: {
                        
                        'teamId' : id,
                        'op' : '8'
                    },
                    success: function(data, status) {
                        // console.log(data);
                        teamTotal += data.length;

                        if (data.length > 1) {
                            data.forEach(function(element) {
                                if (element.type == "P") {
                                    idFunctionPitch(element.id, element.first_name, element.last_name, 0);
                                } else {
                                    idFunctionBat(element.id, element.first_name, element.last_name, element.type, 0);
                                }
                            });
                        } else {
                            if (data[0].type == "P") {
                                    idFunctionPitch(data[0].id, data[0].first_name, data[0].last_name, 0);
                                } else {
                                    idFunctionBat(data[0].id, data[0].first_name, data[0].last_name, data[0].type, 0);
                            }
                        }
                    },
                    complete: function(data, status) {
                        // console.log(status);
                    }
                });
            }
            
            //shows a guide (for dumbasses like me) to see what the positions actually mean
            function modal(i){
                 if (i == 0) {
                    $("#omD").html("<h3>Team deleted, refreshing page.</h3>"); 
                 } else if (i == 1) {
                    $("#omD").html("<img src='img/guide.png' height=400em>");
                 }
            }
            
        </script>
    </body>
</html>