<!DOCTYPE html>
<html>
<head>
    <title>Choose Your Pokémon</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body class="bg-light">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card p-4 shadow-sm">
                    <h2 class="mb-4 text-center">Pick Your Pokémon for Battle!</h2>
                    <form action="combat2.php" method="POST">
                        <div class="mb-3">
                            <label for="pokemon1" class="form-label">Player 1 Pokémon:</label>
                            <select name="pokemon1" id="pokemon1" class="form-select" required>
                                <option value="1">Slaking (Normal)</option>
                                <option value="2">Volbeat (Normal)</option>
                                <option value="3">Charizard (Feu)</option>
                                <option value="4">Suicune (Eau)</option>
                                <option value="5">Torterra (Plante)</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="pokemon2" class="form-label">Player 2 Pokémon:</label>
                            <select name="pokemon2" id="pokemon2" class="form-select" required>
                                <option value="1">Slaking (Normal)</option>
                                <option value="2">Volbeat (Normal)</option>
                                <option value="3">Charizard (Feu)</option>
                                <option value="4">Suicune (Eau)</option>
                                <option value="5">Torterra (Plante)</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-danger w-100">Start Combat</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
