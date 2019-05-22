<?php
    require "connection.php";
?>

<!DOCTYPE>
<html>
    <head>
        <title>Display Record</title>
        <link rel="stylesheet" type="text/css" href="displayStyle.css">
    </head>
    <body
        <div id="button">
            <a href="index.html" id="btn">Home</a>
        </div>

        <h1>Teacher's Table</h1>


        <?php
        if(isset($_GET["msg"]))
            echo $_GET["msg"];
        ?>

        <table>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Course</th>
                <th>Block</th>
                <th>Joined Date</th>
                <th>Email</th>
                <th>UPDATE</th>
                <th>DELETE</th>
            </tr>
            <?php
                $query = "select * from teacher_info";
                $data = mysqli_query($conn, $query);
                while($row = mysqli_fetch_assoc($data))
                {
                    echo "<tr> ";
                    echo "<td>".$row["id"]."</td>";
                    echo "<td>".$row["name"]."</td>";
                    echo "<td>".$row["phone"]."</td>";
                    echo "<td>".$row["course"]."</td>";
                    echo "<td>".$row["block"]."</td>";
                    echo "<td>".$row["joined_date"]."</td>";
                    echo "<td>".$row["email"]."</td>";
                    echo "<td><a href='update.php?id=".$row["id"]."'>Update?</a> </td>";
                    echo "<td><a href='delete.php?id=".$row["id"]."'>Delete?</a></td>";
                    echo "</tr>";
                }
            ?>
        </table>



    </body>
</html>

