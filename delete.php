<?php
    require "connection.php";
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Delete Record</title>
        <link rel="stylesheet" type="text/css" href="deleteStyle.css">
    </head>
    <body>
        <div class="delete">

            <?php
            if(is_null($_GET["id"]))
                header("Location: DisplayRecord.php");

            $id = $_GET["id"];

            $query = "select * from teacher_info where id = $id";
            $data = mysqli_query($conn, $query);
            if(mysqli_num_rows($data) == 0)
                header("Location: DisplayRecord.php");
            $row = mysqli_fetch_assoc($data);

            $name = $row["name"];
            $phone = $row["phone"];
            $course = $row["course"];
            $block = $row["block"];
            $date = $row["joined_date"];
            $email = $row["email"];

            echo "<h2>Are you sure to delete following data?</h2>";
            echo "<p class='data'>Id:          ".$id."<br>";
            echo "Name:        ".$name."<br>";
            echo "Phone No:    ". $phone."<br>";
            echo "Course:      ".$course."<br>";
            echo "Block:       ".$block."<br>";
            echo "Joined Date: ".$date."<br>";
            echo "Email:       ".$email."<br></p>";
            ?>
            <br>
        </div>
        <div class="box">
            <form method="POST" action="delete.php?id=<?php echo $id; ?>">
                <label class="radio">
                    <input type="radio" name="delete_data" value="yes">
                    <span class="yes">YES</span>
                </label>
                <label class="radio">
                    <input type="radio" name="delete_data" value="no" checked>
                    <span class="no">NO</span>
                </label>
                <br><br>
                <input type="submit" name="submit" value="GO">
            </form>


            <?php
            if (isset($_POST["submit"])) {
                if ($_POST["delete_data"] == 'yes') {
                    $delete_query = "delete from teacher_info where id = '$id'";
                    $run_query = mysqli_query($conn, $delete_query);

                    if( $run_query == true){
                        $message = "Data Successfully Deleted<br>";
                        header("Location: DisplayRecord.php?msg=$message");
                    }
                }
                else{
                    $message = "No data is Deleted ".mysqli_error($conn);
                    header( "Location: DisplayRecord.php?msg=$message");
                }
            }
            ?>

        </div>

    </body>
</html>
