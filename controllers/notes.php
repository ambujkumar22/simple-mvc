<?php

$config = require('config.php');

$db = new Database($config['database']);

$heading = 'All Notes';
$currentUser = 1;

$notes = $db
        ->query('select * from notes where user_id = :user', ['user'=>$currentUser])
        ->get();

require "views/notes.view.php";