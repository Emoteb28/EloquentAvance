<?php
/**
 * Created by PhpStorm.
 * User: isaac
 * Date: 07/01/19
 * Time: 19:12
 */

require_once 'Header.php';


 use catawich\models\Categorie;
use catawich\models\Sandwich;

/*
 * Question 1
 */

$menu = Sandwich::select()->get();
echo "<h2>1. Liste les sandwichs du catalogue,  leur nom, description et type de pain : </h2>";

 foreach($menu as $s){
     echo "<h3><b><u> Nom</u>: ".$s->nom . '</b></h3>';
     echo "<b> Description : </b> ".$s->description . '<br>';
     echo "<b> Type de pain : </b>".$s->type_pain .'<br>';
 }

/*
 * Question 2
 */
echo "<h2>2. Liste les sandwichs du catalogue, selon le Type de pain : </h2>";
 $menu2 = Sandwich::select()->orderBy('type_pain','ASC')->get();
  foreach($menu2 as $s){
       echo "<h3><b><u> Nom</u>: ".$s->nom . '</b></h3>';
      echo "<b> Description : </b>".$s->description . '<br>';
      echo "<b>Type de pain : </b>".$s->type_pain .'<br>';
  }

/*
 * Question 3
 */
 use Illuminate\Database\Eloquent\ModelNotFoundException;
echo "<h2>3. Afficher le sandwich n° 42  ou  ModelNotFoundException : </h2>";

 $sand1 = Sandwich::select()
     ->find(42);
 try{

     if(isset($sand1)){
         echo "<h3><b><u> Nom</u>: " .$sand1->nom .  '</b></h3>';
         echo "<b>Description : </b>".$sand1->description . '<br>';
         echo "<b>Type de pain : ".$sand1->type_pain . '<br>';
     }else{
         throw new ModelNotFoundException('Not found');
     }

 }catch(ModelNotFoundException $ex){
     echo $ex->getMessage();
 }


/*
 * Question 4
 */
echo "<h2> 4. Afficher les sandwichs dont le Type de pain contient baguette, triés par Type de pain </h2>";
 $menu3 = Sandwich::select()
     -> where('type_pain','=','baguette')
     ->orderBy('type_pain','ASC')
     ->get();

 foreach($menu3 as $s){
      echo "<h3><b><u> Nom</u>: ".$s->nom . "</b></h3>";
     echo "<b>Description : </b>".$s->description . '<br>';
     echo "<b>Type de pain : </b>".$s->type_pain .'<br>';
 }


/*
 * Question 5
 */
echo "<h2>5. Créer un nouveau sandwich et l'insérer dans la base : </h2>";
 $creerSandwitch = new Sandwich();
 $creerSandwitch->nom = 'Abidjanaise';
 $creerSandwitch->description = ' Pain au four traditionnel';
 $creerSandwitch->type_pain = 'Mie';
 $creerSandwitch->save();
    echo "Sandwitch crée !";

