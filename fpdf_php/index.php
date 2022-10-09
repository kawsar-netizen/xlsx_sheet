<?php

include 'config.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Generate pdf file</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

</head>

<body>

    <div class="container-fluid">

        <div class="card mt-2 mb-2">
            <div class="card-header text-center">
                <h4>FPDF File Generate</h4>
                <form action="pdf.php" method="post">
                    <button type="submit" name="submit" class="btn btn-primary float-right">PDF Generate</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>