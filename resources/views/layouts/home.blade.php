<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>E-Commerce</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700%7CRoboto%7CJosefin+Sans:100,300,400,500" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style media="screen">
      body{
      /* background-color: #F4F6F9; */
      }
      .jumbotron{
        background-image: url("{{ asset('img/book.jpg')}} ");
        background-size: cover;
        background-repeat: no-repeat;
      }
    </style>
  </head>
  <body>

    <div class="container">
      <header class="blog-header py-3 border-bottom">
        <div class="row flex-nowrap justify-content-between align-items-center">
          <div class="col-4 pt-1">
            <a class="text-muted" href="{{ route('admin.products.index') }}">
              <h5>Dashboard</h5>
            </a>
          </div>
          <div class="col-4 text-center">
            <a class="text-monospace font-weight-bold text-dark" href="#">
              <h1>Space Book</h1>
            </a>
          </div>
          <div class="col-4 d-flex justify-content-end align-items-center">
            <form class="p-2 form-inline my-2 my-lg-0" action="index.html" method="post">
              <input type="search" class="form-control form-control-sm mr-sm-2" name="" placeholder="Search">
              <button class="btn btn-outline-info btn-sm" type="submit" name="button">Search</button>
            </form>
            <a class="btn btn-sm btn-outline-secondary" href="#">Sign In</a>
          </div>
        </div>
      </header>
      <div class="nav-scroller py-1 mb-2">
        <nav class="nav d-flex justify-content-between">
          <a class="p-2 text-muted" href="#">Pelajaran</a>
          <a class="p-2 text-muted" href="#">Novel</a>
          <a class="p-2 text-muted" href="#">Tutorial</a>
          <a class="p-2 text-muted" href="#">Sejarah</a>
          <a class="p-2 text-muted" href="#">Pelajaran</a>
          <a class="p-2 text-muted" href="#">Novel</a>
          <a class="p-2 text-muted" href="#">Tutorial</a>
          <a class="p-2 text-muted" href="#">Sejarah</a>
        </nav>
      </div>
      <div class="jumbotron p-4 p-md-5 text-white rounded">
        <div class="col-md-6 px-0">
          <h1>Buku Jendela Duniamu</h1>
          <p class="lead my-3">Multiple lines of text that form the lede, informing new readers quickly and efficiently about what’s most interesting in this post’s contents.</p>
          <a class="btn btn-outline-light" href="#">Registrasi Akun</a>
        </div>
      </div>

      <main>
        @yield('content')
      </main>

    </div><br><br>

    <footer class="border-top">
      <p class="text-center py-4">
        <strong>Copyright &copy; 2014-2018 <a href="#">BINARY Team</a>.</strong>
        All rights reserved.
      </p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
