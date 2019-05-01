<?php
    session_start();

    if (!isset($_SESSION['email'])){
      header("Location: index.html");
    }
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Dashboard</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="css/simple-line-icons.css" rel="stylesheet">
        <link href="./style.css" rel="stylesheet" type="text/css">
    </head>
    <body>
<button id ="logout">Logout <img src="img/lo.png" height=20px></button>

            
            

        <script src="./JQuery.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

        <script>
            $("#logout").on("click", function() {
                window.location = "logout.php";
            })
            
          
            $(document).ready(function() {
            //This populates the drop down selection  
            // source api : https://appac.github.io/mlb-data-api-docs/
            $.ajax({
                type: "GET",
                url: "http://lookup-service-prod.mlb.com/json/named.search_player_all.bam?sport_code=%27mlb%27&active_sw=%27Y%27&name_part=%27baez%25%27",
                dataType: "json",
                data: {
                    //'playerName' : "baez" + "%25"
                },
                success: function(data, status) {
                     console.log(data);
                     console.log(status);
                   
                         
                     
                    
                },
                error: function(err) {
                    console.log(arguments);
                },
                complete: function(data, status) {
                    // Called whether success or error
                    console.log(status);
                }
            });
            });
                
            
        </script>
    </body>
</html>