<?php
$title = 'Ajout d\'un nouveau bénévole';
ob_start();
?>

<div class="container-fluid">
  <a class="btn btn-primary" href="index.php" role="button"><i class="far fa-arrow-alt-circle-left"></i> Retour sur la liste des bénévoles</a>
  <h4 class="text-center mb-5">Ajout d'un nouveau bénévole</h4>
  <form class="w-25 mx-auto mb-5" method="post" action="index.php?action=addUser">
    <div class="form-group">
      <label for="exampleInputEmail1">Nom de famille</label>
      <input type="text" class="form-control" name="last_name">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Prénom</label>
      <input type="text" class="form-control" name="first_name">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Age</label>
      <input type="text" class="form-control" name="years">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Commentaire</label>
      <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="comments"></textarea>
    </div>
    <div class="form-group">
      <label for="formGroupExampleInput">Disponibilité</label><br>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="Oui" name="avai">
        <label class="form-check-label" for="inlineCheckbox1">Oui</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="Non" name="avai">
        <label class="form-check-label" for="inlineCheckbox2">Non</label>
      </div>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Adresse</label>
      <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" name="avenue"></textarea>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Ville</label>
      <input type="text" class="form-control" name="city">
    </div>
    <button type="submit" class="btn btn-primary">Ajouter</button>
  </form>
</div>

<?php
$content = ob_get_clean();
require 'template.php';
?>
