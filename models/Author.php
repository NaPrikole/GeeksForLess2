<?php

class Author {

    public static function getAllAutors() {

        $db = DataBase::setConnection();

        $response = $db->query('SELECT * FROM authors');

        $count = 0;
        while ($row = $response->fetch()) {
            $allAutors[$count]['id'] = $row['id'];
            $allAutors[$count]['name'] = $row['name'];
            $count++;
        }
        return $allAutors;
    }

    public static function addAuthor($author){

        $db = DataBase::setConnection();

        $sql = 'INSERT INTO authors (name) VALUES (:name)';

        $response = $db->prepare($sql);
        $response->bindParam(':name', $author, PDO::PARAM_STR);
        return $response->execute();
    }

    public static function getAuthorById($id){

        $db = DataBase::setConnection();

        $sql = 'SELECT * FROM authors WHERE id = :id';

        $response = $db->prepare($sql);
        $response->bindParam(':id', $id, PDO::PARAM_INT);
        $response->setFetchMode(PDO::FETCH_ASSOC);
        $response->execute();

        return $response->fetch();
    }

    public static function updateAuthorById($id, $author){

        $db = DataBase::setConnection();

        $sql = 'UPDATE authors SET name = :name WHERE id = :id';

        $response = $db->prepare($sql);
        $response->bindParam(':id', $id, PDO::PARAM_INT);
        $response->bindParam(':name', $author, PDO::PARAM_STR);

        return $response->execute();
    }

    public static function getNameAuthorById($id){

        $id = intval($id);

        if ($id) {
            $db = DataBase::setConnection();

            $response = $db->query('SELECT * FROM authors WHERE id=' . $id);
            $response->setFetchMode(PDO::FETCH_ASSOC);

            $authorName = $response->fetch();
            $authorName = $authorName['name'];

            return $authorName;
        }
    }

    public static function addBookAuthor($data){

        $db = DataBase::setConnection();

        $sql = 'INSERT INTO book_author (book_id, author_id)'
            . ' VALUE (:book_id, :author_id)';

        $response = $db->prepare($sql);
        $response->bindParam(':book_id', $data['book_id'], PDO::PARAM_INT);
        $response->bindParam(':author_id', $data['author_id'], PDO::PARAM_INT);
        return $response->execute();
    }

    public static function getBookById($id)
    {
        $id = intval($id);

        if ($id) {
            $db = DataBase::setConnection();

            $response = $db->query('SELECT * FROM book_author WHERE author_id=' . $id);
            $count = 0;
            while($row = $response->fetch()) {
                $currentAuthor[$count]['book_id'] = $row['book_id'];
                $currentAuthor[$count]['author_id'] = $row['author_id'];
                $count++;
            }


            return $currentAuthor;
        }
    }

    public static function deleteBookAuthor($id)
    {
        $db = DataBase::setConnection();

        $response = $db->query('SELECT * FROM book_author WHERE book_id=' . $id);
        $count = 0;
        while($row = $response->fetch()) {
            $data[$count]['book_id'] = $row['book_id'];
            $data[$count]['author_id'] = $row['author_id'];
            $count++;
        }

        $sql = "DELETE FROM book_author WHERE book_id = :book_id AND author_id = :author_id";

        $response = $db->prepare($sql);
        $count = 0;
        while($data[$count]['author_id']){
            $response->bindParam(':book_id', $data[$count]['book_id'], PDO::PARAM_INT);
            $response->bindParam(':author_id', $data[$count]['author_id'], PDO::PARAM_INT);
            $response->execute();
            $count++;
        }
        return true;
    }













    public static function createBooksAuthor($options)
    {

        $db = DataBase::setConnection();

        $sql = 'INSERT INTO book_author (book_id, author_id)'
            . ' VALUE (:book_id, :author_id)';

        $result = $db->prepare($sql);
        $result->bindParam(':book_id', $options['book_id'], PDO::PARAM_INT);
        $result->bindParam(':author_id', $options['author_id'], PDO::PARAM_INT);
        return $result->execute();
    }












}