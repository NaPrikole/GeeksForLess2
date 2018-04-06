<?php
sleep(1.5);
class AdminAuthorController {

    public function index(){

        $allAuthors = Author::getAllAutors();

        require_once(ROOT . '/views/adminAuthors/homeAuthors.php');
        return true;
    }

    /*
       Старый метод на добавление автора, теперь является просто роутом к форме.
       До дополнительного задания(перевести работу админки на Js/Ajax.) он был
       основным для добавления автора.
    */
    public function addAuthor(){

        require_once(ROOT . '/views/adminAuthors/addAuthor.php');
        return true;
    }

    /*
        Новый метод на добавления автора. Данные добавляются после
        прохождения валидации и получения readyState == 4 и status == 200.
        Добавляйте, редактируйте данные с открытой консолью, так как она
        предоставит вам информацию о работе скрипта.
    */

    public function addAuthorWithAjax(){

      function ifAjaxSuccess() {
        return isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&
        $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest';
      }

      $author = isset($_POST['author']) ? (string) $_POST['author'] : '';

      $errors = [];
       if($author == '') { $errors[] = 'author'; }
       if(!empty($errors)) {
        $result_array = array('errors' => $errors);
        echo json_encode($result_array);
        exit;
      }

      $status = "Author has been added with \"Ajax\", \"Validation\", \"Spinner\"  \"Disabled button during server response\"  -  SUCCESS!!!";

        if(ifAjaxSuccess()){
          echo json_encode(array('status' => $status));
          Author::addAuthor($author);
        } else {
          exit;
        }
    }

    /*
      Старый метод на редактирование автора, теперь является просто роутом к форме.
      До дополнительного задания(перевести работу админки на Js/Ajax.) он был
      основным для редактирования автора.
      Так же по прежнему я вывожу данные из бд на вьюшку из него.
      Так как раньше параметры я получал из адресной строки, а именно ID автора
      для редактирования, я добавил еще одно скрытое поле в форму куда передаю
      ID которое использую в новом методе updateAuthorWithAjax().
    */

    public function updateAuthor($id){

        $author = Author::getAuthorById($id);

        require_once(ROOT . '/views/adminAuthors/updateAuthor.php');
        return true;
    }

      /*
        Новый метод на редактирование автора. Данные редактируются после
        прохождения валидации и получения readyState == 4 и status == 200.
        Добавляйте, редактируйте данные с открытой консолью, так как она
        предоставит вам информацию о работе скрипта.
      */
    public function updateAuthorWithAjax(){

      function ifAjaxSuccess() {
        return isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&
        $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest';
      }

      $id = isset($_POST['id']) ? (int) $_POST['id'] : '';
      $author = isset($_POST['author']) ? (string) $_POST['author'] : '';

      $errors = [];
       if($author == '') { $errors[] = 'author'; }
       if(!empty($errors)) {
        $result_array = array('errors' => $errors);
        echo json_encode($result_array);
        exit;
      }

      $status = "Author has been updated with \"Ajax\", \"Validation\", \"Spinner\"  \"Disabled button during server response\"  -  SUCCESS!!!";
        if(ifAjaxSuccess()){
          echo json_encode(array('status' => $status));
            Author::updateAuthorById($id, $author);
        } else {
          exit;
        }
    }
}
