<?php

$nextbirthday = get_next_birthday($donnees['datedenaissance']);
        $duree = floor((strtotime($nextbirthday) - time()));
       ?>
        <div class="flux">
        <div class="row">
        <div class="col-md-8">

        <h2><a href="fiche-proche.php?idproche=<?php echo $donnees['ID'] ?>"><?php echo htmlspecialchars($donnees['prenom']); ?> <?php echo htmlspecialchars($donnees['nom']); ?></a></h2>
        <p><i class="fa fa-birthday-cake" aria-hidden="true"></i> Anniversaire : 

		<?php 
		if ($donnees['anneenaissance'] != '0000-00-00') {
			# code...
		
		$datecomplete = substr($donnees['anneenaissance'], 0, 4).substr($donnees['datedenaissance'], 4);
         echo (age($datecomplete)+1); ?> ans <?php
}

        ?> le <?php echo utf8_encode(strftime("%A %e %B %Y", strtotime($nextbirthday))); ?></p>
        <?php echo '<p ><i class="fa fa-clock-o" aria-hidden="true"></i> Dans ', floor((strtotime($nextbirthday) - time())/86400)+1; echo " jours</p>"; ?>


<?php

        ?> 
        </div>
        <div class="col-md-4 margin20">
           <a href="fiche-proche.php?idproche=<?php echo $donnees['ID'] ?>" class="btn btn-default btnflux">Ajouter / voir vos idées cadeaux <i class="fa fa-angle-right" aria-hidden="true"></i></a>
        </div>

        </div>
        </div>
        