<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Editer le Conducteur</title>
</head>
<body>
    <h1>Editer le Conducteur</h1>

    <div class="container-fluid mt-5">
        <form action="ajouter_conducteur.php" method="post">

            <!-- Nom -->
            <div class="form-group">
                <label for="nom"><?php ?></label>
                <input type="text" name="nom" id="nom"  class="form-control" placeholder="nom">
            </div>

            <!-- Prenom -->
            <div class="form-group">
                <label for="prenom">Prénom</label>
                <input type="text" name="prenom" id="prenom" class="form-control" placeholder="prénom">
            </div>

            <button type="submit" name="submit" class="btn btn-secondary">Editer ce conducteur</button>

        </form>
    </div>

</body>
</html>