<?php

$books = [
    [
        'name' => 'Books',
        'author' => 'ambuj kumar',
        'releaseYear' => 1997
    ],
    [
        'name' => 'Books 2',
        'author' => 'krishan kumar',
        'releaseYear' => 1996
    ]
];

$filter = function($items, $function){
    if(!empty($items) && is_array($items)){
        $filteredItems = [];
        foreach($items as $item){
            if($function($item)){
                $filteredItems[] = $item;
            }
        }
        
        return $filteredItems;
    }
};

$filteredBooks = array_filter($books, function($books){
    return $books['releaseYear'] >= 1996;
});

function dd($variable){
    echo '<pre>';
    echo var_dump($variable);
    echo '</pre>';

    die();
}

function urlIs($value){
    $path = parse_url($_SERVER['REQUEST_URI'])['path'];
    return $path == $value;
}

function authorize($condition, $status = Response::FORBIDDEN){
    if(!$condition){
        abort($status);
    }
}

function base_path($path){
    return BASE . $path;
}

function view($path, $attributes = []){
    extract($attributes);

    require base_path('views/' . $path);
}