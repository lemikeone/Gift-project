<?php

$nextbirthday = get_next_birthday($donnees['datedenaissance']);
        $duree = floor((strtotime($nextbirthday) - time()));
       ?>
        <div class="flux">
        

        <h2><a href="fiche-proche.php?idproche=<?php echo $donnees['ID'] ?>"><?php echo $donnees['prenom']; ?> <?php echo $donnees['nom']; ?></a></h2>
        <p><i class="fa fa-birthday-cake" aria-hidden="true"></i> Anniversaire : <?php echo (age($donnees['datedenaissance'])+1); ?> ans le <?php echo strftime("%A %e %B %Y", strtotime($nextbirthday)); ?></p>
        <?php echo '<p ><i class="fa fa-clock-o" aria-hidden="true"></i> Dans ', floor((strtotime($nextbirthday) - time())/86400); echo " jours</p>"; 



        ?> 

        </div>