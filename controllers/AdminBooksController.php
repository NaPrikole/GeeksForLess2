<?php
sleep(1.5);
class AdminBooksController {

    public function index(){

        $bookList = Book::getContent();
        $allAuthors = Author::getAllAutors();
        $allGenres = Genre::getAllGenres();

        require_once(ROOT . '/views/adminBooks/homeBooks.php');
        return true;
    }

      /*
         Старый метод на добавление книги, теперь является просто роутом к форме.
         До дополнительного задания(перевести работу админки на Js/Ajax.) он был
         основным для добавления книги.
      */
    public function addBook(){

        $allAuthors = Author::getAllAutors();
        $allGenres = Genre::getAllGenres();

        require_once(ROOT . '/views/adminBooks/addBooks.php');
        return true;
    }

      /*
          Новый метод на добавление книги. Данные добавляются после
          прохождения валидации и получения readyState == 4 и status == 200.
          Добавляйте, редактируйте данные с открытой консолью, так как она
          предоставит вам информацию о работе скрипта.
      */

    public function addBookWithAjax() {

      function ifAjaxSuccess() {
        return isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&
        $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest';
      }

      $data['title'] = isset($_POST['title']) ? (string) $_POST['title'] : '';
      $data['price'] = isset($_POST['price']) ? (int) $_POST['price'] : '';
      $data['description'] = isset($_POST['description']) ? (string) $_POST['description'] : '';
      $dataAuthor['author_id'] = isset($_POST['author']) ? (string) $_POST['author'] : '';
      $dataGenre['genre_id'] = isset($_POST['genre']) ? (string) $_POST['genre'] : '';

      $errors = [];
        if($data['title'] == '') { $errors[] = 'title'; }
        if($data['price'] == '') { $errors[] = 'price'; }
        if($data['description'] == '') { $errors[] = 'description'; }
        if($dataAuthor['author_id'] == '') { $errors[] = 'author'; }
        if($dataGenre['genre_id'] == '') { $errors[] = 'genre'; }

        if(!empty($errors)) {
        $result_array = array('errors' => $errors);
        echo json_encode($result_array);
        exit;
      }

      $status = "Book has been added with \"Ajax\", \"Validation\", \"Spinner\"  \"Disabled button during server response\"  -  SUCCESS!!!";

        if(ifAjaxSuccess()){
          echo json_encode(array('status' => $status));
          $id = Book::addNewBook($data);
          if($id){
              $dataAuthor['book_id'] = $id;
              $dataGenre['book_id'] = $id;
              Author::createBooksAuthor($dataAuthor);
              Genre::createBooksCategory($dataGenre);
          }
        } else {
          exit;
        }

    }

      /*
        Старый метод на редактирование книги, теперь является просто роутом к форме.
        До дополнительного задания(перевести работу админки на Js/Ajax.) он был
        основным для редактирования книги.
        Так же по прежнему я вывожу данные из бд на вьюшку из него.
        Так как раньше параметры я получал из адресной строки, а именно ID книги
        для редактирования, я добавил еще одно скрытое поле в форму куда передаю
        ID которое использую в новом методе updateBookWithAjax().
      */

    public function updateBook($id){

        $book = Book::getBookById($id);
        $allAuthors = Author::getAllAutors();
        $allGenres = Genre::getAllGenres();

        require_once(ROOT . '/views/adminBooks/updateBooks.php');
        return true;
    }

      /*
        Новый метод на редактирование книги. Данные редактируются после
        прохождения валидации и получения readyState == 4 и status == 200.
        Добавляйте, редактируйте данные с открытой консолью, так как она
        предоставит вам информацию о работе скрипта.
      */
    public function updateBookWithAjax(){

      function ifAjaxSuccess() {
        return isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&
        $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest';
      }

      $id = isset($_POST['id']) ? (int) $_POST['id'] : '';
      $data['title'] = isset($_POST['title']) ? (string) $_POST['title'] : '';
      $data['price'] = isset($_POST['price']) ? (int) $_POST['price'] : '';
      $data['description'] = isset($_POST['description']) ? (string) $_POST['description'] : '';
      $dataAuthor['author_id'] = isset($_POST['author']) ? (string) $_POST['author'] : '';
      $dataGenre['genre_id'] = isset($_POST['genre']) ? (string) $_POST['genre'] : '';

      $errors = [];
        if($data['title'] == '') { $errors[] = 'title'; }
        if($data['price'] == '') { $errors[] = 'price'; }
        if($data['description'] == '') { $errors[] = 'description'; }
        if($dataAuthor['author_id'] == '') { $errors[] = 'author'; }
        if($dataGenre['genre_id'] == '') { $errors[] = 'genre'; }

        if(!empty($errors)) {
        $result_array = array('errors' => $errors);
        echo json_encode($result_array);
        exit;
      }

      $status = "Book has been updated with \"Ajax\", \"Validation\", \"Spinner\"  \"Disabled button during server response\"  -  SUCCESS!!!";

        if(ifAjaxSuccess()){
          echo json_encode(array('status' => $status));
            Book::updateBookById($id, $data);
            $dataGenre['book_id'] = $id;
            $dataAuthor['book_id'] = $id;
            Genre::addBookGenre($dataGenre);
            Author::addBookAuthor($dataAuthor);
        } else {
          exit;
        }
    }
}
