<?php

$config = require base_path('config.php');

$db = new Database($config['database']);

$heading = 'Note';
$currentUserID  = 1;

$note = $db
        ->query("select * from notes where id = :id",['id' => $_GET['id']??0])
        ->findOrFail();

authorize($note['user_id'] === $currentUserID);

view("notes/show.view.php",['heading' => $heading, 'note' => $note]);