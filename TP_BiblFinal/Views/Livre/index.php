
<table class="table table-striped">
    <tr>
        <th>Id</th>
        <th>Nom</th>
        <th>NbPages</th>
        <th></th>
    </tr>
    <?php foreach($livres as $livre) : ?>
        <tr>
        <td><?=$livre['id'] ?></td>
        <td><?=$livre['nom'] ?></td>
        <td><?=$livre['nbPages'] ?></td>
        <td>
        <a class="btn btn-success" href="edit/<?=$livre['id'] ?>">Modifier</a>
        <a class="btn btn-danger" href="delete/<?=$livre['id'] ?>">Supprimer</a>
        </td>
        </tr>
    <?php endforeach; ?>
</table>
<div class="row">
    <a href="add" class="btn btn-primary d-block">Ajouter</a>
</div>
