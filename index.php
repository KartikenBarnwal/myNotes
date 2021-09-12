<?php

$success = false;

// Connecting to the DB
$conn = mysqli_connect('localhost', 'root', '', 'mynotes');
if (!$conn) {
    die("Sorry, we failed to connect! - " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $title = $_POST["title"];
    $description  = $_POST["description"];

    $sql = "INSERT INTO `notes` (`sno`, `title`, `description`, `tstamp`) VALUES (NULL, '$title', '$description', current_timestamp())";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $success = true;
    }
    // header("Location: index.php");
    // die();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP CRUD App</title>

    <!-- Cloud Tables/Data Tables -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.1/css/jquery.dataTables.min.css">
    <script src="//cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>

    <!-- Bootstrap CSS -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
</head>

<body>
    <?php require "header.php" ?>
    <?php if ($success == true) {
        echo '<div class="alert alert-success alert-dismissible fade show" style="background-color: #BE00FE" role="alert">
        The Note has been added <strong>Successfully!</strong>
        <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">X</button>
      </div>';
    }
    ?>
    <?php require "form.php" ?>
    <?php require "fetchAll.php" ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>

</html>