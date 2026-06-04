<html>
<head>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>

<body>

<input type="text" id="name" placeholder="enter your name">
<input type="number" id="roll" placeholder="enter your rollnumber">
<input type="email" id="email" placeholder="enter your email">
<input type="submit" id="save" value="submit">

<div id="table-data"></div>

<script>
$(document).ready(function(){

 function loadTable(){
    $.ajax({
        url:'usertable.php',
        type:'POST',
        success:function(data){
            $("#table-data").html(data);
        }
    });
 }

 loadTable();

 $("#save").on("click",function(e){
    e.preventDefault();

    var name = $("#name").val();
    var rollnumber = $("#roll").val();
    var email = $("#email").val();

    $.ajax({
        url:"ajax-insert.php",
        type:'POST',
        data:{name:name, rollnumber:rollnumber, email:email},
        success:function(data){
            if(data == 1){
                loadTable();

                // clear form
                $("#name").val('');
                $("#roll").val('');
                $("#email").val('');
            }
            else{
                alert("can't save record");
            }
        }
    });

 });

});
</script>

</body>
</html>