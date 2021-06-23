    <?php
    if (isset($_GET["id"])) {
        $id = $_GET["id"];
    } else {
        $id = null;
    }
    $result = getProduct($id);
    ?>

    <h2 class="mt-5">Nos Nouveautés</h2>
    <?php foreach ($result as $value) : ?>
        <div class="d-inline-block mt-4 mx-5 container col-3">
            <div class="row">
                <a href=<?php echo "../../src/pages/article.php?id=" . $value->productId ?> class="text-decoration-none text-dark">
                    <div class="card">
                        <img src="<?php echo $value->imgUrl ?>" class="card-img-top" alt="articleImg">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $value->productName ?></h5>
                            <h6 class="card-subtitle mb-2 text-muted"><?php echo $value->typeProduct ?></h6>
                            <p class="card-text"><?php echo $value->description ?></p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    <?php endforeach ?>
    </div>
    </section>