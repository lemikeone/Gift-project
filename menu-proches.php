<select class="form-control" name="idproche" /> 
<?php 

 $reponse2 = $bdd->prepare('SELECT * FROM usersfriends WHERE iduser = ? ORDER BY nom');
      $reponse2->execute(array($_SESSION['id']));
?> <?php
      // On affiche chaque entrée une à une
      while ($donnees2 = $reponse2->fetch())
        { ?>  <option value="<?php echo $donnees2['ID']; ?>"> <?php echo htmlspecialchars($donnees2['prenom']); ?> <?php echo htmlspecialchars($donnees2['nom']); ?></option>
<?php
 } 
$reponse2->closeCursor(); // Termine le traitement de la requête
 ?>
   

    </select>