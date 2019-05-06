<?php
    session_start();

    if (!isset($_SESSION['email'])){

      header("Location: index.html");

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



        <style type="text/css">
            th, td {
                padding: 15px;
            }
        </style>
    </head>
    <body>
        
        <div id="ruleset">
            <h3>Baseball Dream Team - Rules and Usage: </h3>
            <p>
                1. You can have any players you want, but only in positions that they are declared in.<br>
                2. You can have a maximum of 25 players, just like the active roster of the MLB. <br>
                3. Search for a player using the search bar at the top and select the player you'd like from the options provided. <br>
                4. You can refine the search by selecting whether the player is active or not with the radio buttons. <br>
                5. Search using last name only, this will provide a more thorough search of the player database. <br>
                6. All stats data will be for the current regular season. <br>
                7. To switch between your different teams, select which team you'd like to view from the drop-down menu at the top of the screen. <br>
            </p>
        </div>
        
        <div id="teamnav">
            <select id="teamList">
                
            </select>
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
                    <th><a href="#myModal" data-toggle='modal' onclick='modal()'> (Player Position Guide)</a></th><!--<img src="img/guide.png">-->
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

            $("#logout").on("click", function() {
                window.location = "logout.php";
            })
            
          

        /*global $*/

            $(document).ready(function() {
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
                            console.log(data);
                
                             $("#resultsList").empty();
                            data.search_player_all.queryResults.row.forEach(function(element) {
                                $("#resultsList").append("<tr>" +
                                                         "<td><input type='checkbox' name='optionList' class='player_choice' id='" + element['player_id'] +"' pos='"+ element['position'] +"' firstN = '"+ element['name_first']+"' lastN = '" + element['name_last']+"' />&nbsp;</td>" + 
                                                         "<td>" + element['name_first'] + "</td>" +
                                                         "<td>" + element['name_last'] + "</td>" +
                                                         "<td>" + element['team_full'] + "</td>" +
                                                         "<td>" + element['player_id'] + "</td>" +
                                                         "<td>" + element['position'] + "</td>" +
                                                         "</tr>");
                                                         
                                
                                // if(element['position'] == "P"){
                                //     $("#pitcherList").append("<tr><th>"+ element["name_first"] +"</th><th>"+ element["name_last] +"</th><th>"+ "@ERA@" +"</th><th>Win/Loss</th></tr>");
                                // }
                                
                            });
                             
                             
                        },
                        complete: function(data, status) {
                            console.log(status);
                        }
                    });
                });
                
                $("#addResult").on("click", function() {
                    $("[name=optionList]").each(function() {
                        if ($(this).is(":checked")) {
                            //alert($(this).attr("pos"));
                            
                            if($(this).attr("pos") == "P"){
                                idFunctionPitch($(this).attr("id"), $(this).attr("firstN"), $(this).attr("lastN"));
                            }
                            else{
                                idFunctionBat($(this).attr("id"),$(this).attr("firstN"), $(this).attr("lastN"), $(this).attr("pos"));
                            }
                            
                           
                        }
                    });
                
                });
            });
            function idFunctionBat(id, f, l, p){
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
                        console.log(data);
                        
                        //Depending on players position, put players in list
                        if(p == "1B"){
                            if($('#first_base').text().indexOf(f) < 1 & $('#first_base').text().indexOf(l) < 1){
                                $("#firstList").append("<tr><th>"+ f +"</th><th>"+ l +"</th><th>"+ data.sport_hitting_tm.queryResults.row["avg"] +"</th><th>"+ data.sport_hitting_tm.queryResults.row["obp"] +"</th><th>"+ data.sport_hitting_tm.queryResults.row["slg"] +"</th></tr>");
                            }
                        }
                        
                        if(p == "2B"){
                            if($('#second_base').text().indexOf(f) < 1 & $('#second_base').text().indexOf(l) < 1){
                                $("#secondList").append("<tr><th>"+ f +"</th><th>"+ l +"</th><th>"+ data.sport_hitting_tm.queryResults.row["avg"] +"</th><th>"+ data.sport_hitting_tm.queryResults.row["obp"] +"</th><th>"+ data.sport_hitting_tm.queryResults.row["slg"] +"</th></tr>");
                            }
                        }
                        
                        if(p == "3B"){
                            alert();
                            if($('#third_base').text().indexOf(f) < 1 & $('#third_base').text().indexOf(l) < 1){
                                $("#thirdList").append("<tr><th>"+ f +"</th><th>"+ l +"</th><th>"+ data.sport_hitting_tm.queryResults.row["avg"] +"</th><th>"+ data.sport_hitting_tm.queryResults.row["obp"] +"</th><th>"+ data.sport_hitting_tm.queryResults.row["slg"] +"</th></tr>");
                            }
                        }
                        
                        if(p == "C"){
                            if($('#catcher').text().indexOf(f) < 1 & $('#catcher').text().indexOf(l) < 1){
                                $("#catcherList").append("<tr><th>"+ f +"</th><th>"+ l +"</th><th>"+ data.sport_hitting_tm.queryResults.row["avg"] +"</th><th>"+ data.sport_hitting_tm.queryResults.row["obp"] +"</th><th>"+ data.sport_hitting_tm.queryResults.row["slg"] +"</th></tr>");
                            }
                        }
                        
                        if(p == "SS"){
                            if($('#short_stop').text().indexOf(f) < 1 & $('#short_stop').text().indexOf(l) < 1){
                                $("#shortList").append("<tr><th>"+ f +"</th><th>"+ l +"</th><th>"+ data.sport_hitting_tm.queryResults.row["avg"] +"</th><th>"+ data.sport_hitting_tm.queryResults.row["obp"] +"</th><th>"+ data.sport_hitting_tm.queryResults.row["slg"] +"</th></tr>");
                            }    
                        }
                        
                        if(p == "LF"){
                            if($('#left_field').text().indexOf(f) < 1 & $('#left_field').text().indexOf(l) < 1){
                                $("#leftList").append("<tr><th>"+ f +"</th><th>"+ l +"</th><th>"+ data.sport_hitting_tm.queryResults.row["avg"] +"</th><th>"+ data.sport_hitting_tm.queryResults.row["obp"] +"</th><th>"+ data.sport_hitting_tm.queryResults.row["slg"] +"</th></tr>");
                            }            
                        }
                        
                        if(p == "RF"){
                            if($('#right_field').text().indexOf(f) < 1 & $('#right_field').text().indexOf(l) < 1){
                                $("#rightList").append("<tr><th>"+ f +"</th><th>"+ l +"</th><th>"+ data.sport_hitting_tm.queryResults.row["avg"] +"</th><th>"+ data.sport_hitting_tm.queryResults.row["obp"] +"</th><th>"+ data.sport_hitting_tm.queryResults.row["slg"] +"</th></tr>");
                            }
                        }
                        
                        if(p == "CF"){
                            if($('#center_field').text().indexOf(f) < 1 & $('#center_field').text().indexOf(l) < 1){
                                $("#centerList").append("<tr><th>"+ f +"</th><th>"+ l +"</th><th>"+ data.sport_hitting_tm.queryResults.row["avg"] +"</th><th>"+ data.sport_hitting_tm.queryResults.row["obp"] +"</th><th>"+ data.sport_hitting_tm.queryResults.row["slg"] +"</th></tr>");
                            }                 
                        }
                        
                        
                        
                        // data.search_player_all.queryResults.row.forEach(function(element) {
                        //     $("#resultsList").append("<tr>" +
                        //                              "<td><input type='checkbox' name='optionList' class='player_choice' id='" + element['player_id'] +"'/>&nbsp;</td>" + 
                        //                              "<td>" + element['name_first'] + "</td>" +
                        //                              "<td>" + element['name_last'] + "</td>" +
                        //                              "<td>" + element['team_full'] + "</td>" +
                        //                              "<td>" + element['player_id'] + "</td>" +
                        //                              "</tr>");
                        // });
                         
                         
                    },
                    complete: function(data, status) {
                        console.log(status);
                    }
                });
            }
            
            
            function idFunctionPitch(id, f, l){
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
                        console.log(data);
    
                        //WHEN I TRY TO ADD SANDY BAEZ, I GET AN ERROR? HE'S A PTCHER RIGHT? HE DOESNT HAVE PITCHING STATS? happens with a lot of pitchers?
                        
                        //This checks to see if a player was already added. if player is already in list, dont add again.
                        if($('#pitcher').text().indexOf(f) < 1 & $('#pitcher').text().indexOf(l) < 1){
                            $("#pitcherList").append("<tr><th>"+ f +"</th><th>"+ l +"</th><th>"+ data.sport_pitching_tm.queryResults.row['era'] +"</th><th>"+ data.sport_pitching_tm.queryResults.row['w'] + " / " + data.sport_pitching_tm.queryResults.row['l'] + "</th></tr>");
                        }
                        
                    
                    },
                    complete: function(data, status) {
                        console.log(status);
                    }
                });
            }
            
            
            //shows a guide (for dumbasses like me) to see what the positions actually mean
            function modal(i){
                 $("#omD").html("<img src='img/guide.png' height=400em>");
            }
            
        </script>
    </body>
</html>