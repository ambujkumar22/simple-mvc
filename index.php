<?php 

require 'functions.php';
require 'Database.php';
// require 'router.php';

$config = require('config.php');

$db = new Database($config['database']);

$query = 'select * from posts where admin = ?';
$id = $_GET['id'];
$posts = $db->query($query,[$id])->fetch();

dd($posts);