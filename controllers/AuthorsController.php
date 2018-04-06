<?php

class AuthorsController {

    public function show($id){

        $bookList = Book::getContent();
        $allGenres = Genre::getAllGenres();
        $allAuthors = Author::getAllAutors();

        if ($id) {
            $currentAuthor = Author::getBookById($id);

            require_once(ROOT.'/views/content/booksByAuthor.php');
        }
        return true;
    }
}