<div class="d-inline-block mt-5 col-9">
    <h2 class="mb-5">En promotion cette semaine</h2>
    <div class="mx-auto">
        <div class="d-flex justify-content-around">
            <?php $i = 0;
            foreach (getProductOnTop() as $values) { ?>
                <a href=<?php echo "../../src/pages/article.php?id=" . $values->productId ?> class="text-decoration-none text-dark">
                    <div class="card" style="width: 13rem;">
                        <img src="<?php echo $values->imgUrl ?>" class="card-img-top" alt="productImage">
                        <div class="card-img-overlay text-center w-75 mx-auto mt-5">
                            <p class="card-title bg-success text-white "><?php echo $values->productName ?></p>
                            <p class="card-text bg-primary text-white "><?php echo $values->typeProduct ?></p>
                            <p class="card-text bg-danger text-white "><?php echo $values->prix ?></p>
                        </div>
                    </div>
                </a>
            <?php
                $i++;
                if ($i == 5) {
                    break;
                }
            }
            ?>
        </div>
    </div>