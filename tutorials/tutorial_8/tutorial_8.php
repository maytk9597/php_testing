<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create_Tutorial8</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <?php require_once "process.php" ?>
  <h2>Add New Students To Table</h2>
  <form method="POST">
    <label for="name">Name</label>
    <input type="text" name="name">
    <label for="mark">Mark</label>
    <input type="text" name="mark">
    <label for="email">Email</label>
    <input type="text" name="email">
    <button type="submit" name="add">Add</button>
  </form>
  <?php
  if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mark = $_POST["mark"];
    if ($name == '' or $email == '' or $mark == '') {
      echo "<p class = error>All fields are require</p>";
    } else {
      add_data($con, $name, $mark, $email);
    }
  }

  ?>
  <?php
  $fetchData = fetch_data($con);
  ?>
  <div class="table-wrapper">
    <h2>Students And Mark</h2>
    <table>
      <tr>
        <th>No</th>
        <th> Name</th>
        <th>Mark</th>
        <th>Email Address</th>
      </tr>
      <?php
      if (count($fetchData) > 0) {
        for ($row = 0; $row < count($fetchData); $row++) {
      ?>
          <tr>
            <td><?php echo $fetchData[$row]['id']; ?></td>
            <td><?php echo $fetchData[$row]['name']; ?></td>
            <td><?php echo $fetchData[$row]['mark']; ?></td>
            <td><?php echo $fetchData[$row]['email']; ?></td>
          </tr>
        <?php
        }
      } else {
        ?>
        <tr>
          <td colspan="4">No Data Found</td>
        </tr>
      <?php
      }
      ?>
    </table>
  </div>
  <h2>Edit Students Infomation</h2>
  <form method="POST">
    <label for="edit_id">ID</label>
    <input type="text" name="edit_id">
    <label for="edit_name">Name</label>
    <input type="text" name="edit_name">
    <label for="edit_mark">Mark</label>
    <input type="text" name="edit_mark">
    <label for="edit_email">Email</label>
    <input type="text" name="edit_email">
    <button name="Edit">Edit</button>
  </form>
  <?php
  if (isset($_POST['Edit'])) {
    $edit_name = $_POST['edit_name'];
    $edit_email = $_POST['edit_email'];
    $edit_mark = $_POST["edit_mark"];
    $edit_id = $_POST["edit_id"];
    if ($edit_name == '' or $edit_email == '' or $edit_mark == '' or $edit_id == "") {
      echo "<p class= error>Fields can't be empty</p>";
    } else {
      update_data($con, $edit_id, $edit_email, $edit_name, $edit_mark);
    }
  }
  ?>
  <h2>Delete Student using ID</h2>
  <form method="POST">
    <label for="delete_id">ID</label>
    <input type="text" name="delete_id">
    <button name="Delete">Delete</button>
  </form>
  <?php
  if (isset($_POST['Delete'])) {
    $delete_id = $_POST['delete_id'];

    if ($delete_id == "") {
      echo "<p class = error>Field can't be empty</p>";
    } else {
      delete_data($con, $delete_id);
    }
  }
  ?>
</body>

</html>