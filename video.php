<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video </title>
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />
    <link href="https://vjs.zencdn.net/8.16.1/video-js.css" rel="stylesheet" />
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <nav class="navbar bg-body-tertiary">
                <div class="container-fluid">

                    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar"
                        aria-labelledby="offcanvasNavbarLabel">
                        <div class="offcanvas-header">
                            <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Offcanvas</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body">
                            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="dashboard.html">Home</a>
                                </li>

                            </ul>
                            <form class="d-flex mt-3" role="search">
                                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                                <button class="btn btn-outline-success" type="submit">Search</button>
                            </form>
                        </div>
                    </div>
                </div>
            </nav>
            <div class="col-12">
                <div class="row">
                    <div class="col-lg-9 col-12 bg-danger  mt-3">
                        <div class="row row-cols-1">

                            <?php
                            $videodata ="";
                            include "connection.php";
                            $id = $_GET["id"];
                            echo $id;

                            if (isset($id)) {
                                $videors = Database::search("SELECT * FROM `video` INNER JOIN `user` ON `video`.`user_mobile` = `user`.`mobile` INNER JOIN `subject` ON `video`.`subject_id` = `subject`.`id` ");
                                $videonum = $videors->fetch_assoc();
                                if ($videonum > 0) {
                                    $videodata = $videors->fetch_assoc();
                                    
                                } else {
                                    echo ("Video Not Found");
                                }
                            } else {
                                echo ("Something Went Wrong");
                            }


                            ?>

                            <!-- <video oncontextmenu="return false;" src="videos/ids mark.mp4" controls height="550px"><source type="video" class="col-12 " srcset=""></source></video> -->

                            <video onload="videomark();" oncontextmenu="return false;" id="my-video"
                                class="video-js col-12" poster="<?php echo $videodata["thumbnail"]; ?>" data-setup='{
                                "controls": true, "autoplay" : true, "preload" : "auto", "height":"500vh", "image": " <?php echo $videodata["thumbnail"]; ?>" ,"position":"top-right" ,"fadeTime":null }'>
                                <source src=" <?php echo $videodata["url"]; ?>" />
                                <!-- <source src="videos/ids mark.webm" type="video/webm" /> -->
                                <p class="vjs-no-js">
                                    To view this video please enable JavaScript, and consider upgrading to a
                                    web browser that
                                    <a href="https://videojs.com/html5-video-support/" target="_blank">supports HTML5
                                        video</a>
                                </p>
                            </video>
                        </div>
                    </div>
                    <div class="col-10">
                        <div class="fw-bold fs-3">Title :  <?php echo $videodata['title']; ?></div>
                        

                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="fw-bold fs-3">Description : </div>
                        <textarea class="form-control col-12 col-lg-6" name="" id=""><?php echo $videodata['description']; ?></textarea>
                    </div>
                    <!-- <div class="col-2">
                        <div class="row">
                            <div class="bg-success">
                                <source sizes="100vh" srcset="">
                                <video src="videos/ids mark.mp4" aria-disabled="true" frameborder="0"></video>
                                </source>
                            </div>
                        </div>
                    </div> -->

                </div>
            </div>


        </div>

    </div>
    </div>

    <script src="script.js"></script>
    <script src="bootstrap.bundle.js"></script>
    <!-- <script src="https://vjs.zencdn.net/8.16.1/video.min.js"></script> -->
    <script src="node_modules\video.js\dist\video.min.js"></script>
    <script src="node_modules\videojs-watermark\dist\videojs-watermark.min.js"></script>
</body>

</html>