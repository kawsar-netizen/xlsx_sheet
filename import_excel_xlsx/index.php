<?php

$con = mysqli_connect("localhost", "root", "", "demo_excel");

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

if (isset($_POST['submit'])) {
    $file   = $_FILES['doc']['tmp_name'];
    $ext = pathinfo($_FILES['doc']['name'], PATHINFO_EXTENSION);
    if ($ext == 'xlsx') {
        require('PHPExcel/PHPExcel.php');
        require('PHPExcel/PHPExcel/IOFactory.php');

        $obj    = PHPExcel_IOFactory::load($file);
        foreach ($obj->getWorksheetIterator() as $sheet) {

            $getHighestRow =  $sheet->getHighestRow();

            for ($i = 0; $i <= $getHighestRow; $i++) {
                $sl = $sheet->getCellByColumnAndRow(0, $i)->getValue();
                $name = $sheet->getCellByColumnAndRow(1, $i)->getValue();
                $category = $sheet->getCellByColumnAndRow(2, $i)->getValue();
                $position = $sheet->getCellByColumnAndRow(3, $i)->getValue();
                $address = $sheet->getCellByColumnAndRow(4, $i)->getValue();
                if ($sl != '') {
                    mysqli_query($con, "insert into xls_sheet(sl,name,category,position,address) values('$sl','$name','$category','$position','$address')");
                }
            }
        }
    } else {
?>     <h4 style="text-align:center">
            <span style="color: red; text-align:center">
                Invalid file format
            </span>

        </h4>

<?php
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Import Xls Sheet</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

</head>

<body>

    <div class="container-fluid">

        <div class="card mt-2 mb-2">
            <div class="card-header text-center">
                <h4>Import xls data in database</h4>
                <form method="post" enctype="multipart/form-data">
                    <input type="file" name="doc" />
                    <input type="submit" name="submit" />
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>