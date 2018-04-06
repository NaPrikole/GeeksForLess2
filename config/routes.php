<?php

return array(
    'content/contentByAuthor/([0-9]+)' => 'authors/show/$1',
    'content/contentByGenre/([0-9]+)' => 'genres/show/$1',
    'content/([0-9]+)' => 'content/show/$1',
    'admin/books/addBook' => 'adminBooks/addBook',
    'admin/books/updateBook/([0-9]+)' => 'adminBooks/updateBook/$1',
    'admin/authors/addAuthor' => 'adminAuthor/addAuthor',
    'admin/authors/updateAuthor/([0-9]+)' => 'adminAuthor/updateAuthor/$1',
    'admin/genres/addGenre' => 'adminGenre/addGenre',
    'admin/genres/updateGenre/([0-9]+)' => 'adminGenre/updateGenre/$1',
    'admin/genres' => 'adminGenre/index',
    'admin/authors' => 'adminAuthor/index',
    'admin/books' => 'adminBooks/index',
    'user/login' => 'getAdmin/getLogin',
    'user/logout' => 'getAdmin/dieSession',
    'admin' => 'getAdmin/index',

    //Роуты для дополнительного здания.(перевести работу админки на Js/Ajax.)

    'addGenreWithAjax' => 'adminGenre/addGenreWithAjax',
    'updateGenreWithAjax' => 'adminGenre/updateGenreWithAjax',
    'addAuthorWithAjax' => 'adminAuthor/addAuthorWithAjax',
    'updateAuthorWithAjax' => 'adminAuthor/updateAuthorWithAjax',
    'addBookWithAjax' => 'adminBooks/addBookWithAjax',
    'updateBookWithAjax' => 'adminBooks/updateBookWithAjax',

    //======================================================================

    'order' => 'order/send',
    '' => 'content/index',
);
