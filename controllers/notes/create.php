<?php

require "Validator.php";

$errors = $success = [];
$heading = 'Create new note';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    if(! Validator::string($_POST['body'],1,1000)){
        $errors['body'] = 'A body no more than 1,000 characters is required.';
    }
    
    if(empty($errors)){
        $config = require base_path('config.php');
        $db = new Database($config['database']);

        $db
        ->query('INSERT INTO notes (body, user_id) VALUES(:body, :user_id)',[
            'body' => htmlspecialchars($_POST['body']),
            'user_id' => 1
        ]);

        $success['body'] = 'Successfully Added';
    }

}

view("notes/create.view.php",['heading' => $heading, 'errors' => $errors, 'success' => $success]);