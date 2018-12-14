<?php
$title = 'La liste des bénévoles';
ob_start();
?>

<div class="container">
  <a href="index.php?action=formAddUser"><button type="button" class="btn btn-success mb-4">Ajouter un bénévole</button></a>
  <form method="post" action="index.php?action=selectChoice" class="d-flex justify-content-end mb-3">
    <div class="form-row align-items-center">
      <div class="form-check pr-2">
        <input class="form-check-input" type="checkbox" name="id" id="exampleRadios1" value="option1">
        <label class="form-check-label" for="exampleRadios1">ID</label>
      </div>
      <div class="form-check pr-2">
        <input class="form-check-input" type="checkbox" name="years" id="exampleRadios2" value="option2">
        <label class="form-check-label" for="exampleRadios2">Age</label>
      </div>
      <div class="form-check pr-2">
        <input class="form-check-input" type="checkbox" name="orderName" id="exampleRadios3" value="option3">
        <label class="form-check-label" for="exampleRadios3">Nom par Ordre Alphabétique</label>
      </div>
      <div class="form-check pr-2">
        <input class="form-check-input" type="checkbox" name="city" id="exampleRadios4" value="option4">
        <label class="form-check-label" for="exampleRadios4">Ville</label>
      </div>
      <div class="form-check pr-2">
        <input class="form-check-input" type="checkbox" name="availability" id="exampleRadios5" value="option5">
        <label class="form-check-label" for="exampleRadios5">Disponibilité</label>
      </div>
      <div class="col-auto my-1">
        <button type="submit" class="btn btn-primary">Trier</button>
      </div>
    </div>
  </form>
  <table class="table mb-5">
    <thead>
      <tr class="bg-secondary">
        <th scope="col" class="text-center">ID</th>
        <th scope="col" class="text-center">Nom</th>
        <th scope="col" class="text-center">Prénom</th>
        <th scope="col" class="text-center">Age</th>
        <th scope="col" class="text-center">Commentaire</th>
        <th scope="col" class="text-center">Disponibité</th>
        <th scope="col" class="text-center">Adresse / Ville</th>
        <th scope="col" class="text-center">Modification</th>
      </tr>
    </thead>
    <tbody>

  <?php
  foreach ($users as $key => $user) {
  ?>

      <tr class="bg-light">
        <th scope="row" class="text-center"> <?php echo $user['id_user']; ?></th>
        <td class="text-center"> <?php echo $user['last_name']; ?></td>
        <td class="text-center"> <?php echo $user['first_name']; ?></td>
        <td class="text-center"> <?php echo $user['years']; ?></td>
        <td class="text-center"> <?php echo $user['comments']; ?></td>
        <td class="text-center"> <?php echo $user['availability']; ?></td>
        <td class="text-center"> <?php echo $user['avenue']; ?> / <?php echo $user['city']; ?></td>
        <td class="text-center">
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-info" data-toggle="modal" data-target="#<?php echo $key; ?>">
            Modifier
          </button>
          <!-- Modal -->
          <div class="modal fade" id="<?php echo $key; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Modification des informations personnelles du bénévole</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form class="w-75 mx-auto mb-5" method="post" action="index.php?action=updateUser&id_user= <?php echo $user['id_user']; ?>">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nom de famille</label>
                      <input type="text" class="form-control" value=" <?php echo $user['last_name']; ?>" name="last_name">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Prénom</label>
                      <input type="text" class="form-control" value=" <?php echo $user['first_name']; ?>" name="first_name">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Age</label>
                      <input type="text" class="form-control" value=" <?php echo $user['years']; ?>" name="years">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Commentaire</label>
                      <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="comments"><?php echo $user['comments']; ?></textarea>
                    </div>
                    <div class="form-group">
                      <label for="formGroupExampleInput">Disponibilité</label><br>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="Oui" name="availability">
                        <label class="form-check-label" for="inlineCheckbox1">Oui</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="Non" name="availability">
                        <label class="form-check-label" for="inlineCheckbox2">Non</label>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Adresse</label>
                      <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" name="avenue"><?php echo $user['avenue']; ?></textarea>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Ville</label>
                      <input type="text" class="form-control" value="<?php echo $user['city']; ?>" name="city">
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-success">Modifier</button>
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <a href="index.php?action=removeUser&id_user=<?php echo $user['id_user']?> "><button type="button" class="btn btn-danger">Supprimer</button></a>
          </td>
      </tr>
  <?php
  }
  ?>

    </tbody>
  </table>
</div>

<?php
$content = ob_get_clean();
require 'template.php';
?>
