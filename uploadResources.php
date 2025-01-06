<?php


include "connection.php";


$subject = $_POST["subject"];
$teacher = $_POST["teacher"];
$title = $_POST["title"];
$desc = $_POST["desc"];

if (empty($subject)) {
    echo ("Please select a subject");
} elseif (empty($teacher)) {
    echo ("Please select a teacher");
} elseif (empty($title)) {
    echo ("Please enter your title");
} elseif (empty($desc)) {
    echo ("Please enter your description");
} else {
    if (isset($_FILES["resource"]) && $_FILES["resource"]["error"] == 0) {
        $resource = $_FILES["resource"];
        $file_type = $resource["type"];
        $file_extension = pathinfo($resource["name"], PATHINFO_EXTENSION);
        $allowed_file_extensions = array("pdf", "docx", "doc", "txt");

        if (in_array($file_extension, $allowed_file_extensions)) {
            $new_extension = "." . $file_extension;
            $file_name = "file/resources/" . $title . "_" . uniqid() . $new_extension;

            if (move_uploaded_file($resource["tmp_name"], $file_name)) {
                $d = new DateTime();
                $tz = new DateTimeZone("Asia/Colombo");
                $d->setTimezone($tz);
                $date = $d->format("Y-m-d H:i:s");

                
                Database::iud("INSERT INTO `resources`(`url`,`uploaded_date`,`title`,`description`,`status_id`,`subject_id`,`user_mobile`) VALUES('$file_name', '$date', '$title', '$desc', '1', '$subject', '$teacher')");
                echo ("Success");
            } else {
                echo ("Error moving the uploaded file");
            }
        } else {
            echo ("Invalid file type. Allowed types are: " . implode(", ", $allowed_file_extensions));
        }
    } else {
        echo ("Please select your resource");
    }
}

// $subject = $_POST["subject"];
// $teacher = $_POST["teacher"];
// $title = $_POST["title"];
// $desc = $_POST["desc"];

// if (empty($subject)) {
//     echo ("Please select subject");
// } elseif (empty($teacher)) {
//     echo ("Please select teacher");
// } elseif (empty($title)) {
//     echo ("Please enter your title");
// } elseif (empty($desc)) {
//     echo ("Pleaase enter your description");
// } else {
//     $resource = $_FILES["resource"];

//     if (sizeof($_FILES)==1) {
//         $file_extention = $resource["type"];
//         $allowed_file_extention = array("pdf", "docx", "doc", "txt");

//         if (in_array($file_extention, $allowed_file_extention)) {
//             $new_file_extention;

//             if ($file_extention == "pdf") {
//                 $new_file_extention == ".pdf";
//             } elseif ($file_extention == "docx") {
//                 $new_file_extention == ".docx";
//             } elseif ($file_extention == "doc") {
//                 $new_file_extention == ".doc";
//             } elseif ($file_extention == "txt") {
//                 $new_file_extention == ".txt";
//             }

//             $file_name = "file//resources//" . $title . "_" . uniqid() . $new_extention;
//             move_uploaded_file($file["tmp_name"], $file_name);


//             $d = new DateTime();
//             $tz = new DateTimeZone("Asia/Colombo");
//             $d->setTimezone($tz);
//             $date = $d->format("Y-m-d H:i:s");

//             Database::iud("INSERT INTO `resources`(`url`,`uploaded_date`,`title`,`description`,`status_id`,`subject_id`,`user_mobile`) VALUES('$file_name','$date','$title','$desc','1','$subject,'$teacher')");
//             echo ("success");
//         }
//         echo ("some thing went wrong");
//     } else {
//         echo ("Please select your resource");
//     }
// }
?>



