<?php $pager->setSurroundCount(3) ?>
<div class="col-lg-12">
  <nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">

      <!-- Left  -->
      <?php if ($pager->hasPrevious()) : ?>
      <li class="page-item">
        <a class="page-link fas fa-angle-double-left" style="padding: 0.59rem 0.75rem;"
          href="<?= $pager->getFirst() ?>"></a>
      </li>
      <li class="page-item">
        <a class="page-link fas fa-angle-left" style="padding: 0.59rem 0.75rem;"
          href="<?= $pager->getPreviousPage() ?>"></a>
      </li>
      <li class="page-item">
        <a class="page-link" href="javascript::void(0)">...</a>
      </li>
      <?php endif ?>

      <!-- Middle -->
      <?php foreach ($pager->links() as $link) : ?>
      <li class="page-item <?= $link['active'] ? " active" : "" ?> ">
        <a class="page-link" href="<?= $link['uri'] ?>"><?= $link['title'] ?></a>
      </li>
      <?php endforeach ?>

      <!-- Right -->
      <?php if ($pager->hasNext()) : ?>
      <li class="page-item">
        <a class="page-link" href="javascript::void(0)">...</a>
      </li>
      <li class="page-item">
        <a class="page-link fas fa-angle-right" style="padding: 0.59rem 0.75rem;"
          href="<?= $pager->getNextPage() ?>"></a>
      </li>
      <li class="page-item">
        <a class="page-link fas fa-angle-double-right" style="padding: 0.59rem 0.75rem;"
          href="<?= $pager->getLast() ?>"></a>
      </li>
      <?php endif ?>
    </ul>
  </nav>
</div>