<?php 
$index = $pagination->index; 
$max = intval($pagination->max);
$xx = 6;
$bg = $index - $xx;
if($bg < 0) $bg = 0;
$end = $index + $xx;
if($end > $max) $end = $max;
?>
<nav class="app-pagination">
    <ul class="pagination justify-content-center">
        <?php if($index > $xx){?>
        <li class="page-item">
            <a class="page-link" href="?index=<?= 0 ?>"><?= __("dau") ?></a>
        </li>
        <?php }?>
        <?php if($index > 0){?>
        <li class="page-item">
            <a class="page-link" href="?index=<?= $index - 1 ?>"><?= __("truoc") ?></a>
        </li>
        <?php }?>
        <?php for ($i = $bg; $i < $index; $i++) { ?>
        <li class="page-item"><a class="page-link" href="?index=<?= $i ?>"><?= $i ?></a></li>
        <?php } ?>
        <?php if($max > 1){?>
        <li class="page-item active"><a class="page-link" href="#"><?= $index ?></a></li>
        <?php }?>
        <?php for ($i = $index + 1; $i <= $end; $i++) { ?>
        <li class="page-item"><a class="page-link" href="?index=<?= $i ?>"><?= $i ?></a></li>
        <?php } ?>
        <?php if($index < $max - 1){?>
        <li class="page-item">
            <a class="page-link" href="?index=<?= $index + 1 ?>"><?= __("sau") ?></a>
        </li>
        <?php }?>
        <?php if($index < $max - $xx){?>
        <li class="page-item">
            <a class="page-link" href="?index=<?= $max ?>"><?= __("cuoi") ?></a>
        </li>
        <?php }?>
    </ul>
</nav>