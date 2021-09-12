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
                                <td><button type='button' id=" . $row['sno'] . " class='delete btn btn-danger' data-bs-toggle='modal' data-bs-target='#deleteModal'>
                                        Delete
                                    </button>
                                    <button type='button' id=" . $row['sno'] . " class='edit btn btn-primary' data-bs-toggle='modal' data-bs-target='#editModal'>
                                        Edit
                                    </button>
                                </td>
                            
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


        <!-- EDIT Modal -->
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit this Note</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- __________________________ -->
                        <form action="index.php" method="POST">
                            <input type="hidden" name="snoEdit" id="snoEdit">
                            <div class="container my-4">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Note Title</label>
                                    <input type="text" class="form-control" name="titleEdit" id="titleEdit" autocomplete="off">
                                    <div id="emailHelp" class="form-text" style="font-size: small;">keep it short & crisp</div>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Note Description</label>
                                    <textarea class="form-control" name="descriptionEdit" id="descriptionEdit" rows="8"></textarea>
                                </div>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                            </div>
                        </form>
                        <!-- __________________________ -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- DELETE Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete this Note</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- __________________________ -->
                    <form action="index.php" method="POST">
                        <input type="hidden" name="snoDelete" id="snoDelete">
                        <div class="container my-4">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Delete Note</button>
                        </div>
                    </form>
                    <!-- __________________________ -->
                </div>
            </div>
        </div>
    </div>
    </div>

    <script>
        edits = document.getElementsByClassName('edit');
        Array.from(edits).forEach((element) => {
            element.addEventListener("click", (e) => {
                row = e.target.parentNode.parentNode;
                title = row.getElementsByTagName("td")[0].innerText;
                description = row.getElementsByTagName("td")[1].innerText;

                titleEdit.value = title;
                descriptionEdit.value = description;
                snoEdit.value = e.target.id;

                // console.log(title);
            })
        })

        deletes = document.getElementsByClassName('delete');
        Array.from(deletes).forEach((element) => {
            element.addEventListener("click", (e) => {
                row = e.target.parentNode.parentNode;
                title = row.getElementsByTagName("td")[0].innerText;
                description = row.getElementsByTagName("td")[1].innerText;

                snoDelete.value = e.target.id;
                // console.log("delete", e.target);
            })
        })
    </script>
</body>

</html>