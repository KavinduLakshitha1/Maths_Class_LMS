<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot password</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row">

            <div id="forgotpassword" class="col-12 p-lg-5 d-flex  justify-content-center ">
                <div class="row">
                    <div class="col-12  p-5 mt-2 d-flex ">
                        <div class="row  align-items-center">

                            <div class="col-12 col-lg-12 bg-dark border border-1 border-black text-light p-4 ms-lg-5 rounded-4 shadow-lg">
                                <div class="row">
                                    <label class="fs-2 fw-bold mb-2 text-center">Change Password</label>
                                    <div class="col-12 d-none" id="msgdiv1">
                                        <div class="alert alert-danger" role="alert" id="msg1">

                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 mt-2">
                                    <div class="row">

                                        <span class="fw-bold">New Passsword</span>
                                        <div class="input-group mb-3 mt-2">
                                            <span class="input-group-text" id="basic-addon1">****</span>
                                            <input type="password" id="password1" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1">
                                        </div>

                                    </div>
                                </div>
                                <div class="col-12 mt-2">
                                    <div class="row">

                                        <span class="fw-bold">Re type Passsword</span>
                                        <div class="input-group mb-3 mt-2">
                                            <span class="input-group-text" id="basic-addon1">****</span>
                                            <input type="password" id="re-password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1">
                                        </div>

                                    </div>
                                </div>

                                <div class="col-12 mt-2 mb-3">
                                    <label class="form-label">Verification Code</label>
                                    <input type="text" class="form-control" value="<?php echo $_GET["code"]; ?>" id="vcode" />
                                </div>



                                <button class="col-12 mt-2 col-lg-7 btn btn-success" onclick="resetpassword();">Update Password</button>
                               <a href="index.php"><button class="col-12 mt-2 col-lg-4 btn btn-outline-danger" >
                                    Back to Sign In
                                </button></a> 
                            </div>

                        </div>


                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>