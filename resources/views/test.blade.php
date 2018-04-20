<!DOCTYPE html>
<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#blur").blur(function(){
                alert("This input field has lost its focus.");
            });
        });
    </script>
</head>
<body>

Enter your name: <input  id=blur type="text">
<p>Write something in the input field, and then click outside the field to lose focus (blur).</p>

</body>
</html>
