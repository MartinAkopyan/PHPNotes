<?php
    require_once 'vendor/autoload.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notes App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="app.css">
</head>
<body>
<div class="container mt-5" style="width: 650px">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">New note</h5>
            <form class="new-note" action="create.php" method="post">
                <div class="mb-3">
                    <input type="text" name="title" class="form-control" placeholder="Note title" autocomplete="off">
                </div>
                <div class="mb-3">
                    <textarea name="description" class="form-control" rows="4" placeholder="Note description"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Add note</button>
            </form>
        </div>
    </div>
    <div class="notes mt-4">
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title"><a href="#" class="text-decoration-none">Example title</a></h5>
                <p class="card-text">Example descri[ion</p>
                <p class="card-text"><small class="text-muted">15/02/20 19:00:00</small></p>
                <button class="btn btn-danger btn-sm">X</button>
            </div>
        </div>
    </div>
</div>

</body>
</html>
