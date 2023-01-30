<?php $index = $pagination->index; ?>
<nav class="app-pagination">
    <ul class="pagination justify-content-center">
        <?php if($index > 0){?>
        <li class="page-item">
            <a class="page-link" href="?index=<?= $index - 1 ?>">Sau</a>
        </li>
        <?php }?>
        <?php for ($i = 0 ; $i < $index; $i++) { ?>
        <li class="page-item"><a class="page-link" href="?index=<?= $i ?>"><?= $i ?></a></li>
        <?php } ?>
        <?php if($pagination->max > 1){?>
        <li class="page-item active"><a class="page-link" href="#"><?= $index ?></a></li>
        <?php }?>
        <?php for ($i = $index + 1; $i < $pagination->max; $i++) { ?>
        <li class="page-item"><a class="page-link" href="?index=<?= $i ?>"><?= $i ?></a></li>
        <?php } ?>
        <?php if($index < $pagination->max - 1){?>
        <li class="page-item">
            <a class="page-link" href="?index=<?= $index + 1 ?>">Trước</a>
        </li>
        <?php }?>
    </ul>
</nav>