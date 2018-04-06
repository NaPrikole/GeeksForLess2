<?php

class GenresController {

    public function show($id){

        $bookList = Book::getContent();
        $allGenres = Genre::getAllGenres();
        $allAuthors = Author::getAllAutors();

        if ($id) {
            $currentGenre = Genre::getBookById($id);

            require_once(ROOT.'/views/content/booksByGenre.php');
        }
        return true;
    }
}