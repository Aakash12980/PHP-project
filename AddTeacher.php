<?php
require "connection.php";
?>

<!DOCTYPE>
<html>
    <head>
        <title>Add New Teacher</title>
        <link rel="stylesheet" type="text/css" href="addStyle.css">
    </head>
    <body>
        <div class="login">
            <img src="logo.png" alt="Harvard logo" class="logo">
            <h2>Add New Teacher</h2>

            <?php
            require "Validation.php";
            ?>

            <form method="GET" action="AddTeacher.php">
                <table align="center">
                    <tr>
                        <td>Name:</td>
                        <td><input type="text" name="name" placeholder="Enter Name"
                                   value="<?php echo $name; ?>"><span class="errors"><?php echo $name_err; ?></span><br></td>
                    </tr>
                    <tr>
                        <td>Phone:</td>
                        <td> <input type="number" name="phone" placeholder="Enter Phone"
                                    value="<?php echo $phone; ?>"><span class="errors"><?php echo $phone_err; ?></span><br></td>
                    </tr>
                    <tr>
                        <td>Course:</td>
                        <td><input type="text" name="course" placeholder="Enter Course"
                                   value="<?php echo $course; ?>"><span class="errors"><?php echo $course_err; ?></span><br></td>
                    </tr>
                    <tr>
                        <td>Block:</td>
                        <td><input type="text" name="block" placeholder="Enter Block"
                                   value="<?php echo $block; ?>"><span class="errors"><?php echo $block_err; ?></span><br></td>
                    </tr>
                    <tr>
                        <td>Email:</td>
                        <td><input type="text" name="email" placeholder="Enter Email"
                                   value="<?php echo $email; ?>"><span class="errors"><?php echo $email_err; ?></span><br></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="submit" name="submit" value="ADD"><br></td>
                    </tr>
                </table>

            </form>

            <?php
            $name = ucwords($name);
            $block = ucwords($block);
            $course = ucwords($course);
            if (isset($_GET["submit"])){
                if ($name_err == "" && $phone_err == "" && $course_err == "" && $block_err == "" && $email_err == ""){
                    $query = "insert into teacher_info(name, phone, course, block, email, joined_date)
                               values('$name','$phone','$course','$block','$email','$date')";
                    $runQuery = mysqli_query($conn, $query);
                    if($runQuery == true){
                        echo "<p><b>You have added following Record.<br>";
                        echo "Name: ".$name;
                        echo "<br>Phone Number: ".$phone;
                        echo "<br>Course: ".$course;
                        echo "<br>Block: ".$block;
                        echo "<br>Email: ".$email."<br></p>";
                    }
                }

            }
            ?>

        </div>


    </body>
</html>

