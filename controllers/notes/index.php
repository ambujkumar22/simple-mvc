<?php

$config = require base_path('config.php');

$db = new Database($config['database']);

$heading = 'All Notes';
$currentUser = 1;

$notes = $db
        ->query('select * from notes where user_id = :user', ['user'=>$currentUser])
        ->get();

view("notes/index.view.php",['heading' => $heading, 'notes' => $notes]);