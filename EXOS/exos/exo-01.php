<?php 
$countries = get_countries_by_population(5); 
//Récuperation de la premiere ligne du tableau $cities
$first_line = $countries[0];
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
    <?php foreach ($countries as $country) : ?>
      <tr>
      <?php foreach($country as $key => $value) : ?>
        <?php if($key == 'Population'):?>
          <td><?php echo number_format($value / 1000000, 2, ',','')?></td>
        <?php else:?>
          <td><?php echo $value; ?></td>
        <?php endif;?>
        <?php endforeach; ?>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>