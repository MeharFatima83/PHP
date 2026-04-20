<?php
include 'database.php';
include 'student.php';

$db = new Database();
$user = new User($db->conn());

// Assuming you have a method in your User class to fetch all records
$result = $user->read(); 
?>

<table style="width: 100%; border-collapse: collapse; font-family: sans-serif; margin-top: 20px;">
  <thead>
    <tr style="background-color: #f8f9fa; border-bottom: 2px solid #dee2e6;">
      <th style="padding: 12px; text-align: left; border: 1px solid #ddd;">ID</th>
      <th style="padding: 12px; text-align: left; border: 1px solid #ddd;">Name</th>
      <th style="padding: 12px; text-align: left; border: 1px solid #ddd;">Email</th>
      <th style="padding: 12px; text-align: left; border: 1px solid #ddd;">Mobile</th>
      <th style="padding: 12px; text-align: center; border: 1px solid #ddd;">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td style="padding: 12px; border: 1px solid #ddd;"><?php echo $row['id']; ?></td>
      <td style="padding: 12px; border: 1px solid #ddd;"><?php echo $row['name']; ?></td>
      <td style="padding: 12px; border: 1px solid #ddd;"><?php echo $row['email']; ?></td>
      <td style="padding: 12px; border: 1px solid #ddd;"><?php echo $row['mobile']; ?></td>
      <td style="padding: 12px; border: 1px solid #ddd; text-align: center;">
        <!-- Edit Button -->
        <a href="edit.php?id=<?php echo $row['id']; ?>" style="text-decoration: none; background-color: #ffc107; color: black; border: none; padding: 6px 12px; border-radius: 4px; cursor: pointer; font-size: 14px; margin-right: 5px; display: inline-block;">
          Edit
        </a>
        
        <!-- Delete Button -->
        <a href="delete.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure?')" style="text-decoration: none; background-color: #dc3545; color: white; border: none; padding: 6px 12px; border-radius: 4px; cursor: pointer; font-size: 14px; display: inline-block;">
          Delete
        </a>
      </td>
    </tr>
    <?php } ?>
  </tbody>
</table>
