<?php

    include_once "db.php";

    $query = "SELECT * FROM details";
    $fire = mysqli_query($con,$query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF Export</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    
</head>
<body>
<div class="container">
  <h2>Export PDF</h2>
  <hr/>
  <table class="table">
    <thead>
      <tr>
        <th>Name</th>
        <th>Tamilname</th>
      </tr>
    </thead>
    <tbody>
    <?php while($row = mysqli_fetch_assoc($fire)) {  ?>
      <tr>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['tamilvalue']; ?></td>
      </tr>
    <?php } ?>
    </tbody>
  </table>

  <form method="post" action="process.php">
        <input type="submit" name="btn" id="btn" value="Export PDF" class="btn btn-success">
  </form>
</div>
</body>
</html>