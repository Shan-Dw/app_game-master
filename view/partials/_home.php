<!-- main content -->
<div class="pt-16 wrap_content">
    <!-- head content -->
    <div class="wrap_content-head text-center">
        <?php $main_title = "AppGame";
        include("_h1.php")
        ?>
        <p class="pt-5 text-white text-2xl font-bold">L'application qui répertorie vos jeux préférés...</p>
        <label class="swap swap-flip text-8xl mt-8">
  
      <!-- this hidden checkbox controls the state -->
          <input type="checkbox" />
      
          <div class="swap-on">😈</div>
          <div class="swap-off">😇</div>
        </label>

        <!--Add Game -->
        <div class="pt-16 pb-16">
            <a href="addGame.php" class="btn bg-black border-0 hover:scale-125" style="transition: 0.8s;">Ajouter un jeu</a>
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
                    <th class="bg-black text-white">Genre</th>
                    <th class="bg-black text-white">Plateform</th>
                    <th class="bg-black text-white">prix</th>
                    <th class="bg-black text-white">PEGI</th>
                    <th class="bg-black text-white">Voir</th>
                    <th class="bg-black text-white">Modifier</th>
                    <th class="bg-black text-white">Supprimer</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $index = 1;
                if (count($games) == 0) {
                    echo " <tr><td class='text-center'> Pas de jeux disponible actuellement</td> </tr>";
                } else { ?>
                    <?php foreach ($games as $game) : ?>
                        <tr class="hover:text-red-600">
                            <th class="bg-zinc-800 text-red-800 font-black"> <?= $index++ ?> </th>
                            <td class="bg-zinc-800 text-white"><a href="show.php?id=<?= $game['id'] ?>&name=<?= $game['name'] ?>"><?= $game['name'] ?></a></td>
                            <td class="bg-zinc-800 text-white"><?= $game['genre'] ?></td>
                            <td class="bg-zinc-800 text-white"><?= $game['plateforms'] ?></td>
                            <td class="bg-zinc-800 text-white"><?= $game['price'] ?></td>
                            <td class="bg-zinc-800 text-white"><?= $game['PEGI'] ?></td>
                            <td class="bg-zinc-800 text-white">
                                <a href="show.php?id=<?= $game['id'] ?>&name=<?= $game['name'] ?>">
                                    <img src="public/img/oeil.png" alt="eye" class="w-4">
                                </a>
                            </td>
                            <td class="bg-zinc-800 text-white"><a href="update.php?id=<?= $game["id"] ?>&name=<?= $game["name"] ?>" class="btn btn-success text-white">Modifier</a></td>
                            <td class="bg-zinc-800 text-white"><?php include("_modal.php") ?></td>
                        </tr>
                    <?php endforeach ?>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<!-- end main content -->