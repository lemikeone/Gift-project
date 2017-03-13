<?php include("sessionstart.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Modifier un proche</title>
	<?php include("styles.php"); ?>
</head>
<body>

<script type="text/javascript">
   $(document).ready(function() {
    $('select').material_select();
  });
</script>

<?php 
include("menu.php");
include("header.php"); 

$idproche = $_GET['idproche'];

include("configuration.php");
$bdd = new PDO("mysql:host={$host};dbname={$dbname};charset=utf8", $username, $password);

$reponse = $bdd->prepare('SELECT * FROM usersfriends WHERE id = ?');
$reponse->execute(array($idproche));
$donnees = $reponse->fetch();
?>
<h1><?php echo $donnees['prenom']; ?> <?php echo $donnees['nom']; ?></h1>
<p>Ne renseignez que les champs que vous souhaitez modifier</p>

<form method="POST" action="modification-proche-ok.php">
<div class="row">
      <div class="form-group col-md-4">
        <input class="form-control" type="text" name="prenom" placeholder="<?php echo htmlspecialchars($donnees['prenom']); ?>">
    </div>
    <div class="form-group col-md-4">
        <input class="form-control" type="text" name="nom" placeholder="<?php echo htmlspecialchars($donnees['nom']); ?>">
      </div>
      

      <div class="form-group col-md-4">
      <select class="form-control" name="link">
      <option value="Mère" <?php if ($donnees['link'] == 'Mère') {echo ('selected="selected"');}?> >Mère</option>
      <option value="Père" <?php if ($donnees['link'] == 'Père') {echo ('selected="selected"');}?> >Père</option>
      <option value="Fille" <?php if ($donnees['link'] == 'Fille') {echo ('selected="selected"');}?> >Fille</option>
      <option value="Fils" <?php if ($donnees['link'] == 'Fils') {echo ('selected="selected"');}?> >Fils</option>
      <option value="Grand Mère" <?php if ($donnees['link'] == 'Grand Mère') {echo ('selected="selected"');}?> >Grand Mère</option>
      <option value="Grand Père" <?php if ($donnees['link'] == 'Grand Père') {echo ('selected="selected"');}?> >Grand Père</option>
      <option value="Soeur" <?php if ($donnees['link'] == 'Soeur') {echo ('selected="selected"');}?> >Soeur</option>
      <option value="Frère" <?php if ($donnees['link'] == 'Frère') {echo ('selected="selected"');}?> >Frère</option>
      <option value="Famille" <?php if ($donnees['link'] == 'Famille') {echo ('selected="selected"');}?> >Famille</option>
      <option value="Conjoint" <?php if ($donnees['link'] == 'Conjoint') {echo ('selected="selected"');}?> >Conjoint</option>
      <option value="Conjointe" <?php if ($donnees['link'] == 'Conjointe') {echo ('selected="selected"');}?> >Conjointe</option>
      <option value="Femme" <?php if ($donnees['link'] == 'Femme') {echo ('selected="selected"');}?> >Femme</option>
      <option value="Mari" <?php if ($donnees['link'] == 'Mari') {echo ('selected="selected"');}?> >Mari</option>
      <option value="Ami" <?php if ($donnees['link'] == 'Ami') {echo ('selected="selected"');}?> >Ami</option>
      <option value="Travail" <?php if ($donnees['link'] == 'Travail') {echo ('selected="selected"');}?> >Travail</option>
      <option value="Autre" <?php if ($donnees['link'] == 'Autre') {echo ('selected="selected"');}?> >Autre</option>
    </select>
    </div>
    </div>
    <div class="row">
    <div class="form-group col-md-4">
        <select class="form-control" name="jour" /> 
      <option value="<?php echo substr($donnees['datedenaissance'], 8, 2) ?>" selected>Jour : <?php echo substr($donnees['datedenaissance'], 8, 2)?></option>
   <option>1</option>       
    <option>2</option>       
    <option>3</option>       
    <option>4</option>       
    <option>5</option>       
    <option>6</option>       
    <option>7</option>       
    <option>8</option>       
    <option>9</option>       
    <option>10</option>       
    <option>11</option>       
    <option>12</option>       
    <option>13</option>       
    <option>14</option>       
    <option>15</option>       
    <option>16</option>       
    <option>17</option>       
    <option>18</option>       
    <option>19</option>       
    <option>20</option>       
    <option>21</option>       
    <option>22</option>       
    <option>23</option>       
    <option>24</option>       
    <option>25</option>       
    <option>26</option>       
    <option>27</option>       
    <option>28</option>       
    <option>29</option>       
    <option>30</option>       
    <option>31</option>   
    </select>
        </div>

        <div class="form-group col-md-4">
        
<select class="form-control" name="mois" /> 
    <option value="<?php echo substr($donnees['datedenaissance'], 5, 2); ?>" selected>Mois : <?php echo substr($donnees['datedenaissance'], 5, 2); ?></option>
   <option>1</option>       
    <option>2</option>       
    <option>3</option>       
    <option>4</option>       
    <option>5</option>       
    <option>6</option>       
    <option>7</option>       
    <option>8</option>       
    <option>9</option>       
    <option>10</option>       
    <option>11</option>       
    <option>12</option>        
    </select>


        </div>
        <div class="form-group col-md-4">
       
       <?php // selection de l'année
$earliest_year = 1900;
?><select class="form-control" name="annee"><option value="<?php echo substr($donnees['anneenaissance'], 0, 4); ?>" selected>Année : <?php 
        if ($donnees['anneenaissance'] != "0000-00-00") {
          echo substr($donnees['anneenaissance'], 0, 4); 
        } ?></option>' <?php
foreach (range(date('Y'), $earliest_year) as $x) { print '<option value="'.$x.'">'.$x.'</option>'; }
print '</select>'; ?>
        </div>
<!-- Fin de la selection de l'année -->

    </div>
    <input type="hidden" name="idproche" value="<?php echo "$idproche"; ?>">
    
    <div class="row">

<div class="col-md-4">
</div>
<div class="col-md-4">

          <button class="btn btn-default btn-block" type="submit">Modifier</button>
          </div>
          <div class="col-md-4">
</div>
        </div>
      </form>
      <br>

    <form method="POST" action="delete-proche.php">
    <div class="row">

<div class="col-md-4">
</div>
<div class="col-md-4">
      <input type="hidden" name="idproche" value="<?php echo "$idproche"; ?>">
       <button class="btn btn-danger btn-block" onclick="return confirm('Etes vous sûr ? Le contact ne pourra pas être récupéré.')" type="submit">Supprimer le proche</button>
</div>
<div class="col-md-4">
</div>
</div>
</form>
<br/><br/>
<?php include("footer.php"); ?>

</body>
</html>