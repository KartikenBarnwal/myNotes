<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>

<body>
    <form action="index.php" method="POST">
        <div class="container my-4">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Note Title</label>
                <input type="text" class="form-control" name="title" id="exampleInputEmail1" autocomplete="off">
                <div id="emailHelp" class="form-text" style="font-size: small;">keep it short & crisp</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Note Description</label>
                <textarea class="form-control" name="description" id="exampleInputEmail1" rows="8"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Add to MyNotes</button>
        </div>
    </form>
</body>

</html>