
<html>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<button id="loadBtn">Load Users</button>
<div></div>
<script>
$("#loadBtn").click(function(){
    show();
});
function show(){
    $.ajax({
        url:'backend.php',  
        method:'GET',
        dataType:'json',
        success:function(result){
            showtable(result);
        },
        error:function(){
            $('div').html("<p style='color:red;'>Error loading data</p>");
        }
    });
}

function showtable(result){

    let table = `
    <table border="1" cellpadding="10">
        <tr>
            <th>Username</th>
            <th>Email</th>
        </tr>`;
    if(result.length === 0){
        table += `<tr><td>No Data Found</td></tr>`;
    }
    for(let i=0;i<result.length && i<5;i++){
        table += `
        <tr>
            <td>${result[i].username}</td>
            <td>${result[i].email}</td>
        </tr>`;
    }
    table += "</table>";
    $('div').html(table);
}

</script>


</html>


////backend.php
<?php
include 'db.php';

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

$sql = "SELECT username, email FROM student";
$result = mysqli_query($conn, $sql);

$data = [];

while($row = mysqli_fetch_assoc($result)){
    $data[] = $row;
}

echo json_encode($data);
?>