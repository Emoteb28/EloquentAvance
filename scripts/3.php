<?php
/**
 * Created by PhpStorm.
 * User: isaac
 * Date: 07/01/19
 * Time: 23:30
 */

require_once 'Header.php';

use catawich\models\Sandwich;
use catawich\models\Categorie;

/*
 * Question 1
 */
echo "<h2>1. Lister les catégories du sandwich d'ID 5 ; afficher le sandwich (nom, description, type de
pain) et le nom de chacune des catégories auxquelles il est associé : </h2>";

 $sandwich5 = Sandwich::with('categories')->find(5);
    echo "<b>Nom :</b> ".$sandwich5->nom."<br>";
    echo "<b>Description :</b> ".$sandwich5->description ."<br>";
     echo "<b>Type de pain : </b>".$sandwich5->type_pain . "<br>";
     foreach($sandwich5->categories as $cat){
          echo "<b> - Categorie: </b>".$cat->nom ."<br>";
     }

/*
 * Question 2
 */
echo "<h2>2. lister l'ensemble des catégories, et pour chaque catégorie la liste de sandwichs associés ;
utiliser un chargement lié : </h2>";

 $categories = Categorie::with('sandwichs')->get();

 foreach($categories as $cat){;
      echo "<b><u> - Categorie</b>:</u> ".$cat->nom . "<br>";
     foreach($cat->sandwichs as $s){
         echo "<b>Nom :</b>  ".$s->nom . "<br>";
         echo "<b>Description :</b>  ".$s->description . "<br>";
         echo "<b>Type de pain : </b> ".$s->type_pain . "<br><br>";
     }
 }


/*
 * Question 3
 */

echo "<h2>3. lister les sandwichs dont le type_pain contient 'baguette' et pour chaque sandwich, afficher
ses catégories et la liste des images qui lui sont associées ; utiliser un chargement lié : </h2>";

 $sandwichs3 = Sandwich::with('categories','images')->where('type_pain','=','baguette')->get();

 foreach($sandwichs3 as $s){
      echo "<b>Nom : </b>".$s->nom . "<br>";
     echo "<b>Description :</b> : ".$s->description . "<br>";
     echo "<b>Type de pain : </b> : ".$s->type_pain . "<br>";
     foreach($s->images as $img){
          echo "<b> * Nom du l'image : </b> : <a href='#'> ".$img->filename . "</a><br>";
     }
     echo "<br>";
     foreach($s->categories as $cat){
          echo "<b><u> - Categorie</b>:</u> ".$cat->nom . "<br>";
     }
 }

/*
 * Question 4
 */

echo "<h2>4. Associer le sandwich créé au 1.5 aux catégories 1 et 3.</h2>";

 $Sandwich = Sandwich::select()->find(11);
 $Sandwich-> categories()->sync([1,3]);
 $Sandwich->save();
 echo "Done";
