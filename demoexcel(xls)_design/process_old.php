<?php
include 'config.php';

$output = "";

if(isset($_POST['submit'])){
    $sql = "SELECT * FROM xls_sheet";
    $res = mysqli_query($con, $sql);
    $i = 1;
    if (mysqli_num_rows($res) > 0) {

            $output .='
            
        <table class="table" bordered="1">
        <tr>
            <th>Sl</th>
            <th>Name</th>
            <th>Category</th>
            <th>Position</th>
            <th>Address</th>
        </tr>';

        while ($row = mysqli_fetch_array($res)) {
        $output .='
            <tr>
                <td>'. $row["sl"] .'</>
                <td>'. $row["name"] .'</>
                <td>'. $row["category"] .'</>
                <td>'. $row["position"] .'</>
                <td>'. $row["address"] .'</>
            </tr>
            ';
        $output .= '</table>';

        header('Content-Type:application/xls');
        header('Content-Disposition:attachment;filename=reports.xls');

        echo $output;

        }
    
    }else{
        echo "No data found";
    }
}

?>