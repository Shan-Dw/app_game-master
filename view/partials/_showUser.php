<a href="index.php" class="text-black text-sm">
    <- retour </a>
        <div class="text-center mb-16">
            <h1 class="text-red-800 text-5xl  text-uppercase font-black pb-10 pt-16 "><?= $user["name"] ?></h1>
            <div class="">
                <p>Pseudo : <?= $user["name"] ?></p>
                <p>Email : <?= $user["email"] ?></p>
            </div>
            <div class="pt-10">
                <a href="update.php?id=<?= $user["id"] ?>&name=<?= $user["name"] ?>" class="btn btn-success text-white">Modifier</a>
                <?php include("_modal.php") ?>
            </div>
        </div>