<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://code.jquery.com/jquery-4.0.0.js" integrity="sha256-9fsHeVnKBvqh3FB2HYu7g2xseAZ5MlN6Kz/qnkASV8U=" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #74ebd5, #9face6);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            background: white;
            padding: 25px 30px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
            width: 300px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        input {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input:focus {
            border-color: #6c63ff;
            outline: none;
        }

        button {
            width: 100%;
            padding: 10px;
            background: #6c63ff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background: #574fd6;
        }
    </style>
</head>

<body>

<div class="form-container">
    <h2>Register</h2>

    <form id="myForm" action="register.php" method="POST">
    <input type="text" name="username" id="username" placeholder="Full Name" required>
    <span></span>
    <input type="email" name="email" id="email" placeholder="Email" required>

    <input type="password" name="password" id="password" placeholder="Password" required>

    <input type="password" name="rpassword" id="rpassword" placeholder="Retype Password" required>

        <button type="submit" id="register">Register</button>
    </form>
</div>
<script>
    $(function(){
        
        $("#username").change(function(){

            let username=$(this).val()
            //ajax  method--post,get,action=abc.php, arr=[username=ajay]
            $.ajax({
                url:'VerifyUsername.php',
                dataType:'text',
                method:'POST',
                data:{username:username},
                    success:function(result){
                    if(result==1){
                        $('span').text('Username Already Exist').css('color','red');
                    }
                    else{
                        $('span').text('Username Available').css('color','green');  
                    }
                   }
            })
        })

        $("#register").click(function(e){
            
        // alert("clicked");
        e.preventDefault(); // page reload rokega
        let username=$("#username").val();
        let email=$("#email").val();
        let password=$("#password").val();
        let rpassword=$("#rpassword").val();
        // console.log(username);
        
        $.ajax({
            url: 'register.php',
            method: 'POST',
            data: {username:username,
                email:email,
                password:password,
                rpassword:rpassword,
            },
            success: function(result){
                alert(result); //"Inserted" 
            }
        });

    });

    })

    </script>

</body>
</html>