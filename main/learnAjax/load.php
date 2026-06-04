<html>
<head>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>

<body>

<button id="load">Load Users</button>

<div id="table-data"></div>

<script>
$(document).ready(function(){

    $("#load").click(function(){
        $.ajax({
            url: 'table.php',
            method: 'POST',
            success: function(data){
                $("#table-data").html(data);
            }
        });
    });

});
</script>

</body>
</html>