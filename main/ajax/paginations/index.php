<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-4.0.0.min.js" integrity="sha256-OaVG6prZf4v69dPg6PhVattBXkcOWQB62pdZ3ORyrao=" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="">
        <input type='text' placeholder='Name' id='name'><Br>
        <input type='text' placeholder='Email' id='email'><Br>
        <input type='text' placeholder='Mobile' id='mobile'><Br>
        <input type="submit" id='submit'>
    </form>
    <button id='show'>show database</button>
    <input type="search" placeholder="Searching..." id="search">
    <div id="showT"></div>
    <div id="pagination"></div>
    <script>
        $(function() {

            let updateId;

            $('#submit').click(function(event) {
                event.preventDefault();
                let name = $('#name').val();
                let email = $('#email').val();
                let mobile = $('#mobile').val();

                if ($(this).val() != 'Update') {
                    $.ajax({
                        url: "register.php",
                        method: 'POST',
                        data: {
                            name: name,
                            email: email,
                            mobile: mobile
                        },
                        success: function(result) {
                            if (result)

                                callingshow()
                            else
                                alert("User Alreay Registerd");

                        }

                    }) //ajax closing
                } else {
                    $.ajax({
                        url: 'update.php',
                        method: 'POST',
                        data: {
                            id: updateId,
                            name: name,
                            email: email,
                            mobile: mobile
                        },
                        success: function(result) {
                            if (result)
                                callingshow()
                            else
                                alert("Unable to Update");
                        }

                    }) //ajax 
                }

            }); //submit butto

            $('#show').click(function() {
                callingshow();
            }) //show button

            function showtable(result) {
                let table = `
            <table class='table table-striped-columns'>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Action</th>
                </tr>
            `;
                for (let i = 0; i < result.length; i++) {
                    table += `<tr>
                                    <td>${result[i]['id']}</td>                
                                    <td>${result[i]['username']}</td>                
                                    <td>${result[i]['email']}</td>                
                                    <td>${result[i]['mobile']}</td> 
                                    <td><button class='btn btn-danger' id='deleteUser' data-deleteID='${result[i]['id']}'>Delete</button>&nbsp&nbsp
                                        <button class='btn btn-info' id='editUser' data-editID='${result[i]['id']}'>Edit</button>
                                    </td>               
                                    </tr>
                        `;
                }
                table += "</table>";
                $('#showT').html(table);

            }

            function callingshow(page) {
                $.ajax({
                    url: 'showdata.php',
                    method: 'GET',
                    data: {
                        page: page
                    },
                    success: function(resultarray) {
                        showtable(resultarray.data);
                        showPagination(resultarray.totalPages);
                    }
                }); //ajax
            }

            function showPagination(totalPages) {//30PAGE

                let buttons = '';
                let limit=10;
                let flag=1;
                for (let i = 1; i <= totalPages; i++) {
                    
                    buttons += `
                            <button class="page-btn"
                                data-page="${i}">
                                ${flag} to ${flag+limit-1} &nbsp&nbsp
                            </button> &nbsp&nbsp`;
                    flag+=limit;
                }

                $('#pagination').html(buttons);
            }

            //*******************************Page click************************** */
            $(document).on('click', '.page-btn', function() {

                let page = $(this).data('page');

                callingshow(page);
            });

            //*******************************Delete************************** */
            $(document).on('click', '#deleteUser', function() {
                let myid = $(this).attr('data-deleteID');
                if (confirm('Do You want to Delete')) {
                    $.ajax({
                        url: 'deleteUser.php',
                        type: "POST",
                        data: {
                            myid: myid
                        },
                        success: function(result) {
                            if (result)
                                callingshow();
                        }
                    })
                };

            })

            //***************************Edit******************************** */
            $(document).on('click', '#editUser', function() {
                // console.log("update");

                updateId = $(this).attr('data-editID');
                $.ajax({
                    url: 'edit.php?id=' + updateId,
                    type: 'GET',
                    success: function(result) {
                        // console.log(typeof(result));

                        // console.log(result);

                        $('#name').val(result[1]);
                        $('#email').val(result[2]);
                        $('#mobile').val(result[4]);
                        $('#submit').val('Update');

                    }
                })
            })

            //***************************Search******************************** */
            $('#search').keyup(function() {
                let searchData = $(this).val();

                $.ajax({
                    url: "search.php",
                    method: "POST",
                    data: {
                        search: searchData
                    },
                    success: function(result) {
                        // console.log(result);
                        // console.log(typeof(result));
                        showtable(result);
                    }
                })
            })

        }) //jqwery closing
    </script>
</body>

</html>