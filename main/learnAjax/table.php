<?php
$conn=mysqli_connect("localhost","root","","database1")or die("connetion failed");
$sql="select * from registration";
$result=mysqli_query($conn,$sql)or die("sql failed");
$output="";
if(mysqli_num_rows($result)>0){
    $output='<table border="1" width="50%" cellspacing="0" cellpadding="10px">
    <tr>
    <th>Username</th>
    <th>Email</th>

    </tr>';
    while($row=mysqli_fetch_assoc($result)){
        $output.="<tr>
        <td>{$row['username']}
        </td>
        <td>{$row['email']}</td>
        </tr>";
    }
     $output.="</table>";
      echo $output;
    
    
}

else{
    echo "<h2>no record found</h2>";
}
 mysqli_close($conn);
?>