<?php
sleep(1.5);
class AdminGenreController {

    public function index(){

        $allGenres = Genre::getAllGenres();

        require_once(ROOT . '/views/adminGenres/homeGenres.php');
        return true;
    }

    /*
       Старый метод на добавление жанра, теперь является просто роутом к форме.
       До дополнительного задания(перевести работу админки на Js/Ajax.) он был
       основным для добавления жанра.
    */
    public function addGenre(){

        require_once(ROOT . '/views/adminGenres/addGenre.php');
        return true;
    }

/*
    Новый метод на добавления жанра. Данные добавляются после
    прохождения валидации и получения readyState == 4 и status == 200.
    Добавляйте, редактируйте данные с открытой консолью, так как она
    предоставит вам информацию о работе скрипта.
*/

    public function addGenreWithAjax(){

      function ifAjaxSuccess() {
        return isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&
        $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest';
      }

      $genre = isset($_POST['genre']) ? (string) $_POST['genre'] : '';

      $errors = [];
       if($genre == '') { $errors[] = 'genre'; }
       if(!empty($errors)) {
        $result_array = array('errors' => $errors);
        echo json_encode($result_array);
        exit;
      }

      $status = "Genre has been added with \"Ajax\", \"Validation\", \"Spinner\"  \"Disabled button during server response\"  -  SUCCESS!!!";
        if(ifAjaxSuccess()){
          echo json_encode(array('status' => $status));
          Genre::addGenre($genre);
        } else {
          exit;
        }
    }

    /*
      Старый метод на редактирование жанра, теперь является просто роутом к форме.
      До дополнительного задания(перевести работу админки на Js/Ajax.) он был
      основным для редактирования жанра.
      Так же по прежнему я вывожу данные из бд на вьюшку из него.
      Так как раньше параметры я получал из адресной строки, а именно ID жанра
      для редактирования, я добавил еще одно скрытое поле в форму куда передаю
      ID которое использую в новом методе updateGenreWithAjax().
    */
    public function updateGenre($id){

        $genre = Genre::getGenreById($id);

        require_once(ROOT . '/views/adminGenres/updateGenre.php');
        return true;
    }

    /*
      Новый метод на редактирование жанра. Данные редактируются после
      прохождения валидации и получения readyState == 4 и status == 200.
      Добавляйте, редактируйте данные с открытой консолью, так как она
      предоставит вам информацию о работе скрипта.
    */
    public function updateGenreWithAjax(){

      function ifAjaxSuccess() {
        return isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&
        $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest';
      }

      $id = isset($_POST['id']) ? (int) $_POST['id'] : '';
      $genre = isset($_POST['genre']) ? (string) $_POST['genre'] : '';

      $errors = [];
       if($genre == '') { $errors[] = 'genre'; }
       if(!empty($errors)) {
        $result_array = array('errors' => $errors);
        echo json_encode($result_array);
        exit;
      }

      $status = "Genre has been updated with \"Ajax\", \"Validation\", \"Spinner\"  \"Disabled button during server response\"  -  SUCCESS!!!";
        if(ifAjaxSuccess()){
          echo json_encode(array('status' => $status));
          Genre::updateGenreById($id, $genre);
        } else {
          exit;
        }
    }

}
