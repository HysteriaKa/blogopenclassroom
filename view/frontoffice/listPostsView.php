<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
<h1>Mon super blog !</h1>
<p>Derniers billets du blog :</p>


<?php
while ($donnees = $req->fetch())
{
?>
    <div class="news">
        <h3>
             <?=htmlspecialchars($donnees['title']); ?>
             <em>le <?=$donnees['creation_date_fr']; ?></em>
        </h3>

        <p> 
            <?= htmlspecialchars($donnees['content'])?>;
            <br />
            <em><a href="index.php?action=post&id=<?= $donnees['id']; ?>">Commentaires</a></em>
        </p>
    </div>
<?php
}  
$req->closeCursor();
?>
<?php $content = ob_get_clean(); ?>
<?php require('view/frontoffice/template.php'); ?>    