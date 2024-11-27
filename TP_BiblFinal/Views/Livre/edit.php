<form method="POST" action="../modifier">
  <div class="mb-3">
  <input type="hidden" value="<?= $livre['id'] ?>"  id="id" name="id">
    <label for="nom" class="form-label">Nom</label>
    <input type="text" value="<?= $livre['nom'] ?>" class="form-control" id="nom" name="nom">
  </div>
  <div class="mb-3">
    <label for="nbPages" class="form-label">Nb Pages</label>
    <input type="number" value="<?= $livre['nbPages'] ?>" class="form-control" id="nbPages" name="nbPages">
  </div>
  
  <div class="row">
  <input type="submit" class="btn btn-primary d-block" value="Modifier"/>
  </div>
</form>