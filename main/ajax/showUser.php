<!DOCTYPE html>
<html>
<head>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>
<body>


<div id="updateform">
    <h3>Update User</h3>
<input type="text" id="username" placeholder="Enter username"><br><br>
<input type="text" id="email" placeholder="Enter email"><br><br>
<input type="number" id="mobile" placeholder="Enter mobile"><br><br>
<input type="search" id="search" placeholder="search here"><br><br>

<button id="updateBtn">Update</button>
<br><br>
</div>
<button id="loadBtn">Load Data</button>

<div id="showT"></div>

<script>
 
$(function(){
    let updateID;//empty
    $('#updateform').hide();
    // DELETE
    $(document).on('click','#deleteBtn',function(){
        let id = $(this).data('deleteid');

        if(confirm("Are you sure you want to delete?")){
            $.ajax({
                url:'delete.php',
                method:'POST',
                data:{id:id},
                success:function(result){
                    console.log(result);
                    show();
                }
            });
        }
    });
       ////////////////////search
    $("#search").keyup(function(){
        let searchData=$(this).val();
        $.ajax({
            url:'search.php',
            method:'POST',
            data:{search:searchData},
            success:function(result){
                showtable(result);
            }
        })
    })
    // EDIT (fetch single data)
    $(document).on('click','#editBtn',function(){
        $('#updateform').slideDown();
        updateID = $(this).data('editid');
        // console.log(id);
        
        $.ajax({
            url:'getSingle.php',
            method:'POST',
            data:{id:updateID},
            dataType:'json',
            success:function(data){
                console.log(data);
                
                $("#username").val(data.username);
                $("#email").val(data.email);
                $("#mobile").val(data.mobile);
            }
        });
    });

    // UPDATE DATA
    $("#updateBtn").click(function(){
        
        
        let username = $("#username").val();
        let email = $("#email").val();
        let mobile = $("#mobile").val();

        

        $.ajax({
            url:'update.php',
            method:'POST',
            data:{
                id:updateID,
                username:username,
                email:email,
                mobile:mobile
            },
            success:function(res){
                // alert(res);
                show();

                // clear form
                $("#username").val("");
                $("#email").val("");
                $("#userId").val("");
            }
        });

    });

    // LOAD DATA
    $("#loadBtn").click(function(){
        show();
    });

    // FETCH DATA
    function show(){
        $.ajax({
            url:'showData.php',
            method:'GET',
            dataType:'json',
            success:function(result){
                showtable(result);
            }
        });
    }

    // TABLE
    function showtable(result){
        let table = `
        <table border="1" cellpadding="10">
            <tr>
                <th>Id</th>
                <th>Username</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Action</th>
            </tr>`;

        if(result.length === 0){
            table += `<tr><td colspan="3">No Data Found</td></tr>`;
        }

        for(let i=0;i<result.length;i++){
            table += `
            <tr>
                <td>${result[i].id}</td>
                <td>${result[i].username}</td>
                <td>${result[i].email}</td>
                <td>${result[i].mobile}</td>
                <td>
                    <button data-deleteid="${result[i].id}" id="deleteBtn">
                        Delete
                    </button>
                    <button data-editid="${result[i].id}" id="editBtn">
                        Edit
                    </button>
                </td>
            </tr>`;
        }

        table += "</table>";
        $('#showT').html(table);
    }

});
</script>

</body>
</html>