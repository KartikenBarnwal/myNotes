<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container my-4">
        <table class="table" id="myTable">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                global $conn;
                $sql = "SELECT * FROM notes";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    $count = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo
                        "<tr>
                                <th scope='row'>" . $count++ . "</th>
                                <td>" . $row['title'] . "</td>
                                <td>" . $row['description'] . "</td>
                                <td><button type='button' class='btn btn-primary'>Edit</button>
                                    <button type='button' class='btn btn-danger'>Delete</button></td>
                            </tr>";
                    }
                } else {
                    echo '<div class="alert alert-warning" role="alert">
                    Try adding a new Note!
                  </div>';
                }

                ?>
            </tbody>
        </table>
    </div>
</body>

</html>