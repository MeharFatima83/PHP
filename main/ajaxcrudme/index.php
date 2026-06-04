<form action="">
    <input type="text" placeholder="name"><br>
    <input type="text" placeholder="email"><br>
    <input type="number" placeholder="mobile"><br>
    <input type="submit" id="submit">
    <button id="show">show</button><br>
    <input type="search" placeholder="search here">
    <script>
        $(function(){
            $('')

            $('#submit').click(function(event){
                event.preventDefault();
                let name=$('#name').val();
                let email=$('#email').val();
                let mobile=$('#mobile').val();
                $.ajax({
                    url:'register.php'
                    type:'POST'
                    }
                    success:function(result){
                        if(result){
                         console.log(result);
                        }
                        else{
                            alert("something went wrong");
                        }
                })
            })

            //show
            $('#show').click(function)()
            $.ajax({
                url:'showdata.php',
                type:'GET',
                success:function(Resultarray){
                    showtable(resultarray);
                }
            });//ajax
            
        

        })//show buttomn
        function showtable(result){
            let table=`
            <table>
            <tr>
            <th>id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Mobile</th>
            <th>Action</th>
            </tr>
            `;
            for(let i=0;i<result.length;i++){
                table+=`<tr>
                <td>${result[i]['id']}</td>
                <td>${result[i]['name']}</td>
                <td>${result[i]['email']}</td>
                <td>${result[i]['mobile']}</td>
                <td><button class='btn btn-danger' id='data'>Delete</button>&nbps&nbps&nbps<button>Edit</button>
                </tr>
                `
            }

            function callingshow(){

            }
        }
        ///////////////delete
        $("#deleteUser").on('click',function(){
            let myid=$(this).data('deketeid');
        )
    </script>