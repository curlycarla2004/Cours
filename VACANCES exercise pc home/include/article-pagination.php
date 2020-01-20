<?php
$total_articles=count_articles();
$nb_pages = ceil($total_articles / 2);
?>

<nav class= "d-flex justify-content-center">
    <ul class="pagination">
        <li class="page-item"><a class="page-link" href="?p=0">Premiere page</a></li>
        <?php for ($i = 1; $i < ($nb_pages - 1); $i++) : ?>
            <li class="page-item"><a class="page-link" href="?p=<?php echo $i; ?>"><?php echo $i; ?></a></li>
        <?php endfor; ?>
        <li class="page-item"><a class ="page-link" href="?p=<?php echo($nb_pages - 1); ?>">Derniere page</a></li>
    </ul>
</nav>