<?php
session_start();
require_once "Pokemon.php";
require_once "PokemonFeu.php";
require_once "PokemonPlante.php";
require_once "PokemonEau.php";
require_once "AttackPokemon.php";

$attack1=new AttackPokemone(10,110,2,30);
$Pokemon1=new Pokemon("Slaking","https://img.pokemondb.net/artwork/avif/slaking.avif",250,$attack1);

$attack2=new AttackPokemone(30,130,3,25);
$Pokemon2=new Pokemon("Volbeat","https://img.pokemondb.net/artwork/avif/volbeat.avif",260,$attack2);

$attack3=new AttackPokemone(30,170,4,40);
$PokemonFire=new PokemonFeu("Charizard","https://img.pokemondb.net/artwork/avif/charizard.avif",300,$attack3);

$attack4=new AttackPokemone(20,150,3,45);
$PokemonWater=new PokemonEau("Suicune","https://img.pokemondb.net/artwork/avif/suicune.avif",320,$attack4);

$attack5=new AttackPokemone(25,166,4,35);
$PokemonPlant=new PokemonPlante("Torterra","https://img.pokemondb.net/artwork/avif/torterra.avif",345,$attack5);

$AllPokemons=[$Pokemon1,$Pokemon2,$PokemonFire,$PokemonWater,$PokemonPlant];
$Premier = (int)$_POST['pokemon1'];
$deuxieme = (int)$_POST['pokemon2'];
$Pokemons=[$AllPokemons[$Premier-1],$AllPokemons[$deuxieme-1]];
$round=0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Combat </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>

<?php
function renderPokemonDetails($Pokemon) {
    $pokemonInfo = $Pokemon->WhoAmI();
    ?>
    <div class="bg-secondary-subtle border border-dark col-6 p-3">
        <div class="p-4">
            <div class="p-3 bg-secondary-subtle d-flex align-items-center">
                <div class="me-3">
                    <strong><?php echo $Pokemon->getName(); ?></strong>
                </div>
                <div>
                    <img src="<?php echo $Pokemon->getUrl(); ?>" alt="<?php echo $Pokemon->getName(); ?>" style="max-width: 100px; height: auto;">
                </div>
            </div>
            <?php
            foreach ($pokemonInfo as $key => $value) {
                if ($key === "Name" || $key === "URL") {
                    continue;
                }
                ?>
                <div class="p-3 border border-dark">
                    <?php echo $key . ": " . $value . "<br>"; ?>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
    <?php
}?>


<?php while(!$Pokemons[0]->isDead() && !$Pokemons[1]->isDead()) { 
    $round++; ?>
<div class=" p-3 bg-primary-subtle text-dark rounded">
        <strong>Round <?php echo $round; ?></strong>
    </div>    
<div class="container-fluid border border-dark">
    <div class="row">
    <?php
    foreach ($Pokemons as $Pokemon) { 
        renderPokemonDetails($Pokemon);}
           
        $attackPoint1=$Pokemons[0]->attack($Pokemons[1]); 
        $attackPoint2=$Pokemons[1]->attack($Pokemons[0]); ?>
                    
   </div>
</div>
<div>
    <div class="p-3 bg-danger-subtle text-dark rounded">
        <strong>Round <?php echo $round; ?></strong>
        <div class="p-2 bg-secondary-subtle rounded d-flex justify-content-between align-items-center">
            <span><?php echo $attackPoint1; ?></span>
            <span class="mx-auto"><?php echo $attackPoint2; ?></span>
        </div>
    </div>
</div>
</div>
<?php } ?> 

<?php $Winner=$Pokemons[0]->TheWinner($Pokemons[1]);
 ?>
 <div class="container-fluid border border-dark">
    <div class="row">
 <?php
    foreach ($Pokemons as $Pokemon) { 
        renderPokemonDetails($Pokemon); }?>
   </div>
</div>
<div>
    <div class="p-4 bg-success-subtle text-dark rounded">
        <strong>The winner is </strong>
        <div class="p-3 bg-secondary-subtle d-flex align-items-center border border-dark">
                     <div class="me-3">
                          <strong><?php echo $Winner->getName(); ?></strong>
                     </div>
                     <div>
                     <img src="<?php echo $Winner->getUrl(); ?>" alt="<?php echo $Winner->getName(); ?>" style="max-width: 100px; height: auto;">
                     </div>
    </div>
</div>
</div>             
</body>
</html>