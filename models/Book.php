<?php

class Book {

    public static function getContent(){
        $db = DataBase::setConnection();
        $response = $db->query('SELECT * FROM books ORDER BY created_at');
        $count = 0;
        while($row = $response->fetch()){
            $booksList[$count]['id'] = $row['id'];
            $booksList[$count]['title'] = $row['title'];
            $booksList[$count]['description'] = $row['description'];
            $booksList[$count]['price'] = $row['price'];
            $count++;
        }
        return $booksList;
    }

    public static function getCurrentBookById($id)
    {
        $id = intval($id);

        if ($id) {
            $db = DataBase::setConnection();

            $response = $db->query('SELECT * FROM books WHERE id=' . $id);
            $response->setFetchMode(PDO::FETCH_ASSOC);

            $currentBook = $response->fetch();

            return $currentBook;
        }
    }

    public static function getBookById($id){

        $db = DataBase::setConnection();
        $sql = 'SELECT * FROM books WHERE id = :id';
        $response = $db->prepare($sql);
        $response->bindParam(':id', $id, PDO::PARAM_INT);
        $response->setFetchMode(PDO::FETCH_ASSOC);
        $response->execute();

        return $response->fetch();
    }

    public static function getBooksByAuthor($id){

        $id = intval($id);

        if($id){
            $db = DataBase::setConnection();

            $allBooksByAuthor = array();

            $response = $db->query('SELECT * FROM book_author WHERE book_id=' . $id);
            $count = 0;
            while ($row = $response->fetch()){
                $allBooksByAuthor[$count]['book_id'] = $row['book_id'];
                $allBooksByAuthor[$count]['author_id'] = $row['author_id'];
                $count++;
            }
            return $allBooksByAuthor;
        }
    }

    public static function getBooksGenre($id)
    {
        $id = intval($id);

        $allBooksGenre = array();

        if ($id) {
            $db = DataBase::setConnection();

            $response = $db->query('SELECT * FROM book_genre WHERE book_id=' . $id);
            $count = 0;
            while($row = $response->fetch()) {
                $allBooksGenre[$count]['book_id'] = $row['book_id'];
                $allBooksGenre[$count]['genre_id'] = $row['genre_id'];
                $count++;
            }
            return $allBooksGenre;
        }
    }

//    public static function addNewBook($data)
//    {
//        $db = DataBase::setConnection();
//
//        $sql = 'INSERT INTO books '
//            . '(title, description, price)'
//            . 'VALUES '
//            . '(:title, :description, :price)';
//
//        $response = $db->prepare($sql);
//        $response->bindParam(':title', $data['title'], PDO::PARAM_STR);
//        $response->bindParam(':description', $data['description'], PDO::PARAM_INT);
//        $response->bindParam(':price', $data['price'], PDO::PARAM_INT);
//
//        if ($response->execute()) {
//            return $db->lastInsertId();
//        }
//        return 0;
//    }

    public static function addNewBook($data)
    {
        $db = DataBase::setConnection();

        $sql = 'INSERT INTO books '
            . '(title, description, price)'
            . 'VALUES '
            . '(:title, :description, :price)';

        $response = $db->prepare($sql);
        $response->bindParam(':title', $data['title'], PDO::PARAM_STR);
        $response->bindParam(':description', $data['description'], PDO::PARAM_INT);
        $response->bindParam(':price', $data['price'], PDO::PARAM_INT);

        if ($response->execute()) {
            return $db->lastInsertId();

        }
        return 0;
    }

    public static function updateBookById($id, $data)
    {
        $db = DataBase::setConnection();

        $sql = "UPDATE books
              SET
                  title = :title,
                  description = :description,
                  price = :price
              WHERE id = :id";

        $response = $db->prepare($sql);
        $response->bindParam(':id', $id, PDO::PARAM_INT);
        $response->bindParam(':title', $data['title'], PDO::PARAM_STR);
        $response->bindParam(':description', $data['description'], PDO::PARAM_INT);
        $response->bindParam(':price', $data['price'], PDO::PARAM_INT);
        return $response->execute();
    }
}

