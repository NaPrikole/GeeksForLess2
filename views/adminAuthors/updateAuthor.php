<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>GeeksForLess - Test Task.</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="/src/css/addGenre.css" rel="stylesheet">
    <link href="/src/css/script.css" rel="stylesheet">
</head>
<body>
<h2 class="col-2 offset-5 my-2">Admin panel</h2>
<div class="container">
    <div class="row">
        <div class="col-12">
            <h3 class="">UPDATE AUTHOR <?php echo $author['name'] ?></h3>
        </div>
        <div class="col-12">
          <form action="/updateAuthorWithAjax" method="post" id="update-author">
              <div class="input-group input-group-lg">
                  <div class="input-group-prepend">
                      <span class="input-group-text" id="inputGroup-sizing-lg">Write here</span>
                  </div>
                  <input type="hidden" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm" name="id" id="id" value="<?php echo $author['id'] ?>">
                  <input type="text" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm" name="author" id="author" value="<?php echo $author['name'] ?>">
              </div>
              <div class="my-4">
                <input id="updateAuthorByAjax" type="button" class="form-control btn-info col-3" aria-label="Large" aria-describedby="inputGroup-sizing-sm" value="UPDATE Author" />
              </div>
          </form>
          </div>
          <div id="spinner">
            <img src="/src/images/ajaxSpinner.gif" width="60" height="60" />
          </div>
          <div id="ui-response">
            <p><span id="message"></span></p>
          </div>
        </div>
        <div>
          <a href="/admin/authors">
              <button type="button" class="btn btn-success col-3">BACK</button>
          </a>
        </div>
    </div>
</div>



<!-- Скрипт по дополнительному ТЗ(перевести работу админки на Js/Ajax) -->

<script src="/./src/js/js_ajax_updateAuthor.js"></script>

<!-- ========================================================================== -->


</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/holder/2.9.4/holder.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
