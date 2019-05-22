<?php
    require "connection.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Update Record</title>
        <link rel="stylesheet" type="text/css" href="updateStyle.css">
    </head>
    <div class="button">
        <a href="index.html" class="btn">Home</a>
        <a href="DisplayRecord.php" class="btn">View Record</a>
    </div>

    <?php
        if(is_null($_GET["id"]))
            header("location: DisplayRecord.php");
        $id = $_GET["id"];

        $query1 = "select * from teacher_info where id = '$id'";
        $data = mysqli_query($conn, $query1);

        if(mysqli_num_rows($data) == 0)
            header("location: DisplayRecord.php");
        $row = mysqli_fetch_assoc($data);

        $old_name = $row["name"];
        $old_phone = $row["phone"];
        $old_course = $row["course"];
        $old_block = $row["block"];
        $old_date = $row["joined_date"];
        $old_email = $row["email"];

        $name2 = isset($_POST["name"])? $_POST["name"]:$old_name;
        $phone2 = isset($_POST["phone"])? $_POST["phone"]:$old_phone;
        $course2 = isset($_POST["course"])? $_POST["course"]:$old_course;
        $block2 = isset($_POST["block"])? $_POST["block"]:$old_block;
        $date2 = isset($_POST["date"])? $_POST["date"]:$old_date;
        $email2 = isset($_POST["email"])? $_POST["email"]:$old_email;

    ?>

    <body>

    <div class="update">

        <img src="logo.png" alt="Harvard logo" class="logo">
        <h2>Update Record</h2>

        <?php
        require "Validation.php";
        ?>


        <form method="POST" action="update.php?id=<?php echo $id; ?>">
            &nbsp;&nbsp;&nbsp;&nbsp;Name:<br>&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="name" value="<?php echo $name2; ?>"><span class="errors"><?php echo $name_err; ?></span><br>
            &nbsp;&nbsp;&nbsp;&nbsp;Phone:<br>&nbsp;&nbsp;&nbsp;&nbsp;<input type="number" name="phone" value="<?php echo $phone2; ?>"><span class="errors"><?php echo $phone_err; ?></span><br>
            &nbsp;&nbsp;&nbsp;&nbsp;Course:<br>&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="course" value="<?php echo $course2; ?>"><span class="errors"><?php echo $course_err; ?></span><br>
            &nbsp;&nbsp;&nbsp;&nbsp;Block:<br>&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="block" value="<?php echo $block2; ?>"><span class="errors"><?php echo $block_err; ?></span><br>
            &nbsp;&nbsp;&nbsp;&nbsp;Joined Date:<br>&nbsp;&nbsp;&nbsp;&nbsp;<input type="date" name="date" value="<?php echo $date2; ?>"><br>
            &nbsp;&nbsp;&nbsp;&nbsp;Email:<br>&nbsp;&nbsp;&nbsp;&nbsp;<input type="" name="email" value="<?php echo $email2; ?>"><span class="errors"><?php echo $email_err; ?></span><br><br>
            &nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="submit" value="Update"><br>
        </form>


        <?php
        if(isset($_POST["submit"])){
            $updated_name = $_POST["name"];
            $updated_phone = $_POST["phone"];
            $updated_course = $_POST["course"];
            $updated_block = $_POST["block"];
            $updated_date = $_POST["date"];
            $updated_email = $_POST["email"];

            if($updated_name!='' && $updated_phone!='' && $updated_course!='' &&
                $updated_block!='' && $updated_date!='' && $updated_email!='' ){

                $query2 = "update teacher_info set name='$updated_name', phone='$updated_phone', course='$updated_course',
                                block='$updated_block', joined_date='$updated_date', email='$updated_email' where id='$id'";
                $run_query = mysqli_query($conn, $query2);

                if($run_query == true){
                    if ($name_err == "" && $phone_err == "" && $course_err == "" && $block_err == "" && $email_err == ""){
                        if($old_name!=$updated_name || $old_phone!=$updated_phone || $old_course!=$updated_course ||
                            $old_block!=$updated_block || $old_date!=$updated_date || $old_email!=$updated_email){

                            echo "<b><br><br>Your Data has been UPDATED.</b><br>";

                            echo "<h3>New Values</h3><br>";
                            echo "Name: $updated_name<br>";
                            echo "Phone Number: $updated_phone <br>";
                            echo "Course: $updated_course<br>";
                            echo "Block: $updated_block<br>";
                            echo "Date: $updated_date<br>";
                            echo "Email: $updated_email<br>";
                        }
                        else
                            echo "Contents are Similar to stored data!!<br>";
                    }

                }
                else
                    echo "<b>Record not Updated!!!</b><br>";
            }
            else
                echo "Fill up all the Fields!!!<br>";
        }
        ?>

    </div>

    </body>

</html>
