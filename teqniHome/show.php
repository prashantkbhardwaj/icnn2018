<?php require_once("includes/db_connection.php");?>
<?php require_once("includes/functions.php");?>
<?php
    $data = $_GET['data'];
    $dataex = explode("_", $data);
    $level1 = $dataex[0];
    $level2 = $dataex[1];
    $level3 = $dataex[2];
    $sessionName = $dataex[3];

    $query = "SELECT * FROM volleyupload WHERE level1 = '{$level1}' AND level2 = '{$level2}' AND level3 = '{$level3}' AND sessionName = '{$sessionName}'";
    $result = mysqli_query($conn, $query);
    $timeResult = mysqli_query($conn, $query);
    confirm_query($timeResult);
    confirm_query($result);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Projection">
    <meta name="author" content="Prashant Bhardwaj">

    <title>Slide Show</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">

    <!-- Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


    <!-- Custom Theme CSS -->
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/glow.css">
   
    <!-- Advanced CSS -->
    <link href="css/animate.css" rel="stylesheet">
	<link href="js/lib/owl-carousel/owl.carousel.css" rel="stylesheet">
	<link href="js/lib/owl-carousel/owl.theme.css" rel="stylesheet">
	<link href="js/lib/owl-carousel/owl.transitions.css" rel="stylesheet">
	<link href="js/lib/magnific-popup/magnific-popup.css" rel="stylesheet">
    <link href="js/lib/video/YTPlayer.css" rel="stylesheet">
    <link href="js/lib/flipclock/flipclock.css" rel="stylesheet">
</head>


<body id="page-top" data-spy="scroll" data-target=".navbar-custom" onload="initialize();">

	<!-- Navigation -->

   
    <!-- Intro Section -->
    <section id="intro">
    <div class="video-content">  
    <div class="video-image wp1 delay-1s">
        <?php
            while ($list = mysqli_fetch_assoc($result)) { ?>
                <img class="mySlides w3-animate-fading" src="<?php echo $list['imgPath']; ?>">
            <?php    
            }
        ?>
    </div>
    <input type="hidden" id="timeDuration" value="<?php
        while ($timeList = mysqli_fetch_assoc($timeResult)) {
            echo $timeList['timeDuration'].'000,';
        }
     ?>">

    </section><!-- /#intro --> 
    

   

    <div id="listencontainer"></div>
    <!-- Core JavaScript Files -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>

    <!-- JavaScript -->
    <script src="js/lib/jquery.appear.js"></script>
    <script src="js/lib/owl-carousel/owl.carousel.min.js"></script>
    <script src="js/lib/magnific-popup/jquery.magnific-popup.min.js"></script>
    <script src="js/lib/video/jquery.mb.YTPlayer.js"></script> 		
    <script src="js/lib/flipclock/flipclock.js"></script>
    <script src="js/lib/jquery.animateNumber.js"></script>
    <script src="js/lib/waypoints.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/main.js"></script>
    <script>
        var myIndex = 0;
        var myIndex2 = 0;
        var timeDuration = document.getElementById("timeDuration").value;
        var arr = timeDuration.split(",");
        for (var i = 0; i < arr.length-1; i++) {
            arr[i] = parseInt(arr[i], 10);
        }
        console.log(arr);
        carousel();
        
        function carousel() {
            var i;
            var x = document.getElementsByClassName("mySlides");
            for (i = 0; i < x.length; i++) {
               x[i].style.display = "none";  
            }
            myIndex++;
            if (myIndex > x.length) {myIndex = 1}    
            x[myIndex-1].style.display = "block";  
            setTimeout(carousel, arr[myIndex2++ %(arr.length-1)]);    
        }
    </script>
    <script type="text/javascript">
        function initialize()
        {        
            $(document).ready(function() {
                $("#listencontainer").load("listenStop.php");
                var listenId = setInterval(function() {
                    $("#listencontainer").load('listenStop.php?randval='+ Math.random());
                                                       
                }, 1000);
                $.ajaxSetup({ cache: false});       
            }); 
        }    
    </script>
</body>

</html>
