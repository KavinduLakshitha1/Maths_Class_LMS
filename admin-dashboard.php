<!DOCTYPE html>
<?php
session_start();
include "connection.php";
?>


<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="keywords" content="Maths, ">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | Everwin</title>
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />
</head>

<body class="overflow-x-hidden" onload="loadchart();">
    <div class="container-fluid vh-100">
        <div class="row">
            <div class="col-12  ">
                <div class="row">


                    <!-- dashboard menu -->
                    <div class="col-2 bg-success-subtle overflow-y-visible shadow-lg ">
                        <div class="row">
                            <div class="col-10 offset-1 d-grid justify-content-center mt-2 ">
                                <div class="row">
                                    <div class="col-10 d-grid justify-content-center offset-1">
                                        <div class="row">

                                            <img class="h-auto w-auto rounded rounded-circle" src="images/icon.png" alt="" />
                                        </div>

                                    </div>
                                    <div class="col-10 offset-1 text-center">
                                        <div class="fw-semibold fs-3 mt-4">Everwin</div>

                                    </div>
                                </div>

                            </div>
                            <hr class="col-10 offset-1 mt-4 fw-bold">
                            <nav class="navbar d-lg-none d-block bg-body-tertiary">
                                <div class="container-fluid">

                                    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                                        <span class="navbar-toggler-icon"></span>
                                    </button>
                                    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                                        <div class="offcanvas-header">
                                            <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Offcanvas</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                        </div>
                                        <div class="offcanvas-body">
                                            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                                                <li class="nav-item">
                                                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#">Link</a>
                                                </li>
                                                <li class="nav-item dropdown">
                                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                        Dropdown
                                                    </a>
                                                    <ul class="dropdown-menu">
                                                        <li><a class="dropdown-item" href="#">Action</a></li>
                                                        <li><a class="dropdown-item" href="#">Another action</a></li>
                                                        <li>
                                                            <hr class="dropdown-divider">
                                                        </li>
                                                        <li><a class="dropdown-item" href="#">Something else here</a>
                                                        </li>
                                                    </ul>
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

                            <div id="tabs" class="col-12 mt-5 d-flex justify-content-center fw-bold fs-5">
                                <div class="row g-3 align-items-center list-unstyled">
                                    <form class="d-flex mt-2 mb-2" role="search">
                                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                                        <button class="btn btn-outline-success" type="submit">Search</button>
                                    </form>
                                    <button class="btn btn-success p-3 tablinks" id="defaultOpen" onclick="contentloader(event, 'dashboard');">Dashboard</button>
                                    <button class="btn  p-3 tablinks" onclick="contentloader(event, 'profile');">Profile</button>
                                    <button class="btn p-3 tablinks" onclick="contentloader(event, 'videoDiv');">video</button>
                                    <button class="btn p-3 tablinks" onclick="contentloader(event,'resources');">Resources</button>
                                    <button class="btn p-3 tablinks" onclick="contentloader(event,'users');">Users</button>
                                    <!-- <button class="btn p-3 tablinks" onclick="contentloader(event,'users');">Setting</button> -->
                                </div>

                            </div>



                        </div>
                    </div>
                    <!-- dashboard menu  -->

                    <!-- content area  -->
                    <div class="col-10 overflow-y-visible" id="container">
                        <div class="row">
                            <!-- dashboard Div  -->
                            <div id="dashboard" class="active tabcontent col-12">
                                <div class="row">
                                    <span class="fw-bold fs-1 m-3">Dashboard</span>
                                    <div class="col-10 offset-2">
                                        <div class="row">



                                            <div class="col-12 col-md-4 rounded border p-3 fw-bold fs-2 m-2">
                                                <span class="fw-bold fs-4">Users</span>
                                                <div class="fw-bold fs-2 text-center">100</div>
                                            </div>
                                            <div class="col-12 col-md-4 rounded border p-3 fw-bold fs-2 m-2">
                                                <span class="fw-bold fs-4">Videos</span>
                                                <div class="fw-bold fs-2 text-center">100</div>
                                            </div>
                                            <div class="col-12 col-md-4 rounded border p-3 fw-bold fs-2 m-2">
                                                <span class="fw-bold fs-4">Resources</span>
                                                <div class="fw-bold fs-2 text-center">100</div>
                                            </div>
                                            <!-- <div class="col-12 col-md-4 rounded border p-3 fw-bold fs-2 m-2">
                                                <span class="fw-bold fs-4">Count of </span>
                                                <div class="fw-bold fs-2">100</div>
                                            </div> -->
                                        </div>

                                    </div>

                                    <!-- <div class="col-10 offset-1 card">
                                        <span class="fs-3 fw-bold m-4">Your Progress in papers</span>
                                        <canvas id="chart1" height="400px"></canvas>
                                    </div> -->

                                </div>
                            </div>
                            <!-- dashboard Div  -->

                            <?php

                            $email = $_SESSION["admin"]["email"];

                            $adminprofilers = Database::search("SELECT * FROM `admin` WHERE `email`='$email'");
                            $adminprofiledata = $adminprofilers->fetch_assoc();

                            ?>
                            <!-- Profile Div  -->
                            <div id="profile" class="col-12 tabcontent">
                                <div class="row">
                                    <span class="fw-bold fs-1 m-3">Profile</span>


                                    <div class="col-3 d-grid justify-content-center  offset-4 rounded-4 shadow-lg mt-4">
                                        <img src="images/icon.png" class="m-4" height="150px" alt="">
                                    </div>
                                    <div class="col-8 offset-2 mt-5 mb-3">
                                        <div class="row g-4">
                                            <div class="col-12">
                                                <div class="row g-2">

                                                    <div class="col-6 ">
                                                        <span for="name">First Name</span>
                                                        <input type="text" class="form-control" value="<?php echo $adminprofiledata["fname"]; ?>" name="" id="fname">
                                                    </div>

                                                    <div class="col-6 ">
                                                        <span for="name">Last Name</span>
                                                        <input type="text" class="form-control" value="<?php echo $adminprofiledata["lname"]; ?>" name="" id="lname">
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="row">
                                                    <span for="name">Email</span>
                                                    <div class="col-12 ">
                                                        <input type="email" disabled class="form-control" value="<?php echo $adminprofiledata["email"]; ?>" name="" id="email">
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-12">
                                                <div class="row">
                                                    <span for="name">Mobile</span>
                                                    <div class="col-12 ">
                                                        <input type="tel" class="form-control" value="<?php echo $adminprofiledata["mobile"]; ?>" name="" id="mobile">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="row">
                                                    <span for="name">Password</span>
                                                    <div class="col-6 ">
                                                        <input type="password" disabled class="form-control" value="<?php echo $adminprofiledata["password"]; ?>" name="" id="mobile">
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="row ">
                                                            <div class="d-flex justify-content-end">
                                                                <button class="btn btn-outline-info" onclick="adminchangepassword();">Change Password</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>



                                            <div class="col-12">
                                                <div class="row">
                                                    <button class="btn btn-outline-success">Update Profile</button>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Profile Div  -->

                            <?php
                            $subrs = Database::search("SELECT * FROM `subject`");

                            $teachrs = Database::search("SELECT * FROM `user` INNER JOIN `user_type` ON `user`.`user_type_id` = `user_type`.`id` WHERE `type` ='Teacher' ");

                            $subnum = $subrs->num_rows;
                            $teachnum = $teachrs->num_rows;

                            ?>

                            <!-- Video Div  -->
                            <div id="videoDiv" class="col-10 tabcontent offset-1">
                                <div class="row">
                                    <span class="fw-bold fs-1 m-3">Videos</span>

                                    <div class="col-12 d-flex justify-content-end">
                                        <div class="row">
                                            <!-- <a href="uploadVideo.php">
                                                <button type="button" class="btn btn-outline-info ">
                                                    Upload New Video
                                                </button>

                                            </a> -->

                                            <!-- Video upload modal button -->
                                            <button type="button" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                Upload New Video
                                            </button>
                                            <button class="btn btn-outline-warning mt-2" onclick="printvideos();">print Report</button>


                                            <!-- video upload Modal -->
                                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Upload Video</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="col-12">
                                                                <div class="row g-2">
                                                                    <div class="col-6">
                                                                        <span>Select Subject</span>
                                                                        <select name="" class="form-select mt-2" id="videosubject">

                                                                            <?php
                                                                            for ($i = 0; $i < $subnum; $i++) {
                                                                                $subdata = $subrs->fetch_assoc();
                                                                            ?>

                                                                                <option value="<?php echo ($subdata["id"]); ?>"><?php echo ($subdata["name"]); ?></option>
                                                                            <?php
                                                                            }
                                                                            ?>
                                                                            <!-- <option value="1">Com.Maths</option>
                                                                            <option value="2">Chemistry</option>
                                                                            <option value="3">Physics</option> -->
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <span>Select Teacher</span>
                                                                        <select name="" class="form-select mt-2" id="videoteacher">
                                                                            <?php
                                                                            for ($i = 0; $i < $teachnum; $i++) {
                                                                                $teachdata = $teachrs->fetch_assoc();
                                                                            ?>

                                                                                <option value="<?php echo ($teachdata["mobile"]); ?>"><?php echo ($teachdata["first_name"] . " " . $teachdata["last_name"]); ?></option>
                                                                            <?php
                                                                            }
                                                                            ?>

                                                                            <!-- <option value="1">Prasad Madusanka</option>
                                                                            <option value="2">Sajith K. Kumara</option>
                                                                            <option value="3">Mr.Physics</option> -->
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-12 mt-2">
                                                                <span class="m-2">Title</span>
                                                                <input type="text" id="title" class="form-control mt-2">
                                                            </div>

                                                            <div class="col-12 mt-2">
                                                                <span class="m-2">Description</span>
                                                                <textarea class="form-control" id="desc" class="mt-2" id="exampleFormControlTextarea1" rows="3"></textarea>
                                                            </div>

                                                            <div class="col-12 mt-2">
                                                                <span class="m-2">Thumbnail</span>
                                                                <input id="thumbnail" type="file" class="form-control mt-2">
                                                            </div>

                                                            <div class="col-12 mt-3">

                                                                <span class="col-2 mt-2">Preview :</span>
                                                                <div class="col-4 border mt-2 rounded">
                                                                    <img src="images/icon.png" class="img-fluid" style="width: 250px;" id="imgpreview" />
                                                                </div>
                                                            </div>

                                                            <div class="alert alert-info mt-3">
                                                                <label for="Info">Please make sure your video before upload video.</label>
                                                            </div>

                                                            <div class="col-12 mt-1">
                                                                <span class="m-2">Video</span>
                                                                <input id="video" type="file" class="form-control mt-2">
                                                            </div>

                                                            <div class="col-12 mt-3">

                                                                <span class="col-2 mt-2">Preview :</span>
                                                                <div class="col-10 border mt-2 ">
                                                                    <video height="200vh">
                                                                        <source src="videos/ids mark.mp4">
                                                                        </source>
                                                                    </video>
                                                                    <!-- <img src="images/icon.png" class="img-fluid" style="width: 250px;" id="i0" /> -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="button" class="btn btn-primary" onclick="uploadVideo();">Upload Video</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <?php

                                    $videors = Database::search("SELECT * FROM `video`
                                        INNER JOIN `user` ON `video`.`user_mobile` = `user`.`mobile` 
                                        INNER JOIN `subject` ON `video`.`subject_id`= `subject`.`id` 
                                        INNER JOIN `status` ON `video`.`status_id`= `status`.`id` ");

                                    $videonum = $videors->num_rows;


                                    ?>

                                    <div class="col-10 offset-1 mt-5">
                                        <div class="row table-responsive" id="videotable">
                                            <table class="table  ">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">Thumbnail</th>
                                                        <th scope="col">Title</th>
                                                        <th scope="col">Description</th>
                                                        <th scope="col">Subject</th>
                                                        <th scope="col">Teacher</th>
                                                        <th scope="col">Status</th>
                                                        <th scope="col"></th>
                                                        <th scope="col"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>


                                                    <?php
                                                    $videocount = 0;
                                                    for ($x = 0; $x < $videonum; $x++) {
                                                        $videocount++;
                                                        $videodata = $videors->fetch_assoc();

                                                    ?>
                                                        <tr>
                                                            <th scope="row"><?php echo $videocount ?></th>
                                                            <td><img src="<?php echo $videodata["thumbnail"] ?>" height="50px" alt="" srcset=""></td>
                                                            <td><?php echo $videodata["title"] ?></td>
                                                            <td><?php echo $videodata["description"] ?></td>
                                                            <td><?php echo $videodata["name"] ?></td>
                                                            <td><?php echo $videodata["first_name"] . " " . $videodata["last_name"] ?></td>
                                                            <?php
                                                            if ($videodata["status_id"] == 1) {
                                                            ?>
                                                                <td><button class="btn btn-success" id="<?php echo $videodata["id"]; ?>" onclick="videoStatusChanger(<?php echo $videodata['id']; ?>);">Active</button>
                                                                <?php
                                                            } else {
                                                                ?>
                                                                <td><button class="btn btn-danger" id="<?php $videodata["id"]; ?>" onclick="videoStatusChanger(<?php echo $videodata['id']; ?>);">Deactive</button>
                                                                <?php

                                                            }
                                                                ?>
                                                                </td>
                                                                <td><button type="button" class="btn btn-outline-info" onclick="updateVideos(<?php echo $videodata['id'] ?>);">
                                                                        Update
                                                                    </button>
                                                                <td><button class="btn btn-outline-warning" onclick="showVideo(<?php echo $videodata['id']; ?>);">View</button>

                                                        </tr>



                                                        <!-- video upload Modal -->
                                                        <div class="modal fade" id="videoUpdateModal<?php echo $videodata['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Update Video</h1>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="col-12">
                                                                            <div class="row g-2">
                                                                                <div class="col-6">
                                                                                    <span>Select Subject</span>
                                                                                    <select disabled name="" class="form-select mt-2" id="videosubject">

                                                                                        <option><?php echo ($videodata["name"]); ?></option>


                                                                                    </select>
                                                                                </div>
                                                                                <div class="col-6">
                                                                                    <span>Select Teacher</span>
                                                                                    <select disabled name="" class="form-select mt-2" id="videoteacher">

                                                                                        <option><?php echo ($videodata["first_name"] . " " . $videodata["last_name"]); ?></option>

                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-12 mt-2">
                                                                            <span class="m-2">Title</span>
                                                                            <input type="text" id="uptitle<?php echo $videodata["id"] ?>" value="<?php echo $videodata["title"]; ?>" class="form-control mt-2">
                                                                        </div>

                                                                        <div class="col-12 mt-2">
                                                                            <span class="m-2">Description</span>
                                                                            <textarea class="form-control" id="updesc<?php echo $videodata["id"] ?>" class="mt-2" id="exampleFormControlTextarea1" rows="3"><?php echo $videodata["description"]; ?>"</textarea>
                                                                        </div>

                                                                        <div class="col-12 mt-2">
                                                                            <span class="m-2">Thumbnail</span>
                                                                            <input id="thumbnail" disabled value="<?php echo $videodata["thumbnail"]; ?>" class="form-control mt-2">
                                                                        </div>




                                                                        <div class="col-12 mt-1">
                                                                            <span class="m-2">Video</span>
                                                                            <input id="video" value="<?php echo $videodata["url"]; ?>" class="form-control mt-2">
                                                                        </div>


                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                        <button type="button" class="btn btn-primary" onclick="updateVideoProcess(<?php echo $videodata['id']; ?>);">Update Video</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>

                                        </div>
                                    </div>
                                    <!-- Video Div  -->
                                </div>
                            </div>

                            <!-- resources Div  -->
                            <div id="resources" class="tabcontent col-12">
                                <div class="row g-12">
                                    <span class="fw-bold fs-1 m-3">Resources</span>

                                    <div class="col-12 d-flex justify-content-end">
                                        <div class="row">
                                            <!-- <a href="uploadVideo.php">
                                                <button type="button" class="btn btn-outline-info ">
                                                    Upload New Video
                                                </button>

                                            </a> -->

                                            <!-- resource upload modal button -->
                                            <button type="button" class="btn btn-outline-info me-3" data-bs-toggle="modal" data-bs-target="#exampleModalrs">
                                                Upload New Resource
                                            </button>
                                            <button class="btn btn-outline-warning mt-2" onclick="printresource();">print Report</button>
                                            <?php
                                            $rssubrs = Database::search("SELECT * FROM `subject`");

                                            $rsteachrs = Database::search("SELECT * FROM `user` INNER JOIN `user_type` ON `user`.`user_type_id` = `user_type`.`id` WHERE `type` ='Teacher' ");

                                            $rssubnum = $rssubrs->num_rows;
                                            $rsteachnum = $rsteachrs->num_rows;

                                            ?>

                                            <!-- resource upload Modal -->
                                            <div class="modal fade" id="exampleModalrs" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Upload Resource</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="col-12">
                                                                <div class="row g-2">
                                                                    <div class="col-6">
                                                                        <span>Select Subject</span>


                                                                        <select name="" class="form-select mt-2" id="rssubject">

                                                                            <?php
                                                                            for ($i = 0; $i < $rssubnum; $i++) {
                                                                                $rssubdata = $rssubrs->fetch_assoc();
                                                                            ?>

                                                                                <option value="<?php echo ($rssubdata["id"]); ?>"><?php echo ($rssubdata["name"]); ?></option>
                                                                            <?php
                                                                            }
                                                                            ?>
                                                                            <!-- <option value="1">Com.Maths</option>
                                                                            <option value="2">Chemistry</option>
                                                                            <option value="3">Physics</option> -->
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <span>Select Teacher</span>
                                                                        <select name="" class="form-select mt-2" id="rsteacher">

                                                                            <?php
                                                                            for ($i = 0; $i < $rsteachnum; $i++) {
                                                                                $rsteachdata = $rsteachrs->fetch_assoc();
                                                                            ?>

                                                                                <option value="<?php echo ($rsteachdata["mobile"]); ?>"><?php echo ($rsteachdata["first_name"] . " " . $rsteachdata["last_name"]); ?></option>
                                                                            <?php
                                                                            }
                                                                            ?>
                                                                            <!-- <option value="1">Prasad Madusanka</option>
                                                                            <option value="2">Sajith K. Kumara</option>
                                                                            <option value="3">Mr.Physics</option> -->
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-12 mt-2">
                                                                <span class="m-2">Title</span>
                                                                <input type="text" id="rstitle" class="form-control mt-2">
                                                            </div>

                                                            <div class="col-12 mt-2">
                                                                <span class="m-2">Description</span>
                                                                <textarea class="form-control" id="rsdesc" class="mt-2" id="exampleFormControlTextarea1" rows="3"></textarea>
                                                            </div>



                                                            <div class="alert alert-info mt-3">
                                                                <label for="Info">Please make sure your resource / tute before upload to web.</label>
                                                            </div>

                                                            <div class="col-12 mt-1">
                                                                <span class="m-2">Resource</span>
                                                                <input id="rs" type="file" class="form-control mt-2">
                                                            </div>


                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="button" class="btn btn-primary" onclick="uploadResource();">Upload Video</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-10 offset-1 mt-5">
                                        <div class="row table-responsive" id="resourcetable">
                                            <table class="table" >
                                                <thead>
                                                    <!-- php code -->
                                                    <?php
                                                    $resourceTablers = Database::search("SELECT * FROM `resources` INNER JOIN `subject` ON `resources`.`subject_id` = `subject`.`id`  INNER JOIN `user` ON `resources`.`user_mobile` = `user`.`mobile`");
                                                    $resourcestablenum = $resourceTablers->num_rows;
                                                    ?>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <!-- <th scope="col">Thumbnail</th> -->
                                                        <th scope="col">Title</th>
                                                        <th scope="col">Description</th>
                                                        <th scope="col">Subject</th>
                                                        <th scope="col">Teacher</th>
                                                        <th scope="col">Status</th>
                                                        <th scope="col"></th>
                                                        <th scope="col"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php
                                                    $resourcecount = 0;
                                                    for ($y = 0; $y < $resourcestablenum; $y++) {
                                                        $resourcesTabledata =  $resourceTablers->fetch_assoc();
                                                        $resourcecount++;
                                                    ?>

                                                        <tr>
                                                            <th scope="row"><?php echo $resourcecount ?></th>
                                                            <!-- <td><img src="images/icon.png" height="50px" alt="" srcset=""></td> -->
                                                            <td><?php echo $resourcesTabledata["title"]; ?></td>
                                                            <td><?php echo $resourcesTabledata["description"]; ?></td>
                                                            <td><?php echo $resourcesTabledata["name"]; ?></td>
                                                            <td><?php echo $resourcesTabledata["first_name"] . " " . $resourcesTabledata["last_name"]; ?></td>

                                                            <?php
                                                            if ($resourcesTabledata["status_id"] == "1") {
                                                            ?>
                                                                <td><button class="btn btn-success" onclick="resourcesStatusChanger(<?php echo $resourcesTabledata['id']; ?>);">Active</button>
                                                                <?php
                                                            } else {
                                                                ?>
                                                                <td><button class="btn btn-danger" onclick="resourcesStatusChanger(<?php echo $resourcesTabledata['id']; ?>);">Deactive</button>
                                                                <?php
                                                            }
                                                                ?>
                                                                </td>
                                                                <td><button type="button" class="btn btn-outline-info me-3" onclick="updateResources(<?php echo $resourcesTabledata['id']; ?>);">
                                                                        Update
                                                                    </button></td>
                                                                <td><button class="btn btn-outline-warning">View</button></td>





                                                        </tr>



                                                        <div class="modal fade" id="updateResources<?php echo $resourcesTabledata['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Update Resource </h1>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="col-12">
                                                                            <div class="row g-2">
                                                                                <div class="col-6">
                                                                                    <span>Select Subject</span>
                                                                                    <select name="" disabled class="form-select mt-2" id="rssubject<?php echo $resourcesTabledata['id']; ?>">
                                                                                        <option value="<?php echo ($resourcesTabledata["subject_id"]); ?>"><?php echo ($resourcesTabledata["name"]); ?></option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="col-6">
                                                                                    <span>Select Teacher</span>
                                                                                    <select name="" disabled class="form-select mt-2" id="rsteacher<?php echo $resourcesTabledata['id']; ?>">
                                                                                        <option value="<?php echo $resourcesTabledata['user_mobile']; ?>"><?php echo $resourcesTabledata["first_name"] . " " . $resourcesTabledata["last_name"]; ?></option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-12 mt-2">
                                                                            <span class="m-2">Title</span>
                                                                            <input type="text" value="<?php echo $resourcesTabledata['title']; ?>" id="uprstitle<?php echo $resourcesTabledata['id']; ?>" class="form-control mt-2">
                                                                        </div>

                                                                        <div class="col-12 mt-2">
                                                                            <span class="m-2">Description</span>
                                                                            <textarea class="form-control" id="uprsdesc<?php echo $resourcesTabledata['id']; ?>" class="mt-2" rows="3"><?php echo $resourcesTabledata['description']; ?></textarea>
                                                                        </div>

                                                                        <div class="col-12 mt-1">
                                                                            <span class="m-2">Resource</span>
                                                                            <input id="rs<?php echo $resourcesTabledata['id']; ?>" disabled value="<?php echo $resourcesTabledata['url']; ?>" class="form-control mt-2">
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                        <button type="button" class="btn btn-outline-info me-3" onclick="updateResourceProcess(<?php echo $resourcesTabledata['id']; ?>);">Update Resource</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    <?php

                                                    }

                                                    ?>






                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- resources Div  -->

                        <!-- user Div  -->

                        <!-- user php -->
                        <?php

                        $user_rs = Database::search("SELECT * FROM `user` INNER JOIN `user_type` ON `user`.`user_type_id` = `user_type`.`id` INNER JOIN `status` ON `user`.`user_status_id`= `status`.`id`");
                        $user_num = $user_rs->num_rows;
                        ?>

                        <!-- user php -->
                        <div id="users" class="tabcontent col-10 offset-1 " i>
                            <div class="row table-responsive g-12" id="usertable">
                                <span class="fw-bold fs-1 m-3">Users</span>
                                <button class="col-3 btn btn-outline-warning mt-2" onclick="printusers();">print Report</button>


                                <table class="table">
                                    <thead>


                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Mobile</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Nic</th>
                                            <th scope="col">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $userid = 0;
                                        for ($i = 0; $i < $user_num; $i++) {
                                            $userdata = $user_rs->fetch_assoc();
                                            $userid++;

                                        ?>
                                            <tr>
                                                <th scope="row"><?php echo $userid ?></th>
                                                <td><?php echo $userdata["first_name"] . " " . $userdata["last_name"]; ?></td>
                                                <td><?php echo $userdata["mobile"] ?></td>
                                                <td><?php echo $userdata["email"] ?></td>
                                                <td><?php echo $userdata["nic"] ?></td>

                                                <?php
                                                if ($userdata["user_status_id"] == 1) {
                                                ?>
                                                    <td><button class="btn btn-success" onclick="userStatusChanger('<?php echo $userdata['mobile']; ?>');">Active</button>
                                                    </td>
                                                <?php
                                                } else {
                                                ?>
                                                    <td><button class="btn btn-danger" onclick="userStatusChanger('<?php echo $userdata['mobile']; ?>');">Deactive</button>
                                                    </td>
                                                <?php
                                                }
                                                ?>
                                            </tr>

                                        <?php
                                        }

                                        ?>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- user Div  -->


                    </div>
                </div>
                <!-- content area  -->

            </div>
        </div>


    </div>

    <!-- <footer class="col-12 d-grid justify-content-center align-items-end bottom-100 bg-dark-subtle text-wrap">
        <div class="col-12">
            <div class="row">
                <div class="fs-5 fw-semibold">Everwin&copy; All Right Reserved.</div>

            </div>

        </div>
    </footer> -->
    </div>

    <script src="script.js"></script>
    <script src="bootstrap.bundle.js"></script>
    <script src="bootstrap.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js/dist/chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>