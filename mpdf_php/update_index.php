
<?php
require("vendor/autoload.php");
$con = mysqli_connect('localhost', 'root', '', 'mpdf');
$res = mysqli_query($con, "select * from xls_sheet");

if(mysqli_num_rows($res)>0){
$html='


    <table style=" font-size: 12px;">
 ';
 
        while ($row = mysqli_fetch_array($res)) 
    {
        $result_id          = $row['id'];
        $result_name        = $row['name'];
        $company_name       = $row['compay_name'];
        $position           = $row['position'];
        $address            = $row['address'];
        $html.=' 
            <tr>
                <td>';
        if ($result_id % 2 == 1) {
        $html.=' 
                <table border="1" width="240" >
                    <tr>
                        <td height="100">
                        <strong>'.$result_name.'</strong>'.'<br>'.$position.'<br>'.$company_name.'<br>'.$address.'
                        </td>
                    </tr>
                </table>';
  
                 $id1=$result_id+1;
                 $res1 = mysqli_query($con, "select * from xls_sheet where id='$id1'");
                 $row1 = mysqli_fetch_array($res1); 
                 $result_id1          = $row1['id'];
                 $result_name1        = $row1['name']; 
                 $company_name1       = $row1['compay_name'];
                 $position1           = $row1['position'];
                 $address1            = $row1['address'];                
         }  
         $html.='</td>
            <td>';
 
          if ($result_id1 % 2 == 0) { 
            $html.=' 
                <table border="1" width="240"  >
                    <tr>
                        <td height="100"><strong>'.$result_name1.'</strong><br>'.$position1.'<br>'.$company_name1.'<br>'.$address1.' 
                    </tr>
                </table>';
            $result_id1=$result_id; }      
            $html.='</td>
        </tr>';
       } 
    $html.= '</table>';


}else{
    $html = "Data not found";
  }
  $mpdf =new \Mpdf\Mpdf();
  $mpdf->WriteHTML($html);
  $file =time().'.pdf';
  $mpdf->output($file,'I');
  
  ?>