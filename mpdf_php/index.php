<?php
require("vendor/autoload.php");
$con = mysqli_connect('localhost','root','','demo_excel');
$res = mysqli_query($con,"select * from xls_sheet");

if(mysqli_num_rows($res)>0){

    $html =' <style>.table{}</style> <table class="table">';

        $html.='<tr><td>ID</td><td>Name</td><td>Category</td><td>Position</td><td>Address</td></tr>';
while($row=mysqli_fetch_assoc($res)){

    $html.= '<tr><td>'.$row['id'].'</td><td>'.$row['id'].'</td><td>'.$row['name'].'</td><td>'.$row['compay_name'].'</td><td>'.$row['position'].'</td><td>'.$row['address'].'</td></tr>';
}
    $html.='</table>';


}else{
  $html = "Data not found";
}
$mpdf =new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);
$file =time().'.pdf';
$mpdf->output($file,'I');
?>