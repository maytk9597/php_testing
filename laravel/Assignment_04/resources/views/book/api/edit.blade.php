<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>API Edit</title>

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('css/lib/jquery.dataTables.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/post-list.css') }}" rel="stylesheet">

  <!-- Script -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="{{ asset('js/post-list.js') }}"></script>
</head>

<body>
  <div class="card">
    <div class="card-header">
      Edit Book
    </div>
    <div class="card-body">
      <div class="form-group row">
        <label for="title" class="col-md-4 col-form-label text-md-right required">Title</label>
        <div class="col-md-6">
          <input type="text" name="title" class="form-control" value="{{ old('title') }}" autocomplete="title" autofocus>
        </div>
      </div>
      <div class="form-group row">
        <label for="type" class="col-md-4 col-form-label text-md-right required">Type</label>
        <div class="col-md-6">
          <input type="text" name="type" class="form-control" value="{{ old('title') }}" autocomplete="title" autofocus>
        </div>
      </div>
      <div class="form-group row">
        <label for="price" class="col-md-4 col-form-label text-md-right required">Price</label>
        <div class="col-md-6">
          <input type="text" name="price" class="form-control" value="{{ old('title') }}" autocomplete="title" autofocus>
        </div>
      </div>
      <div class="form-group row">
        <label for="quantity" class="col-md-4 col-form-label text-md-right required">Quantity</label>
        <div class="col-md-6">
          <input type="text" name="quantity" class="form-control" value="{{ old('title') }}" autocomplete="title" autofocus>
        </div>
      </div>
      <div class="form-group row">
        <label for="author_id" class="col-md-4 col-form-label text-md-right required">Author_ID</label>
        <div class="col-md-6">
          <input type="text" name="author_id" class="form-control" value="{{ old('title') }}" autocomplete="title" autofocus>
        </div>
      </div>
      <div class="form-group row">
        <label for="releaseDate" class="col-md-4 col-form-label text-md-right required">releaseDate</label>
        <div class="col-md-6">
          <input type="date" name="releaseDate" class="form-control" value="{{ old('title') }}" autocomplete="title" autofocus>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-md-6">
          <button class="btn btn-primary" onclick="editbook()">Edit</button>
        </div>
      </div>

    </div>
  </div>
  </div>

  <script>
    var bookId = window.location.pathname.split('/')[4];
    console.log(bookId);
    $.ajax({
      url: "/api/book/" + bookId,
      type: 'GET',
      dataType: 'json', // added data type
      success: function(res) {
        $('[name=title]').val(res.title);
        $('[name=type]').val(res.type);
        $('[name=price]').val(res.price);
        $('[name=quantity]').val(res.quantity);
        $('[name=author_id]').val(res.author_id);
        $('[name=releaseDate]').val(res.releaseDate);
      }
    });
  </script>
</body>

</html>