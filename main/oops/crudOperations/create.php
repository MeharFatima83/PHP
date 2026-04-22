<form action="" method="POST" style="max-width: 400px; margin: 20px auto; padding: 20px; border: 1px solid #ddd; border-radius: 8px; font-family: sans-serif;">
  <div style="margin-bottom: 15px;">
    <label style="display: block; margin-bottom: 5px; font-weight: bold;">Name</label>
    <input type="text" name="name" placeholder="John Doe" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">
  </div>

  <div style="margin-bottom: 15px;">
    <label style="display: block; margin-bottom: 5px; font-weight: bold;">Email</label>
    <input type="email" name="email" placeholder="john@example.com" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">
  </div>

  <div style="margin-bottom: 15px;">
    <label style="display: block; margin-bottom: 5px; font-weight: bold;">Mobile</label>
    <input type="tel" name="mobile" placeholder="123-456-7890" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">
  </div>

  <button type="submit" style="width: 100%; padding: 12px; background-color: #007bff; color: white; border: none; border-radius: 4px; font-size: 16px; cursor: pointer;">
    Submit
  </button>
</form>







<?php
include 'database.php';
include 'student.php';
$db=new Database();
$user=new User($db->conn());

if($_SERVER['REQUEST_METHOD']=="POST"){
    $user->name = $_POST['name'];
    $user->email = $_POST['email'];
    $user->mobile = $_POST['mobile'];

    if($user->create()){
        echo "Data inserted successfully ";
    } else {
        echo "Insert failed ";
    }
}
?>