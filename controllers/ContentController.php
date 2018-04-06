<?php

class ContentController {

    public function index(){

        $bookList = Book::getContent();
        $allGenres = Genre::getAllGenres();
        $allAuthors = Author::getAllAutors();

        require_once(ROOT . '/views/content/index.php');
        return true;
    }

    public function show($id)
    {

        if ($id) {
            $bookById = Book::getBookById($id);

            require_once(ROOT . '/views/content/show.php');
        }
        return true;
    }

    public function contentByAuthor(){
        require_once (ROOT . '/views/content/booksByAuthor.php');
        return true;
    }

    public function contentByGenre(){
        require_once (ROOT . '/views/content/booksByGenre.php');
        return true;
    }
}