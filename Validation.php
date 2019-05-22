<?php
$name = isset($_GET["name"])? trim($_GET["name"]) : "";
$phone = isset($_GET["phone"])? trim($_GET["phone"]) : "";
$course = isset($_GET["course"])? trim($_GET["course"]) : "";
$block = isset($_GET["block"])? trim($_GET["block"]) : "";
$email = isset($_GET["email"])? trim($_GET["email"]) : "";
$date = date("Y-m-d");

$name_err = "";
$phone_err = "";
$course_err = "";
$block_err = "";
$email_err = "";

if(isset($_GET["submit"])){
    if (empty($name))
        $name_err = "Please fill this field also!!!";
    elseif(!preg_match("/[a-zA-Z\\s]/", $name))
        $name_err = "This field contains Alphabets only!!!";
    elseif (strpos($name, " ") == false)
        $name_err = "Enter your full Name!!!";

    if (empty($phone))
        $phone_err = "Please fill this field also!!!";
    elseif (!preg_match("/[0-9]/", $phone))
        $phone_err = "This field contains Numbers only!!!";
    elseif (strlen($phone) != 10)
        $phone_err = "Please Enter valid Phone Number!!!";

    if (empty($course))
        $course_err = "Please fill this field also!!!";

    if (empty($block))
        $block_err = "Please fill this field also!!!";
    elseif (strlen($block) != 1 && $block >= 'A' && $block <= 'L')
        $block_err = "Invalid Block!!!";

    if (empty($email))
        $email_err = "Please fill this field also!!!";
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL))
        $email_err = "Please Enter Valid Email!!!";
}

?>
