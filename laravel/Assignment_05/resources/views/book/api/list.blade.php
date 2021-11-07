<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{csrf_token()}}">
  <title>Assignment 4</title>

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
  <div class="card-header">
    {{ __('Book List') }}
  </div>
  <div class="card-body">
    <div class="row mb-2 search-bar">
      <a class="btn btn-primary header-btn" href="/apiView/book/createWithAPI">{{ __('Create') }}</a>
    </div>
    <div class="card-body">
      <table class="table table-hover">
        <thead>
          <th class="header-cell" scope="col">Book ID</th>
          <th class="header-cell" scope="col">Title</th>
          <th class="header-cell" scope="col">Type</th>
          <th class="header-cell" scope="col">Operation</th>
        </thead>
        <tbody>
        </tbody>

      </table>
    </div>
  </div>
  <script>
    jQuery.ajax({
      url: "/api/book/list",
      type: 'GET',
      dataType: 'json',
      data: {
        name: jQuery('#id').val(),
        type: jQuery('#type').val(),
        price: jQuery('#price').val()
      },
      success: function(res) {

        res.forEach(bookList => {

          var html = '<tr>';
          html += '<td>' + bookList.id + '</td>';
          html += '<td>' + bookList.title + '</td></tr>';
          console.log(bookList.id);
          $('tbody').append(
            `<tr>
                        <td>${bookList.id}</td>
                        <td>${bookList.title}</td>
                        <td>${bookList.type}</td>
                        <td>
                        <a type="button" class="btn btn-primary" href="/apiView/book/edit/${bookList.id}">Edit</a>
                        <a type="button" onclick="deleteById(${bookList.id})" class="btn btn-danger">Delete</a>
                        </td>
                        </tr>`
          );
        });
      }
    });
  </script>
</body>

</html>