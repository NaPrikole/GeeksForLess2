<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Product example for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="/src/css/homePage.css" rel="stylesheet">
</head>
<body class="bg-dark">
<nav class="site-header sticky-top py-1">
    <div class="container d-flex flex-column flex-md-row justify-content-between">
        <a class="py-2" href="#">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="d-block mx-auto"><circle cx="12" cy="12" r="10"></circle><line x1="14.31" y1="8" x2="20.05" y2="17.94"></line><line x1="9.69" y1="8" x2="21.17" y2="8"></line><line x1="7.38" y1="12" x2="13.12" y2="2.06"></line><line x1="9.69" y1="16" x2="3.95" y2="6.06"></line><line x1="14.31" y1="16" x2="2.83" y2="16"></line><line x1="16.62" y1="12" x2="10.88" y2="21.94"></line></svg>
        </a>
        <a class="py-2 d-none d-md-inline-block" href="#">Tour</a>
        <a class="py-2 d-none d-md-inline-block" href="#">Product</a>
        <a class="py-2 d-none d-md-inline-block" href="#">Features</a>
        <a class="py-2 d-none d-md-inline-block" href="#">Enterprise</a>
        <a class="py-2 d-none d-md-inline-block" href="#">Support</a>
        <a class="py-2 d-none d-md-inline-block" href="#">Pricing</a>
        <a class="py-2 d-none d-md-inline-block" href="#">Cart</a>
        <a class=" admin d-none d-md-inline-block" href="/user/login">
            <button type="button" class="btn btn-success">ADMIN</button>
        </a>
    </div>
</nav>


<div class="container-fluid">
    <div class="row">
        <div class="col-12 position-relative overflow-hidden p-3 p-md-5 text-center bg-secondary">
            <div class="col-md-5 p-lg-5 mx-auto my-5">
                <h1 class="display-4 font-weight-normal">Modern Library</h1>
                <p class="lead font-weight-normal">Welcome to our LIBRARY</p>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid bg-secondary">
    <div class="container bg-secondary my-2">
        <div class="row">
            <div class="col-12">
                <h3>Authors: </h3>
                <?php foreach ($allAuthors as $author) : ?>
                <a href="/content/contentByAuthor/<?php echo $author['id']?>">
                    <button type="button" class="btn btn-dark my-1">
                           <?php echo $author['name']; ?>
                    </button>
                </a>
                <?php endforeach; ?>
            </div>
            <div class="col-12 my-2">
                <h3>Genres: </h3>
                <?php foreach ($allGenres as $genre) : ?>
                    <a href="/content/contentByGenre/<?php echo $genre['id'] ?>" class="">
                        <button type="button" class="btn btn-dark my-1">
                            <?php echo $genre['title']; ?>
                        </button>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">

    <?php foreach ($bookList as $book): ?>
    <div class="col-6 d-md-flex flex-md-equal w-100 my-md-3 pl-md-3">
        <div class="bg-secondary mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center text-white overflow-hidden">
            <div class="my-3 py-3">
                <h2 class="display-5"><?php echo $book['title'] ?></h2>
                <p class="lead text-center">Book author:
                    <?php
                    $authors = Book::getBooksByAuthor($book['id']);
                    foreach ($authors as $key => $value):
                        ?>
                            <span class="badge badge-pill badge-warning">
                                <a href="content/contentByAuthor/<?php echo $value['author_id'] ?>"><?php echo Author::getNameAuthorById($value['author_id']); ?></a>
                            </span>

                    <?php endforeach; ?>
                </p>
                <p class="lead text-center">Book genres:
                    <?php
                    $genres = Book::getBooksGenre($book['id']);
                    foreach ($genres as $key => $value):
                        ?>
                            <span class="badge badge-pill badge-warning">
                                <a href="content/contentByGenre/<?php echo $value['genre_id'] ?>"><?php echo Genre::getTitleGenreById($value['genre_id']); ?></a>
                            </span>
                    <?php endforeach; ?>
                </p>
                <p class="lead text-center">Description: <?php echo $book['description'] ?></p>
                <p class="lead text-center">Price: <?php echo $book['price'] ?></p>
                <p class="lead text-center">Add in:  <?php echo date('d.m.Y H:i:s') ?></p>
                <a href="/content/<?php echo $book['id']; ?>">
                    <button type="button" class="btn btn-info">Details and order</button>
                </a>
            </div>
            <div>
                <img class="main-image card-img-top" src="/src/images/books.gif" />
            </div>
        </div>
    </div>
    <?php endforeach; ?>

    </div>
</div>
<footer class="container py-5">
    <div class="row">
        <div class="col-12 col-md">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="d-block mb-2"><circle cx="12" cy="12" r="10"></circle><line x1="14.31" y1="8" x2="20.05" y2="17.94"></line><line x1="9.69" y1="8" x2="21.17" y2="8"></line><line x1="7.38" y1="12" x2="13.12" y2="2.06"></line><line x1="9.69" y1="16" x2="3.95" y2="6.06"></line><line x1="14.31" y1="16" x2="2.83" y2="16"></line><line x1="16.62" y1="12" x2="10.88" y2="21.94"></line></svg>
            <small class="d-block mb-3 text-muted">&copy; 2017-2018</small>
        </div>
        <div class="col-6 col-md">
            <h5>Features</h5>
            <ul class="list-unstyled text-small">
                <li><a class="text-muted" href="#">Cool stuff</a></li>
                <li><a class="text-muted" href="#">Random feature</a></li>
                <li><a class="text-muted" href="#">Team feature</a></li>
                <li><a class="text-muted" href="#">Stuff for developers</a></li>
                <li><a class="text-muted" href="#">Another one</a></li>
                <li><a class="text-muted" href="#">Last time</a></li>
            </ul>
        </div>
        <div class="col-6 col-md">
            <h5>Resources</h5>
            <ul class="list-unstyled text-small">
                <li><a class="text-muted" href="#">Resource</a></li>
                <li><a class="text-muted" href="#">Resource name</a></li>
                <li><a class="text-muted" href="#">Another resource</a></li>
                <li><a class="text-muted" href="#">Final resource</a></li>
            </ul>
        </div>
        <div class="col-6 col-md">
            <h5>Resources</h5>
            <ul class="list-unstyled text-small">
                <li><a class="text-muted" href="#">Business</a></li>
                <li><a class="text-muted" href="#">Education</a></li>
                <li><a class="text-muted" href="#">Government</a></li>
                <li><a class="text-muted" href="#">Gaming</a></li>
            </ul>
        </div>
        <div class="col-6 col-md">
            <h5>About</h5>
            <ul class="list-unstyled text-small">
                <li><a class="text-muted" href="#">Team</a></li>
                <li><a class="text-muted" href="#">Locations</a></li>
                <li><a class="text-muted" href="#">Privacy</a></li>
                <li><a class="text-muted" href="#">Terms</a></li>
            </ul>
        </div>
    </div>
</footer>
<script src="https://cdnjs.cloudflare.com/ajax/libs/holder/2.9.4/holder.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script>
    Holder.addTheme('thumb', {
        bg: '#55595c',
        fg: '#eceeef',
        text: 'Thumbnail'
    });
</script>
</body>
</html>
