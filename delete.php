<?php
require_once 'vendor/autoload.php';

use App\NotesService;
if ($_POST['id']) {
    NotesService::deleteNote($_POST['id']);
}
