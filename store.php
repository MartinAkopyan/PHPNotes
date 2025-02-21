<?php
require_once "vendor/autoload.php";

use App\NotesService;


if (isset($_POST['id'])) {
    NotesService::updateNote($_POST);
} else {
    NotesService::addNote($_POST);
}

header("Location: index.php");
