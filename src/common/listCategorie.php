<section class="d-flex mb-5">
  <aside class="col-2 d-inline-block">
    <ul class="nav flex-column offset-md-1 mt-5">
      <?php foreach (getCategory() as $value) : ?>
        <li class="nav-item">
          <a class="nav-link" href=<?php echo "../../src/pages/categories.php?id=" . $value->categoryId ?>><?php echo $value->typeProduct ?></a>
        </li>
      <?php endforeach?>
    </ul>
  </aside>
