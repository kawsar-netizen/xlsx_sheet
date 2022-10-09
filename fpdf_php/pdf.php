<?php
$con = mysqli_connect('localhost','root','','demo_excel');
$res = mysqli_query($con,"select * from xls_sheet");
$row = mysqli_fetch_array($res);
// $strText = str_replace("\n","<br>",$strText);
require "fpdf/fpdf.php";

if(isset($_POST['submit'])){

    $pdf = new FPDF();
    $pdf ->AddPage();

    while($row = mysqli_fetch_array($res)){
        $result_sl          = $row['sl'];
        $result_name        = $row['name'];
        $company_name       = $row['compay_name'];
        $position           = $row['position'];
        $address            = $row['address'];
        
    $pdf -> SetFont("Arial","",12);
    $pdf -> Cell(10,5,"$result_sl","",1,'L');
    $pdf -> Cell(10,5,"$result_name","",1,'L');
    $pdf -> SetFont("Arial","",8);
    $pdf -> Cell(10,5,"$company_name","",1,'L');
    $pdf -> Cell(10,5,"$position","",1,'L');
    $pdf -> MultiCell(45,5,"$address","",'L',false);

}
    $pdf->output();

}

?>

