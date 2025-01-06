<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap.css">
</head>

<body>


    <?php
    session_start();


    if (isset($_SESSION["user"])) {
        echo $_SESSION["user"]["mobile"];
        $oid = $_GET["id"];


        $invoice_rs = Database::search("SELECT * FROM `invoice` WHERE `order_id`='" . $oid . "'");
        $invoice_data = $invoice_rs->fetch_assoc();

    ?>

        <table style="width: 100%; font-family: cooper;">
            <tbody>
                <tr>
                    <td align="center">

                        <table style="max-width: 600px;">
                            <tr>
                                <td align="left" style="background-color: lightgreen; padding: 5%; border-radius: 20px;">
                                    <a href=""
                                        style="font-size :35px;  color:black; font-weight:bold; text-decoration: none;">Maths Class</a>
                                    <div style="margin: 10px;">Your future Education.</div>
                                    <hr />
                                    <div align="right">
                                        <div style="margin: 10px;">Powered by Media Unit.</div>
                                        <hr />

                                    </div>
                                </td>
                                <td>
                                    <span class="fs-2 fw-bold "><?php echo $_SESSION["user"]["first_name"] . " " . $_SESSION["user"]["last_name"] ?></span>
                                    <div><?php echo $_SESSION["user"]["mobile"] ?></div>


                                </td>

                            </tr>


                            <tr style="font-family: Verdana;">
                            <tr>
                                <th scope="col">#</th>
                                <!-- <th scope="col">Thumbnail</th> -->
                                <th scope="col">Id</th>
                                <th scope="col"></th>
                                <th scope="col">Subject</th>
                                <th scope="col">Teacher</th>
                                <th scope="col">Status</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            <tr>
                                <td scope="col">#</td>
                                <!-- <th scope="col">Thumbnail</th> -->
                                <td scope="col">Maths</td>
                                <td scope="col">2700</td>
                                
                            </tr>



                </tr>


                <tr>
                    <td align="center" style="background-color:darkgray; border-radius: 20px;">
                        <p style="font-weight: bold; ">&copy; 2024 Maths Class</p>
                    </td>
                </tr>

        </table>

        </td>
        </tr>

        </tbody>

        </table>
    <?php
    }
    ?>
</body>

</html>