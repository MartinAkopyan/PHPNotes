<?php

namespace App;
use App\DB;

class NotesService
{

    public static function getNotes(): array
    {
        $stmt = DB::connect()->prepare('SELECT * FROM notes ORDER BY created_at DESC');
        $stmt->execute([]);
        return $stmt->fetchAll();
    }

    public static function addNote($data): void
    {
        $stmt = DB::connect()->prepare('INSERT INTO notes (title, description, created_at) VALUES (:title, :description, :created_at)');
        $stmt->execute([
            ':title' => $data['title'],
            ':description' => $data['description'],
            ':created_at' => date('Y-m-d H:i:s')
        ]);
    }

    public static function getNote($id): array
    {
        $stmt = DB::connect()->prepare('SELECT * FROM notes WHERE id = :id');
        $stmt->execute([
            ':id' => $id
        ]);
        return $stmt->fetch();
    }

    public static function updateNote($data): void
    {
        $stmt = DB::connect()->prepare('UPDATE notes SET title = :title, description = :description WHERE id = :id');
        $stmt->execute([
            ':title' => $data['title'],
            ':description' => $data['description'],
            ':id' => $data['id']
        ]);
    }

    public static function deleteNote($id): void
    {
        $stmt = DB::connect()->prepare('DELETE FROM notes WHERE id = :id');
        $stmt->execute([
            ':id' => $id
        ]);
    }
}