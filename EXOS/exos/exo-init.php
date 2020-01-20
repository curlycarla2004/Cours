<?php 
$cities = get_cities(5); 
//Récuperation de la premiere ligne du tableau $cities
$first_line = $cities[0];
//$colonnes = array_keys($cities[0]);
?>

<table class="table table-hover">
  <thead>
    <tr>
      <?php foreach($first_line as $key => $value) : ?>
        <th><?php echo $key; ?></th>
      <?php endforeach; ?>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($cities as $city) : ?>
      <tr>
      <?php foreach($first_line as $key => $value) : ?>
        <td><?php echo $city[$key]; ?></td>
        <?php endforeach; ?>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
