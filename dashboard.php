<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<?php

include "connection.php";
session_start();

if (isset($_SESSION["user"])) {

?>

    <head>
        <meta charset="UTF-8">
        <meta name="keywords" content="Maths, ">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard</title>
        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="style.css" />
    </head>

    <body class="overflow-x-hidden" onload="loadchart();">
        <div class="container-fluid vh-100">
            <div class="row">
                <div class="col-12 ">
                    <div class="row">


                        <!-- dashboard menu -->
                        <div class="col-md-2 col-12 bg-success-subtle shadow-lg ">
                            <div class="row">
                                <div class="col-10 offset-1 d-grid justify-content-center mt-2 ">
                                    <div class="row">
                                        <div class="col-10 d-grid justify-content-center offset-1">
                                            <div class="row">

                                                <img class="h-auto w-auto rounded rounded-circle" src="images/icon.png" alt="" />
                                            </div>

                                        </div>
                                        <div class="col-10 offset-1 text-center">
                                            <div class="fw-semibold mt-4">Prasad Madusanka</div>

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
                                                <div id="tabs" class="col-12  mt-5 d-flex justify-content-center fw-bold fs-5">
                                                    <div class="row g-3 align-items-center list-unstyled">
                                                        <button class="btn btn-success p-3 tablinks" id="defaultOpen" onclick="contentloader(event, 'dashboard');">Dashboard</button>
                                                        <button class="btn  p-3 tablinks" onclick="contentloader(event, 'profile');">Profile</button>
                                                        <button class="btn p-3 tablinks" onclick="contentloader(event, 'videoDiv');">video</button>
                                                        <button class="btn p-3 tablinks" onclick="contentloader(event,'resources');">Resources</button>
                                                        <button class="btn p-3 tablinks" onclick="contentloader(event,'payment');">Payment</button>
                                                    </div>

                                                </div>
                                                <form class="d-flex mt-3" role="search">
                                                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                                                    <button class="btn btn-outline-success" type="submit">Search</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </nav>

                                <div id="tabs" class="col-12 d-none d-md-block mt-5 d-md-flex justify-content-center fw-bold fs-5">
                                    <div class="row g-3 align-items-center list-unstyled">
                                        <button class="btn btn-success p-3 tablinks" id="defaultOpen" onclick="contentloader(event, 'dashboard');">Dashboard</button>
                                        <button class="btn  p-3 tablinks" onclick="contentloader(event, 'profile');">Profile</button>
                                        <button class="btn p-3 tablinks" onclick="contentloader(event, 'videoDiv');">video</button>
                                        <button class="btn p-3 tablinks" onclick="contentloader(event,'resources');">Resources</button>
                                        <button class="btn p-3 tablinks" onclick="contentloader(event,'payment');">Payment</button>
                                    </div>

                                </div>

                                <!-- <div class="col-12 d-grid fixed-bottom text-wrap">
                                    <div class="row">

                                        <span class="fw-semibold">Prasad Sir&copy; All Right Reserved.</span>
                                    </div>
                                </div> -->

                            </div>
                        </div>
                        <!-- dashboard menu  -->

                        <!-- content area  -->
                        <div class="col-12 col-md-10 overflow-y-visible" id="container">
                            <div class="row">
                                <!-- dashboard Div  -->
                                <div id="dashboard" class="active tabcontent col-12">
                                    <div class="row">
                                        <span class="fw-bold fs-1 m-3">Dashboard</span>
                                        <div class="col-12 col-lg-10 offset-1 ms-3 d-flex align-items-center justify-content-center">
                                            <div class="row justify-content-center">

                                                <?php
                                                for ($i = 0; $i < 10; $i++) {

                                                ?>

                                                    <div class="card m-2 " style="width: 18rem;">
                                                        <!-- <img src="..." class="card-img-top" alt="..."> -->
                                                        <div class="card-body">
                                                            <h5 class="card-title">Combine Maths</h5>
                                                            <p class="card-text">Date <?php date("d M Y H:i:s"); ?></div>
                                                        <ul class="list-group list-group-flush">
                                                            <li class="list-group-item">An item</li>
                                                            <li class="list-group-item">A second item</li>
                                                            <li class="list-group-item">A third item</li>
                                                        </ul>
                                                        <div class="card-body">
                                                            <a href="#" class="card-link">Card link</a>
                                                            <a href="#" class="card-link">Another link</a>
                                                        </div>
                                                    </div>


                                                <?php

                                                }
                                                ?>

                                            </div>
                                        </div>

                                        <!-- <div class="col-10 offset-1 card">
                                            <span class="fs-3 fw-bold m-4">Your Progress in papers</span>
                                            <canvas id="chart1" height="400px"></canvas>
                                        </div> -->

                                    </div>
                                </div>
                                <!-- dashboard Div  -->

                                <!-- Profile Div  -->

                                <!-- php code for profile-->
                                <?php


                                $mobile = $_SESSION["user"]["mobile"];

                                $profilers = Database::search("SELECT * FROM `user` INNER JOIN `gender` ON `user`.`gender_id`=`gender`.`id` WHERE `mobile`='$mobile'");
                                $profiledata = $profilers->fetch_assoc();






                                ?>

                                <!-- php code for profile-->

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
                                                            <input type="text" class="form-control" value="<?php echo $profiledata["first_name"]; ?>" name="" id="fname">
                                                        </div>

                                                        <div class="col-6 ">
                                                            <span for="name">Last Name</span>
                                                            <input type="text" class="form-control" value="<?php echo $profiledata["last_name"]; ?>" name="" id="lname">
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="row">
                                                        <span for="name">Email</span>
                                                        <div class="col-12 ">
                                                            <input type="email" class="form-control" name="" value="<?php echo $profiledata["email"]; ?>" id="email">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="row">
                                                        <span for="name">NIC</span>
                                                        <div class="col-12 ">
                                                            <input type="text" class="form-control" value="<?php echo $profiledata["nic"]; ?>" name="" id="nic">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="row">
                                                        <span for="name">Mobile</span>
                                                        <div class="col-12 ">
                                                            <input type="tel" class="form-control" name="" id="mobile" value="<?php echo $profiledata["mobile"]; ?>">
                                                        </div>
                                                    </div>
                                                </div>



                                                <div class="col-12">
                                                    <div class="row">
                                                        <button class="btn btn-outline-success" onclick="updateProfile();">Update Profile</button>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Profile Div  -->

                                <!-- Video Div  -->
                                <div id="videoDiv" class="col-10 tabcontent offset-1">
                                    <div class="row">
                                        <span class="fw-bold fs-1 m-3">Video</span>

                                        <?php
                                        $videors = Database::search("SELECT * FROM `video` INNER JOIN `user` ON `video`.`user_mobile` = `user`.`mobile` INNER JOIN `subject` ON `video`.`subject_id` = `subject`.`id` ");
                                        $videonum = $videors->num_rows;

                                        for ($i = 0; $i < $videonum; $i++) {
                                            $videodata = $videors->fetch_assoc();
                                        ?>

                                            <div class="col-5 m-2 p-3" onclick="showVideo(<?php echo $videodata['id']; ?>);">
                                                <div class="row">
                                                    <div class="col-12 rounded rounded-3 ">

                                                        <video poster="<?php echo $videodata["thumbnail"] ?>" class="rounded-4" height="200px">
                                                            <source>
                                                            </source>
                                                        </video>

                                                    </div>
                                                    <div class="col-12">
                                                        <span class="fs-5">Title : <?php echo $videodata["title"]; ?></span>
                                                        <!-- <div>Description : <?php // echo $videodata["description"]; 
                                                                                ?></div> -->
                                                        <div class="fs-5">Teacher : <?php echo $videodata["first_name"] . " " . $videodata["last_name"] ?></div>
                                                        <div class="fs-5">Subject : <?php echo $videodata["name"]; ?></div>
                                                    </div>
                                                </div>
                                            </div>

                                        <?php
                                        }
                                        ?>




                                    </div>
                                </div>
                                <!-- Video Div  -->

                                <!-- resources Div  -->
                                <div id="resources" class="tabcontent col-12">
                                    <div class="row g-12">
                                        <span class="fw-bold fs-1 m-3">Resources</span>
                                        <?php
                                        $resourcers = Database::search("SELECT * FROM `resources` INNER JOIN `subject` ON `resources`.`subject_id` = `subject`.`id`  INNER JOIN `user` ON `resources`.`user_mobile` = `user`.`mobile`");
                                        $resourcesnum = $resourcers->num_rows;

                                        for ($i = 0; $i < $resourcesnum; $i++) {
                                            $resourcesdata = $resourcers->fetch_assoc();
                                        ?>
                                            <div class=" m-3 p-3 border " style="width: 18rem;">
                                                <img src="images/sheet_16384126.png" class="card-img-top" alt="...">
                                                <div class="card-body">
                                                    <h5 class="card-title"><?php echo $resourcesdata["title"]; ?></h5>
                                                    <p class="card-text"><?php echo $resourcesdata["description"]; ?></p>
                                                    <div class="card-text"><?php echo $resourcesdata["name"]; ?></div>
                                                    <div class="card-text mb-2"><?php echo $resourcesdata["first_name"] . " " . $resourcesdata["last_name"]; ?></div>
                                                    <a href="<?php echo $resourcesdata["url"]; ?>" download="<?php echo $resourcesdata["title"]; ?>" class="btn d-flex justify-content-center btn-primary">Download</a>
                                                </div>
                                            </div>
                                        <?php
                                        }
                                        ?>

                                    </div>
                                </div>
                                <!-- resources Div  -->
                                <!-- payment div -->

                                <div id="payment" class="active tabcontent col-12">
                                    <div class="row">
                                        <span class="fw-bold fs-1 m-3">Payments</span>

                                        <!-- <div>Pay for Classes</div> -->
                                        <?php
                                        $subrs = Database::search("SELECT * FROM `subject`");

                                        $teachrs = Database::search("SELECT * FROM `user` INNER JOIN `user_type` ON `user`.`user_type_id` = `user_type`.`id` WHERE `type` ='Teacher' ");

                                        $subnum = $subrs->num_rows;
                                        $teachnum = $teachrs->num_rows;


                                        ?>


                                        <div class="col-6 offset-3 border rounded-3 p-4">
                                            <div class="row">
                                                <span class="fs-3 fw-bold m-3">Select classes to pay</span>
                                                <hr />
                                                <div class="col-12 col-md-6">
                                                    <span class="fw-bold fs-6">Select Subject</span>
                                                    <Select class="form-select" id="paymentsubject">
                                                        <?php
                                                        for ($i = 0; $i < $subnum; $i++) {
                                                            $subdata = $subrs->fetch_assoc();
                                                        ?>

                                                            <option value="<?php echo ($subdata["id"]); ?>"><?php echo ($subdata["name"]); ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </Select>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <span class="fw-bold fs-6">Select Teacher</span>
                                                    <Select class="form-select" id="paymentteacher">
                                                        <?php
                                                        for ($i = 0; $i < $teachnum; $i++) {
                                                            $teachdata = $teachrs->fetch_assoc();
                                                        ?>

                                                            <option value="<?php echo ($teachdata["mobile"]); ?>"><?php echo ($teachdata["first_name"] . " " . $teachdata["last_name"]); ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </Select>
                                                </div>
                                                <div class="col-12 col-md-6 mt-2">
                                                    <span class="fw-bold fs-6">Select Month</span>
                                                    <input class="form-control mt-2" type="month" name="" id="paymentmonth">
                                                </div>
                                                <div class="d-none">
                                                    <input type="text" hidden value="<?php echo $mobile; ?>" name="" id="userpaymobile">

                                                </div>
                                                <div class="col-12 mt-3">
                                                    <button class="col-12 btn btn-outline-primary" onclick="addToCheckOut();">Add to checkout</button>
                                                </div>


                                            </div>
                                        </div>

                                        <?php





                                        $checkputrs = Database::search("SELECT * FROM `checkout` INNER JOIN `class` ON `checkout`.`class_id`= `class`.`id`   WHERE `checkout`.`user_mobile`='" . $mobile . "'");
                                        $checkoutnum = $checkputrs->num_rows;
                                        $total = 0;



                                        for ($i = 0; $i < $checkoutnum; $i++) {
                                            $checkoutdata = $checkputrs->fetch_assoc();
                                            $classrs = Database::search("SELECT * FROM `class` INNER JOIN `subject` ON `class`.`subject_id` = `subject`.`id` INNER JOIN `user` ON `class`.`user_mobile` = `user`.`mobile` WHERE `class`.`id`='" . $checkoutdata["id"] . "'");
                                            $classnum = $classrs->num_rows;
                                            $classdata = $classrs->fetch_assoc();

                                            $total = $total + $classdata["Price"];
                                        }

                                        ?>

                                        <div class="col-10 offset-1 border rounded-3 p-4 mt-4 mb-2 h-50">
                                            <div class="row">
                                                <span class="col-8 p-3 fs-2 fw-bold">Checkout</span>
                                                <div class="col-3 m-3 fs-6 fw-bold gap-2">
                                                    <div>Count of units: <?php echo $checkoutnum; ?></div>

                                                    <!-- <div>discount : 20%</div> -->
                                                    <div>Total : <?php echo $total; ?></div>
                                                    <button class=" col-12 mt-3 btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#videoUpdateModal">Pay Now</button>

                                                </div>

                                                <div class="modal fade" id="videoUpdateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Pay Now</h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="col-12">
                                                                    <div class="row g-2">
                                                                        <div class="col-6">
                                                                            <span>First Name</span>
                                                                            <input type="text" id="fname" class="form-control mt-2">
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <span>Last Name</span>
                                                                            <input type="text" id="lname" class="form-control mt-2">
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-12 mt-2">
                                                                    <span class="m-2">Address line 1</span>
                                                                    <input type="text" id="adl1" class="form-control mt-2">
                                                                </div>
                                                                <div class="col-12 mt-2">
                                                                    <span class="m-2">Address line 2</span>
                                                                    <input type="text" id="adl2" class="form-control mt-2">
                                                                </div>

                                                                <div class="col-12 mt-2">
                                                                    <span class="m-2">City</span>
                                                                    <input type="text" id="city" class="form-control mt-2">
                                                                </div>
                                                                <div class="col-12 mt-2">
                                                                    <span class="m-2">Email</span>
                                                                    <input type="email" id="payemail" class="form-control mt-2">
                                                                </div>
                                                                <div class="col-12 mt-2">
                                                                    <span class="m-2">Mobile Number</span>
                                                                    <input type="text" id="paymobile" class="form-control mt-2">
                                                                </div>

                                                                <div class="col-12 mt-2">
                                                                    <span class="m-2">Total</span>
                                                                    <input type="text" id="paytotal" value="<?php echo $total; ?>" class="form-control mt-2">
                                                                </div>


                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <button type="button" class="btn btn-primary" onclick="paynowProcess();">Paynow</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr />
                                                <table class="table">
                                                    <thead>
                                                        <!-- php code -->

                                                        <tr>
                                                            <th scope="col">#</th>
                                                            <!-- <th scope="col">Thumbnail</th> -->
                                                            <th scope="col">Subject</th>
                                                            <th scope="col">Teacher</th>
                                                            <th scope="col">Fee price</th>

                                                            <th scope="col"></th>

                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                        <?php
                                                        // $resourceTablers = Database::search("SELECT * FROM `resources` INNER JOIN `subject` ON `resources`.`subject_id` = `subject`.`id`  INNER JOIN `user` ON `resources`.`user_mobile` = `user`.`mobile`");
                                                        // $resourcestablenum = $resourceTablers->num_rows;
                                                        $checkcount = 0;
                                                        for ($i = 0; $i < $checkoutnum; $i++) {

                                                            $checkcount++;
                                                        ?>
                                                            <tr>
                                                                <td class="d-none" id="paycheckid"><?php echo $checkoutdata["id"]; ?></td>
                                                                <td><?php echo $checkcount; ?></td>
                                                                <td><?php echo $classdata["name"]; ?></td>
                                                                <td><?php echo $classdata['first_name'] . " " . $classdata["last_name"]; ?></td>
                                                                <td><?php echo $classdata["Price"]; ?></td>
                                                                <td><button class="btn btn-danger" onclick="deletecheck(<?php echo $checkoutdata['id']; ?>);">Delete</button></td>
                                                            </tr>
                                                        <?php
                                                        }
                                                        ?>

                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>


                                    </div>
                                </div>

                                <!-- payment div -->

                            </div>
                        </div>
                        <!-- content area  -->

                    </div>
                </div>
            </div>

            <footer class="col-12 fixed-bottom d-grid justify-content-center align-items-end bottom-100 bg-dark-subtle text-wrap">
                <div class="col-12">
                    <div class="row">
                        <div class="fs-5 fw-semibold">Prasad Sir&copy; All Right Reserved.</div>

                    </div>

                </div>
            </footer>

        </div>

        <script src="script.js"></script>
        <script src="bootstrap.bundle.js"></script>
        <script src="bootstrap.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js/dist/chart.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
    </body>

</html>

<?php
} else {
    echo ("User not found");
}
?>