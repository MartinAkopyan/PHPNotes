<?php
require_once 'vendor/autoload.php';

use App\NotesService;

$notes = NotesService::getNotes();

$currentNote = [
    'id' => '',
    'title' => '',
    'description' => ''
];

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $currentNote = NotesService::getNote($id);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notes App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="app.css">
</head>
<body>
<div class="container mt-5" style="max-width: 650px">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">New note</h5>
            <form class="new-note" action="store.php" method="post">
                <input type="hidden" name="id" value="<?php echo $currentNote['id'] ?>">
                <div class="mb-3">
                    <input type="text" name="title" class="form-control" placeholder="Note title"
                           value="<?php echo $currentNote['title'] ?>" autocomplete="off">
                </div>
                <div class="mb-3">
                    <textarea name="description" class="form-control" rows="4"
                              placeholder="Note description"><?php echo $currentNote['description'] ?></textarea>
                </div>
                <button type="submit" class="btn btn-primary"><?php echo $currentNote['id'] ? 'Update Note' : 'Add Note' ?></button>
            </form>
        </div>
    </div>
    <div class="notes mt-4">
        <?php if (!empty($notes)): ?>
            <?php foreach ($notes as $note): ?>
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title"><a href="?id=<?php echo $note['id'] ?>"
                                                  class="text-decoration-none"><?php echo $note['title'] ?></a></h5>
                        <p class="card-text"><?php echo $note['description'] ?></p>
                        <p class="card-text"><small class="text-muted"><?php echo $note['created_at'] ?></small></p>
                        <form action="delete.php" method="post">
                            <input type="hidden" value="<?php echo $note['id'] ?>" name="id">
                            <button class="btn btn-danger btn-sm">X</button>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>

</body>
</html>
