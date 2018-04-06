<?php

class Genre {

    public static function getAllGenres() {

        $db = DataBase::setConnection();

        $response = $db->query('SELECT * FROM genres');

        $count = 0;
        while ($row = $response->fetch()) {
            $allGenres[$count]['id'] = $row['id'];
            $allGenres[$count]['title'] = $row['title'];
            $count++;
        }
        return $allGenres;
    }

    public static function addGenre($genre){

        $db = DataBase::setConnection();

        $sql = 'INSERT INTO genres (title) VALUES (:title)';

        $response = $db->prepare($sql);
        $response->bindParam(':title',$genre, PDO::PARAM_STR);
        return $response->execute();
    }

    public static function getGenreById($id){

        $db = DataBase::setConnection();

        $sql = 'SELECT * FROM genres WHERE id = :id';

        $response = $db->prepare($sql);
        $response->bindParam(':id', $id, PDO::PARAM_INT);
        $response->setFetchMode(PDO::FETCH_ASSOC);
        $response->execute();

        return $response->fetch();
    }

    public static function updateGenreById($id, $genre){

        $db = DataBase::setConnection();

        $sql = 'UPDATE genres SET title = :title WHERE id = :id';

        $response = $db->prepare($sql);
        $response->bindParam(':id', $id, PDO::PARAM_INT);
        $response->bindParam(':title', $genre, PDO::PARAM_STR);

        return $response->execute();
    }

    public static function getTitleGenreById($id){

        $id = intval($id);

        if ($id) {
            $db = DataBase::setConnection();

            $response = $db->query('SELECT * FROM genres WHERE id=' . $id);
            $response->setFetchMode(PDO::FETCH_ASSOC);

            $genreTitle = $response->fetch();
            $genreTitle = $genreTitle['title'];

            return $genreTitle;
        }
    }

    public static function addBookGenre($data){

        $db = DataBase::setConnection();

        $sql = 'INSERT INTO book_genre (book_id, genre_id)'
            . ' VALUE (:book_id, :genre_id)';

        $response = $db->prepare($sql);
        $response->bindParam(':book_id', $data['book_id'], PDO::PARAM_INT);
        $response->bindParam(':genre_id', $data['genre_id'], PDO::PARAM_INT);
        $response->execute();
    }

    public static function deleteBookGenre($id)
    {
        $db = DataBase::setConnection();

        $response = $db->query('SELECT * FROM book_genre WHERE book_id=' . $id);
        $count = 0;
        while($row = $response->fetch()) {
            $data[$count]['book_id'] = $row['book_id'];
            $data[$count]['genre_id'] = $row['genre_id'];
            $count++;
        }

        $sql = "DELETE FROM book_genre WHERE book_id = :book_id AND genre_id = :genre_id";

        $response = $db->prepare($sql);
        $count = 0;
        while($data[$count]['genre_id']){
            $response->bindParam(':book_id', $data[$count]['book_id'], PDO::PARAM_INT);
            $response->bindParam(':genre_id', $data[$count]['genre_id'], PDO::PARAM_INT);
            $response->execute();
            $count++;
        }
        return true;
    }


    public static function getBookById($id){

        $id = intval($id);

        if ($id) {
            $db = DataBase::setConnection();

            $response = $db->query('SELECT * FROM book_genre WHERE genre_id=' . $id);
            $count = 0;
            while($row = $response->fetch()) {
                $currentGenre[$count]['book_id'] = $row['book_id'];
                $currentGenre[$count]['genre_id'] = $row['genre_id'];
                $count++;
            }

            return $currentGenre;
        }
    }

    public static function createBooksCategory($options)
    {
        $db = DataBase::setConnection();

        $sql = 'INSERT INTO book_genre (book_id, genre_id)'
            . ' VALUE (:book_id, :genre_id)';

        $result = $db->prepare($sql);

        $result->bindParam(':book_id', $options['book_id'], PDO::PARAM_INT);
        $result->bindParam(':genre_id', $options['genre_id'], PDO::PARAM_INT);
        return $result->execute();
    }



}














