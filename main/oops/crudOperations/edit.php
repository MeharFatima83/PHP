<?php
include 'database.php';
include 'student.php';

$db = new Database();
$user = new User($db->conn());

if (isset($_REQUEST['id'])) {
    $user->id = $_REQUEST['id'];
    $result = $user->edit(); 
    $data = mysqli_fetch_assoc($result);
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $user->id = $_REQUEST['id']; // ID ensure karein
    $user->name = $_POST['name'];
    $user->email = $_POST['email'];
    $user->mobile = $_POST['mobile'];
    
    // Yahan pehle aap edit() call kar rahe the, ise update() karein
    if ($user->update()) {
        header("Location:read.php");
        exit(); 
    } else {
        echo "Update failed!";
    }
}
?>




<form action="" method="POST" style="max-width: 400px; margin: 20px auto; padding: 20px; border: 1px solid #ddd; border-radius: 8px; font-family: sans-serif;">
  <h3 style="text-align: center;">Edit Student</h3>
  
  <div style="margin-bottom: 15px;">
    <label style="display: block; margin-bottom: 5px; font-weight: bold;">Name</label>
    <!-- Value attribute add kiya gaya hai -->
    <input type="text" name="name" value="<?php echo $data['name']; ?>" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">
  </div>

  <div style="margin-bottom: 15px;">
    <label style="display: block; margin-bottom: 5px; font-weight: bold;">Email</label>
    <input type="email" name="email" value="<?php echo $data['email']; ?>" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">
  </div>

  <div style="margin-bottom: 15px;">
    <label style="display: block; margin-bottom: 5px; font-weight: bold;">Mobile</label>
    <input type="tel" name="mobile" value="<?php echo $data['mobile']; ?>" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">
  </div>

  <button type="submit" style="width: 100%; padding: 12px; background-color: #28a745; color: white; border: none; border-radius: 4px; font-size: 16px; cursor: pointer;">
    Update Student
  </button>
  
  <a href="read.php" style="display: block; text-align: center; margin-top: 10px; color: #666; text-decoration: none; font-size: 14px;">Cancel</a>
</form>
