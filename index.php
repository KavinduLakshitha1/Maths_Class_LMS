<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap.css">
    <title>Sign In</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- signup -->

            <div id="signUpBox" class="col-12  d-none d-flex justify-content-center align-items-center ">
                <div class="row ">
                <!-- <label class="col-12 fs-2 fw-bold mb-2 text-center p-2">WELCOME TO EVERWIN
                </label> -->
                    <div class="col-12 rounded-3 p-4 ">
                        <div class="row ">

                            
                            <div class="col-12  bg-dark border border-1 border-black p-4 ms-lg-2 text-light rounded-4 shadow-lg">
                                <div class="row">


                                    <div class="col-12">
                                        <div class="row">
                                            <label class="fs-2 fw-bold mb-4 text-center text-light">Sign Up
                                            </label>
                                            <!-- <div class="col-12 d-none" id="msgdiv">
                                                <div class="alert alert-danger" role="alert" id="msg">

                                                </div>
                                            </div> -->

                                            <div class="col-12 col-lg-6 text-light ">
                                                <div class="row">
                                                    <span class="fw-bold">First Name</span>
                                                    <div class="input-group mb-3 mt-2">
                                                        <span class="input-group-text bg-dark-subtle" id="basic-addon1">@</span>
                                                        <input type="text" id="fname" class="form-control bg-dark-subtle" placeholder="First Name" aria-label="First Name" aria-describedby="basic-addon1">
                                                    </div>





                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-6">
                                                <div class="row">
                                                    <span class="fw-bold">Last Name</span>
                                                    <div class="input-group mb-3 mt-2">
                                                        <span class="input-group-text bg-dark-subtle" id="basic-addon1">@</span>
                                                        <input type="text" id="lname" class="form-control bg-dark-subtle" placeholder="Last Name" aria-label="Last Name" aria-describedby="basic-addon1">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <span class="mb-4 fw-bold">Mobile No </span>
                                <div class="input-group mb-3 mt-2">
                                    <span class="input-group-text bg-dark-subtle" id="basic-addon1">#</span>
                                    <input type="text" id="mobile" class="form-control bg-dark-subtle" placeholder="Mobile No-" aria-label="Last Name" aria-describedby="basic-addon1">
                                </div>

                                <span class="mb-4 fw-bold">Email Address </span>
                                <div class="form-floating mt-2">
                                    <input type="email" id="email" class="form-control bg-dark-subtle" id="floatingInputGrid" placeholder="name@example.com">
                                    <label for="floatingInputGrid " class="text-dark-emphasis ">Email
                                        address</label>
                                </div>
                                <span class="mb-4 fw-bold">NIC</span>
                                <div class="form-floating mt-2">
                                    <input type="text" id="nic" class="form-control bg-dark-subtle" id="floatingInputGrid" placeholder="">
                                    <label for="floatingInputGrid " class="text-dark-emphasis ">NIC </label>
                                </div>
                                <div class="col-12 mt-2">
                                    <div class="row">


                                        <div class="col-12 col-lg-6">
                                            <div class="row">
                                                <span class="fw-bold">Password</span>
                                                <div class="input-group mb-3 mt-2">
                                                    <span class="input-group-text bg-dark-subtle" id="basic-addon1">****</span>
                                                    <input type="password" id="password" class="form-control bg-dark-subtle" placeholder="Password" aria-label="First Name" aria-describedby="basic-addon1">
                                                </div>





                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <div class="row">
                                                <span class="fw-bold">Confirm Password</span>
                                                <div class="input-group mb-3 mt-2">
                                                    <span class="input-group-text bg-dark-subtle" id="basic-addon1">****</span>
                                                    <input type="password" class="form-control bg-dark-subtle" placeholder="Confirm Password" id="confirm-password" aria-label="Last Name" aria-describedby="basic-addon1">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <span class="mb-4 fw-bold">Gender</span>
                                <div class="input-group mb-3 mt-2">
                                    <label class="input-group-text bg-dark-subtle" for="inputGroupSelect01">I'm</label>
                                    <select class="form-select bg-dark-subtle" id="gender">


                                        <?php

                                        include "connection.php";

                                        $genders = Database::search("SELECT * FROM `gender`");
                                        $gendernum = $genders->num_rows;

                                        for ($i = 0; $i < $gendernum; $i++) {
                                            $genderdata = $genders->fetch_assoc();

                                        ?>

                                            <option value="<?php echo $genderdata["id"]; ?>">
                                                <?php echo $genderdata["type"]; ?>
                                            </option>
                                        <?php  } ?>

                                    </select>
                                </div>


                                <button class="col-12 mt-2 col-lg-4 btn btn-outline-success" onclick="signup();">Sign
                                    Up</button>
                                <button class="col-12 mt-2 col-lg-7 btn btn-danger" onclick="togglebox();">Already have
                                    an account? Sign In
                                </button>
                            </div>

                        </div>


                    </div>
                </div>
            </div>
            <!-- signup  -->

            <!-- signIn -->
            <div id="signInBox" class="col-12 p-lg-5 d-flex  justify-content-center ">
                <div class="row">
                    <div class="col-12  p-5 mt-2 d-flex ">
                        <div class="row  align-items-center">

                            <div class="col-12 col-lg-12 bg-dark border border-1 border-black text-light p-4 ms-lg-5 rounded-4 shadow-lg">
                                <div class="row">
                                    <label class="fs-2 fw-bold mb-2 text-center">Sign In </label>
                                    <!-- <div class="col-12 d-none" id="msgdiv1">
                                        <div class="alert alert-danger" role="alert" id="msg1">

                                        </div>
                                    </div> -->
                                </div>
                                <?php 
                                $mobile = "";
                                $password = "";
                                
                                if(isset($_COOKIE["mobile"])){
                                    $mobile = $_COOKIE["mobile"];
                                }

                                if(isset($_COOKIE["password"])){
                                    $password = $_COOKIE["password"];
                                }
                                
                                ?>

                                <span class="mb-4 fw-bold">Mobile</span>
                                <div class="form-floating mt-2">
                                    <input type="text" id="mobilenum" class="form-control" id="floatingInputGrid" placeholder="07********" value="<?php echo $mobile; ?>">
                                    <label for="floatingInputGrid" class="text-dark-emphasis">Mobile</label>
                                </div>
                                <div class="col-12 mt-2">
                                    <div class="row">

                                        <span class="fw-bold">Passsword</span>
                                        <div class="input-group mb-3 mt-2">
                                            <span class="input-group-text" id="basic-addon1">****</span>
                                            <input type="password" id="password1" value="<?php echo $password; ?>" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1">
                                        </div>

                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="row">
                                        <div class=" col-6">
                                            <input class="form-check-input" id="rme" type="checkbox" value="" id="defaultCheck1">
                                            <label class="form-check-label" for="defaultCheck1">
                                                Remember me
                                            </label>
                                        </div>
                                        <div class=" col-6">
                                            <a href="#" onclick="forgotpassword();">forgot Password?</a>
                                        </div>
                                    </div>
                                </div>



                                <div class="modal" tabindex="-1" id="fpmodal">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Forgot Password</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">

                                                <div class="row g-3">

                                                    <div class="col-6">
                                                        <label class="form-label">New Password</label>
                                                        <div class="input-group mb-3">
                                                            <input type="password" class="form-control" id="np" />
                                                            <button id="npb" class="btn btn-outline-secondary" type="button" onclick="showPassword1();">Show</button>
                                                        </div>
                                                    </div>

                                                    <div class="col-6">
                                                        <label class="form-label">Re-type Password</label>
                                                        <div class="input-group mb-3">
                                                            <input type="password" class="form-control" id="rnp" />
                                                            <button id="rnpb" class="btn btn-outline-secondary" type="button" onclick="showPassword2();">Show</button>
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <label class="form-label">Verification Code</label>
                                                        <input type="text" class="form-control" id="vcode" />
                                                    </div>

                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary" onclick="resetPassword();">Reset</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>






                                <button class="col-12 mt-2 col-lg-7 btn btn-success" onclick="signIn();">Sign
                                    In</button>
                                <button class="col-12 mt-2 col-lg-4 btn btn-outline-danger" onclick="togglebox();">
                                    Create Account
                                </button>
                            </div>

                        </div>


                    </div>
                </div>
            </div>
            <!-- signIn -->
        </div>
    </div>



    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>