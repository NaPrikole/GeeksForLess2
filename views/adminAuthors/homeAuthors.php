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
    <link href="/src/css/login.css" rel="stylesheet">
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


<div class="text-right my-2 mx-2">
    <a href="/admin/authors/addAuthor">
        <button type="button" class="btn btn-info col-2">ADD AUTHOR</button>
    </a>
</div>
<table class="table table-bordered ml-3 overflow-hidden">
    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">NAME</th>
        <th class="text-right" scope="col">UPDATE</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($allAuthors as $author) : ?>
        <tr>
            <th scope="row"><?php echo $author['id'] ?></th>
            <td><?php echo $author['name'] ?></td>
            <td class="text-right">
                <a href="/admin/authors/updateAuthor/<?php echo $author['id'] ?>">
                    <button type="button" class="btn btn-info">UPDATE</button>
                </a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
</div>

</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/holder/2.9.4/holder.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>