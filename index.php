<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Website to download YouTube Videos">
    <meta name="author" content="YDavid">
    <title>Downloader</title>
    <link rel="stylesheet" href="styles.css">
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico">
    <!-- Bootstrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script async
            src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-6177030326507154"
            crossorigin="anonymous"></script>
</head>
<body class="d-flex flex-column min-vh-100">
<header class="py-5">
    <div class="container px-lg-5">
        <div class="p-4 p-lg-5 rounded-3 text-center">
            <div class="m-4 m-lg-5">
                <h1 class="display-5 fw-bold">Welcome to Youtube Downloader!</h1>
            </div>
        </div>
    </div>
</header>
<section class="pt-4">
    <div class="container px-lg-5">
        <div class="row">
            <div class="col-7">
                <input type="text" class="form-control" id="youtubeLink" aria-label="Large"
                       aria-describedby="inputGroup-sizing-sm" placeholder="YouTube Link">
            </div>
            <div class="col-2">
                <select class="form-control" id="format" aria-label="la">
                    <option value="mp4">MP4</option>
                    <!--                    <option value="webm">WEBM</option>-->
                    <option value="mp3">MP3</option>
                    <option value="m4a">M4A</option>
                </select>
            </div>
            <div class="col-2">
                <select class="form-control" id="resolution" aria-label="la">
                    <option value="best">Best Resolution</option>
                    <option value="18">360p (SD)</option>
                    <option value="22">720p (HD)</option>
                    <option value="137+140">1080p (UHD)</option>
                    <option value="264+140">2560p (QHD)</option>
                    <option value="313+140">3840p (4k)</option>
                </select>
            </div>
            <div class="col-3">
                <button class="btn btn-primary" onclick="startDownload()">Start Download</button>

            </div>
            <!-- Loading Screen -->
            <div id="loadingScreen" class="text-center">
                <p>Loading...</p>
            </div>

            <!-- Error Screen -->
            <div id="errorScreen" class="text-center">
                <p>Error: Unable to download the media</p>
            </div>
        </div>
        <h3 id="videoTitle"></h3>
        <div class="row">

            <video id="videoPlayer" controls></video>
            <audio id="audioPlayer" controls></audio>
            <a id="downloadLink" href="#" download>
                <button class="btn btn-success">Download to Device</button>
            </a>
        </div>
    </div>
    </div>
</section>
<!-- Footer-->
<footer class="py-5 bg-dark mt-auto">
    <div class="container"><p class="m-0 text-center text-white">Copyright &copy; YDavid 2023</p></div>
</footer>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="js/scripts.js"></script>

</body>
</html>