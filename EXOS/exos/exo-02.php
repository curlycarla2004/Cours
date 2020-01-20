<?php

$continents = [
  'Europe',
  'North America',
  'Asia',
  'Oceania',
  'Africa',
  'South America',

];

$continent = $_GET['continent'];
$population = get_continent_population($continent);
$pop_en_millions = affichage_en_millions($population);

?>
<form method="get">
  <div class="form-row align-items-center">
    <div class="col-3">
      <div class="form-group">
        <label for="continent">Continent</label>
        <select class="form-control" id="continent" name="continent">
          <?php foreach ($continents as $value) : ?>
            <option value="<?php echo $value; ?>"><?php echo $value; ?></option>
          <?php endforeach; ?>
        </select>
      </div>
    </div>
    <div class="col">
      <p class="text-center">La population totale de <?php echo $continent; ?> est de <?php echo $pop_en_millions; ?> millions d'habitants. </p>
    </div>
  </div>

  <button class="button" type="submit" style="background-color:green;">Submit</button>
</form>
