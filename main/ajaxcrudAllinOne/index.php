<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- jQuery (stable version) -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <title>CRUD Operation</title>
</head>
<body class="p-4">

    <form>
        <input type='text' placeholder='Name' id='name' class="form-control mb-2">
        <input type='text' placeholder='Email' id='email' class="form-control mb-2">
        <input type='text' placeholder='Mobile' id='mobile' class="form-control mb-2">
        <input type="submit" id='submit' class="btn btn-primary mb-3">
    </form>

    <button id='show' class="btn btn-success mb-3">Show Database</button>

    <div id="output"></div>

<script>
$(function(){

    // INSERT DATA
    $('#submit').click(function(event){
        event.preventDefault();

        let name = $('#name').val();
        let email = $('#email').val();
        let mobile = $('#mobile').val();

        $.ajax({
            url:"register.php",
            method:'POST',
            data:{name:name, email:email, mobile:mobile},
            success:function(result){
                if(result){
                    callingshow();
                } else {
                    alert("User Already Registered");
                }
            }
        });
    });

    // SHOW BUTTON
    $('#show').click(function(){
        callingshow();
    });

    // SHOW TABLE FUNCTION
    function showtable(result){   
        let table = `
        <table class='table table-bordered'>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Action</th>
            </tr>
        `;

        for(let i=0; i<result.length; i++){
            table += `<tr>
                        <td>${result[i].id}</td>                
                        <td>${result[i].name}</td>                
                        <td>${result[i].email}</td>                
                        <td>${result[i].mobile}</td> 
                        <td>
                            <button class='btn btn-danger deleteUser' data-id='${result[i].id}'>Delete</button>
                            <button class='btn btn-info'>Edit</button>
                        </td>               
                    </tr>`;
        }

        table += "</table>";
        $('#output').html(table);
    }

    // FETCH DATA
    function callingshow(){
        $.ajax({
            url:'showdata.php',
            method:'GET',
            dataType:'json',
            success:function(resultarray){
                showtable(resultarray);
            }
        });
    }

    // DELETE (FIXED)
    $(document).on('click','.deleteUser',function(){
        let myid = $(this).attr('data-id');

        if(confirm('Do you want to delete?')){
            $.ajax({
                url:'deleteUser.php',
                type:"POST",
                data:{myid:myid},
                success:function(result){
                    if(result.trim() == "1"){
                        callingshow();
                    } else {
                        alert("Delete failed");
                    }
                }
            });
        }
    });

});
</script>

</body>
</html>