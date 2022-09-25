<?php

    session_start();

    $msg = "";

    if (!isset($_SESSION['username'])) {
        $msg = "<h3>Sugar Monitoring App</h3>";
        $msg .= "<h4>Please <a href='index.php'>log in</a> .</h4>";
       
        echo '<html><img src="images/denied.jpg" width="300" height="250" alt=""></html>';
        
    } else {
            
    }
    
?>

<html>
    <head>
        <meta charset="UTF-8">
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script src="js/jquery-3.6.0.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.bundle.min.js" type="text/javascript"></script>
        <script src="js/sugarMonitoring.js" type="text/javascript"></script>
        <script>
            $(document).ready(function () {
                $.ajax({
                    type: "GET",
                    url: "http://localhost/ESE/getReading.php",
                    cache: false,
                    dataType: "JSON",
                    success: function (response) {
                        var message="<thead><tr><th>Date</th><th>After-Meals Readings</th><th>Readings</th></tr></thead>";
                for(i=0; i<response.length; i++){
                    message += "<tr><td>" + response[i].readingDate + "</td>" + "<td>" + response[i].readingTimes 
                            + "</td>" + "<td>" + response[i].readingLvl + "</td></tr/>";
                }
                $("#readings").html(message);
             },

                    error: function(obj, textStatus, errorThrown) {
                        console.log("Error "+textStatus+": "+errorThrown);
                    }
                });

            });
        </script>
        <title>Sugar Monitoring</title>
        
    </head>
    <body>
         <?php echo $msg; ?>
        <?php if (isset($_SESSION['username'])) { ?>
            <nav class="navbar navbar-light" style="background-color: #f3ca20;">
               <a class="navbar-brand">
                 <img src="images/device.jpg" width="30" height="30" class="align-top" alt="">
                 Sugar Monitoring App

               </a>
                
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
                <b>Sign Out</b>
                </button>
                
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                
                <form method="post" action="doLogOut.php">
                    <input type="submit" value="Sign Out"/>
                </form>
                
                </div>
            </nav>
        
        <div class="container">
            <br/><h1>Blood Sugar Level Readings</h1>
            <hr />
            <form method="post" id="id_Confirm" action="insertReading.php">
                <div class="form-group">
                    <label for="id_readingTimes">Reading Taken after:</label> 
                    <select id="id_readingTimes" name="readingTimes" class="form-control" required>
                        <option value=""></option>
                        <option value="Breakfast">Breakfast</option>
                        <option value="Lunch">Lunch</option>
                        <option value="Dinner">Dinner</option>
                    </select>
                </div>
                
                Readings are to be taken 2 hours after each meal. <br/><br/>
                
                <div class="form-group">
                    <label for="id_readingLvl">Blood Sugar Readings (mmo/L):</label>
                    <input type="text" id="id_readingLvl" name="readingLvl" class="form-control" required/>
                </div>
                
                
                <input class="btn btn-primary" type="submit" value="Enter"/><br/><br/>
            </form>
            
                <table id="readings" class="table table-bordered table-striped"></table>
                <br/><br/>
            
        </div>
        
        
        
        <?php } ?>	
        
 



        
    </body>
</html>
