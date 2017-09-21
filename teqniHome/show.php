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
    $resultVid = mysqli_query($conn, $query);
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
    
    <script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous">
        
    </script>
</head>


<body>
    
    <div id="slideshow" class="img-responsive" style="height: 100%; width: 100;"></div>
    <textarea style="display:none;" id="imgSrc" >
        <?php
            while ($list = mysqli_fetch_assoc($result)) { 
                if ($list['timeDuration']!='0'&&$list['imgPath']!="") { 
                    echo $list['imgPath'].",";
                } 
            }
        ?>
    </textarea>
    <textarea style="display:none;" id="vidSrc" >
        <?php
            while ($listVid = mysqli_fetch_assoc($resultVid)) { 
                if ($listVid['timeDuration']=='0'&&$listVid['imgPath']!="") { 
                    echo $listVid['imgPath'].",";
                } 
            }
        ?>
    </textarea>
    <input type="hidden" id="timeDuration" value="<?php
        while ($timeList = mysqli_fetch_assoc($timeResult)) {
            if ($timeList['imgPath']!='') {
                echo $timeList['timeDuration'].'000,';
            }
        }
    ?>">

    <div id="listencontainer"></div>
    
    <script>

        var imgSrc = document.getElementById("imgSrc").value;
        var imgEx = imgSrc.split(',');
        var vidSrc = document.getElementById("vidSrc").value;
        var vidEx = vidSrc.split(',');
        var galleryarray = new Array();
        
        for (var i = 0; i < vidEx.length - 1; i++) {
            galleryarray.push(vid(vidEx[i].trim()));
        }

        for (var i = 0; i < imgEx.length - 1; i++) {
            galleryarray.push(img(imgEx[i].trim()));
        }

        var timeDuration = document.getElementById("timeDuration").value;
        var arr = timeDuration.split(',');
        var aru = [];

        for (var i = 0; i < arr.length-1; i++) {
            if(Number(arr[i])) aru.push(parseInt(arr[i], 10));
        }


        function img(src) {
            var el = document.createElement('img');
            el.src = src;
            return el;
        }

        function vid() {
            var el = document.createElement('video');
            var source = document.createElement('source');
            for (var i = 0; i < arguments.length; i++) {
                source.src = arguments[i];
                source.type = "video/" + arguments[i].split('.')[arguments[i].split('.').length - 1];
                el.appendChild(source);
            }
            el.onplay = function () {
                clearInterval(sliding);
            };
            var index = 0;
            el.onended = function () {
                rotateimages();
            };
            return el;
        }

        var currentSlide = -1;
        var imageCount = 0;
    
        function rotateimages() {
            currentSlide = (currentSlide + 1) % galleryarray.length;
            document.getElementById('slideshow').innerHTML = '';
            galleryarray[currentSlide].style.width = "100vw";
            galleryarray[currentSlide].style.height = "100vh";
            document.getElementById('slideshow').appendChild(galleryarray[currentSlide]);
            if (galleryarray[currentSlide].tagName === "VIDEO") {
                if(galleryarray[currentSlide].paused) galleryarray[currentSlide].play();
            }
            else {
                setTimeout(rotateimages, aru[imageCount]);
                imageCount = (imageCount + 1) % aru.length;
            }
        }

        var sliding;
        var index1 = 0;
        window.onload = function () {
            rotateimages();
            document.getElementById('slideshow').onclick = function () {
                if (this.requestFullscreen) {
                    this.requestFullscreen();
                } else if (this.msRequestFullscreen) {
                    this.msRequestFullscreen();
                } else if (this.mozRequestFullScreen) {
                    this.mozRequestFullScreen();
                } else if (this.webkitRequestFullscreen) {
                    this.webkitRequestFullscreen();
                }
            }

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
