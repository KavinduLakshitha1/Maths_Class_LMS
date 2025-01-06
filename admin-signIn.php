<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Sign In</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap.css">
</head>

<body>

    <!-- signIn -->
    <div id="signInBox" class="col-12 p-lg-5 d-flex  justify-content-center ">
        <div class="row">
            <div class="col-12  p-5 mt-2 d-flex ">
                <div class="row  align-items-center">

                    <div class="col-12 col-lg-12 bg-dark border border-1 border-black text-light p-4 ms-lg-5 rounded-4 shadow-lg">
                        <div class="row">
                            <label class="fs-2 fw-bold mb-2 text-center">Admin Sign In </label>
                            <!-- <div class="col-12 d-none" id="msgdiv1">
                                        <div class="alert alert-danger" role="alert" id="msg1">

                                        </div>
                                    </div> -->
                        </div>


                        <span class="mb-4 fw-bold">Email</span>
                        <div class="form-floating mt-2">
                            <input type="email" id="adminemail" class="form-control" id="floatingInputGrid" placeholder="07********">
                            <label for="floatingInputGrid" class="text-dark-emphasis">Email</label>
                        </div>
                        <div class="col-12 mt-2">
                            <div class="row">

                                <span class="fw-bold">Passsword</span>
                                <div class="input-group mb-3 mt-2">
                                    <span class="input-group-text" id="basic-addon1">****</span>
                                    <input type="password" id="adminpassword" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1">
                                </div>

                            </div>
                        </div>


                        <button class="col-12 mt-2  btn btn-success" onclick="adminsignIn();">Sign
                            In</button>

                    </div>

                </div>


            </div>
        </div>
    </div>
    <!-- signIn -->


    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>