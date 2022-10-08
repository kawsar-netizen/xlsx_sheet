<?php

include 'config.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Export Excel database xlsx Sheet</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

</head>

<body>

    <div class="container-fluid">

        <div class="card mt-2 mb-2">
            <div class="card-header text-center">
                <h4>Export Excel file(xlsx) Data</h4>
                <form action="process.php" method="post">
                    <button type="submit" name="submit" class="btn btn-primary float-right">Export Database</button>
                </form>
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Sl</th>
                            <th scope="col">Name</th>
                            <th scope="col">Category</th>
                            <th scope="col">Position</th>
                            <th scope="col">Address</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $sql = "SELECT * FROM xls_sheet";
                        $res = mysqli_query($con, $sql);
                        if (mysqli_num_rows($res) > 0) {
                            $i = 1;
                            while ($row = mysqli_fetch_array($res)) {

                        ?>
                                <tr>
                                    <th scope="row"><?php echo $i++;?></th>
                                    <td><?php echo $row['sl'];?></td>
                                    <td><?php echo $row['name'];?></td>
                                    <td><?php echo $row['category'];?></td>
                                    <td><?php echo $row['position'];?></td>
                                    <td><?php echo $row['address'];?></td>
                                </tr>

                        <?php
                            }
                        }else{
                            echo'No data found';
                        }
                        ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>