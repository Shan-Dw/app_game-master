<!-- main content -->
<div class="pt-16 wrap_content">
    <!-- head content -->
    <div class="wrap_content-head text-center">
        <?php $main_title = "App Game";
        include("_h1.php")
        ?>
        <p class="pt-5 text-white">L'application qui répertorie vos jeux préférés...</p>

        <!--Add Game -->
        <div class="pt-16 pb-16">
            <a href="addGame.php" class="btn bg-black border-0 hover:scale-125" style="transition: 0.8s;">Ajouter un utilisateur</a>
        </div>

        <?php require_once("_alert.php") ?>

    </div>
    <!-- table-->
    <div class="overflow-x-auto mt-16 mb-16">
        <table class="table w-full ">
            <thead>
                <tr>
                    <th class="bg-black text-white">#</th>
                    <th class="bg-black text-white">Nom</th>
                    <th class="bg-black text-white">Email</th>
                    <th class="bg-black text-white">Voir</th>
                    <th class="bg-black text-white">Modifier</th>
                    <th class="bg-black text-white">Supprimer</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $index = 1;
                if (count($users) == 0) {
                    echo " <tr><td class='text-center'> Pas de jeux disponible actuellement</td> </tr>";
                } else { ?>
                    <?php foreach ($users as $user) : ?>
                        <tr class="">
                            <th class="bg-zinc-800 text-red-800 font-black hover:text-red-500"> <?= $index++ ?> </th>
                            <td class="bg-zinc-800 text-white"><a href="showUser.php?id=<?= $user['id'] ?>&name=<?= $user['name'] ?>"><?= $user['name'] ?></a></td>
                            <td class="bg-zinc-800 text-white"><?= $user['email'] ?></td>
                            <td class="bg-zinc-800 text-white">
                                <a href="showUser.php?id=<?= $user['id'] ?>&name=<?= $user['name'] ?>">
                                    <img src="public/img/oeil.png" alt="eye" class="w-4">
                                </a>
                            </td>
                            <td class="bg-zinc-800 text-white"><a href="update.php?id=<?= $user["id"] ?>&name=<?= $user["name"] ?>" class="btn btn-success text-white">Modifier</a></td>
                            <td class="bg-zinc-800 text-white"><?php include("_modal.php") ?></td>
                        </tr>
                    <?php endforeach ?>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<!-- end main content -->