<?php
$mysqli = new mysqli("localhost","root","","test_gener8");

// Check connection
if ($mysqli -> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
}

$output = "";

$res = $mysqli -> query("SELECT * FROM persons");

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
        header('Content-Type: application/xls');
        header('Content-Disposition:attachment;filename=reports.xls');
    }
    echo '</table>';
}

$mysqli -> close();
?>