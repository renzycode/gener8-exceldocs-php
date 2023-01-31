<?php
    $mysqli = new mysqli("localhost","root","","test_gener8");
    if ($mysqli -> connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
        exit();
    }
    $output = "";
    $res = $mysqli -> query("SELECT * FROM persons");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table{
            margin: 20px;
        }
        tr,th,td{
            border: 1px solid black; 
            padding: 10px;
        }
        a{
            padding: 5px;
            background-color: black;
            text-decoration: none;
            color: white;
            margin: 20px;
        }
    </style>
</head>
<body>
    <a href="download.php">Download</a>
    <?php
    if (mysqli_num_rows($res) > 0){
        echo '
            <table>
                <tr>
                    <th>No.</th>
                    <th>ID</th>
                    <th>Name</th>
                </tr>
        ';
        $num_row = 1;
        while ($row = $res->fetch_assoc()){
            echo '
                <tr>
                    <td>'.$num_row.' </td>
                    <td>'.$row['id'].' </td>
                    <td>'.$row['name'].'</td>
                </tr>
            ';
            $num_row++;
        }
        echo '</table>';
    }
    ?>
</body>
</html>
<?php
    $mysqli -> close();
?>