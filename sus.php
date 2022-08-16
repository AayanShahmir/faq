<?php
$conn = mysqli_connect("localhost", "root", "", "test_db");
$rows = mysqli_query($conn, "SELECT * FROM sug");
?>
<table border = 1 cellpadding = 10>
  <tr>
    <td>#</td>
    <td>Name</td>
    <td>Suggestion</td>
    
  </tr>
  <?php $i = 1; ?>
  <?php foreach($rows as $row) : ?>
    <tr>
      <td><?php echo $i++; ?></td>
      <td><?php echo $row["name"]; ?></td>
      <td><?php echo $row["email"]; ?></td>
      
    </tr>
  <?php endforeach; ?>
</table>