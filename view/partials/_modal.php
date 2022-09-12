<!-- The button to open modal -->
<label for="<?= $game["id"] ?>" class="btn modal-button bg-red-800 border-0 text-white">Supprimer</label>

<!-- Put this part before </body> tag -->
<input type="checkbox" id="<?= $game["id"] ?>" class="modal-toggle" />
<div class="modal">
    <div class="modal-box">
        <h3 class="font-extrabold text-lg text-center text-black ">Voulez-vous vraiment supprimer ce jeux?</h3>
        <div class="flex justify-center space-x-5 pt-5">
            <div class="modal-action">
                <label for="<?= $game["id"] ?>" class="btn btn-success text-white">Non</label>
            </div>
            <div class="modal-action">
                <label for="<?= $game["id"] ?>" class="btn bg-red-800 border-0"> <a href="delete.php?id=<?= $game["id"] ?>&name=<?= $game["name"] ?>" class="text-white">Oui</a></label>
            </div>
        </div>
    </div>
</div>