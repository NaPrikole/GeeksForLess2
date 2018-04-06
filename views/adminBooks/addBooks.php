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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <link href="/src/css/script.css" rel="stylesheet">
</head>
<body>
<h2 class="col-2 offset-5 my-2">Admin panel</h2>
<div class="container">
<div class="row my-5">
    <div class="col-2 offset-3">
        <a href="/admin">
            <button type="button" class="btn btn-success">Admin home page</button>
        </a>
    </div>
    <div class="col-2 offset-1">
        <a href="/user/logout">
            <button type="button" class="btn btn-success">Site home page</button>
        </a>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-12">
            <h3 class="">ADD BOOK</h3>
        </div>
        <div class="col-12">
          <form action="/addBookWithAjax" method="post" id="add-book">
              <div class="input-group input-group-lg my-2">
                  <div class="input-group-prepend">
                      <span class="input-group-text" id="inputGroup-sizing-lg">TITLE</span>
                  </div>
                  <input type="text" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm" name="title" id="title">
              </div>
              <div class="input-group input-group-lg my-2">
                  <div class="input-group-prepend">
                      <span class="input-group-text" id="inputGroup-sizing-lg">PRICE</span>
                  </div>
                  <input type="text" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm" name="price" id="price">
              </div>
              <div class="input-group input-group-lg my-2">
                  <div class="input-group-prepend">
                      <span class="input-group-text" id="inputGroup-sizing-lg">DESCRIPTION</span>
                  </div>
                  <input type="text" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm" name="description" id="description">
              </div>
              <div class="input-group input-group-lg my-2">
                  <div class="input-group-prepend">
                      <span class="input-group-text" id="inputGroup-sizing-lg">AUTHOR</span>
                  </div>
                  <select class="form-control" id="author" name="author">
                      <?php if (is_array($allAuthors)): ?>
                          <?php foreach ($allAuthors as $author): ?>
                              <option value="<?php echo $author['id']; ?>">
                                  <?php echo $author['name']; ?>
                              </option>
                          <?php endforeach; ?>
                      <?php endif; ?>
                  </select>
              </div>
              <div class="input-group input-group-lg my-2">
                  <div class="input-group-prepend">
                      <span class="input-group-text" id="inputGroup-sizing-lg">GENRE</span>
                  </div>
                  <select class="form-control" id="genre" name="genre">
                      <?php if (is_array($allGenres)): ?>
                          <?php foreach ($allGenres as $genre): ?>
                              <option value="<?php echo $genre['id']; ?>">
                                  <?php echo $genre['title']; ?>
                              </option>
                          <?php endforeach; ?>
                      <?php endif; ?>
                  </select>
              </div>
              <div class="my-4">
                <input id="addBookByAjax" type="button" class="form-control btn-info col-3" aria-label="Large" aria-describedby="inputGroup-sizing-sm" value="ADD Book" />
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
    <a href="/admin/books">
        <button type="button" class="btn btn-success col-3">BACK</button>
    </a>
  </div>
  </div>
</div>



<!-- Скрипт по дополнительному ТЗ(перевести работу админки на Js/Ajax) -->

<script src="/./src/js/js_ajax_addBooks.js"></script>

<!-- ========================================================================== -->


<script src="https://cdnjs.cloudflare.com/ajax/libs/holder/2.9.4/holder.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
