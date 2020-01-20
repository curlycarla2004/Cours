<?php 
$articles = get_articles(5); 
//Récuperation de la premiere ligne du tableau $cities
// $first_line = $cities[0];
$colonnes = array_keys($articles[0]);
?>

<table class="table table-hover">
  <thead>
    <tr>
      <?php foreach($colonnes as $value) : ?>
        <th><?php echo $value; ?></th>
      <?php endforeach; ?>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($articles as $article) : ?>
      <tr>
      <?php foreach($article as $key => $value) : ?>
        <?php if ($key == 'corps') :?>
        <td><?php echo substr($value, 0, 120).'...'; ?></td>
        <?php else: ?>
          <td><?php echo $value; ?></td>
        <?php endif; ?>
        <?php endforeach; ?>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
