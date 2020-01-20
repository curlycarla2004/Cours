<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <title>Document</title>
</head>
<body>
    <h1>Titre</h1>
    <button id="get">Get</button>
    <div id="page"></div>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

    <script>
        id = 1;
        $('#get').click(function(){
            $.get("test"+id+".php", function( resultat ){
                $('#page').html(resultat);
            });
            id +=1;
        });
    </script>
</body>
</html>