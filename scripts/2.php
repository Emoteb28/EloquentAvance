<?php
/**
 * Created by PhpStorm.
 * User: isaac
 * Date: 07/01/19
 * Time: 21:30
 */

require_once 'Header.php';

use catawich\models\Sandwich;
use catawich\models\Image;

/*
 * Question 1
 */
echo "<h2>1. afficher le sandwich n°4 et lister les images associées : </h2>";

 $sand1 = Sandwich::select() ->find(4);
 $image1 = $sand1->images()->get();

 echo "<b>Nom :</b> ".$sand1->nom."<br>";

 echo "<b>Description : </b>".$sand1->description ."<br>";
 echo "<b>Type de pain : </b>".$sand1->type_pain .'<br><br>';

 foreach ($image1 as  $image) {
      echo "<b>Titre : </b>".$image->titre ."<br>";
     echo "<b>Type : </b>".$image->type ."<br>";
     echo "<b>Nom du l'image : </b>".$image->filename ."<br><br>";
 }


/*
 * Question 2
 */
echo "<h2>2. lister l'ensemble des sandwichs, triés par type de pain, et pour chaque sandwich afficher la
liste des images associées.  : </h2>";

 $sandwichs1 = Sandwich::with('images')
     ->orderBy('type_pain','ASC')
     ->get();

 foreach($sandwichs1 as $s){
     echo "<b> Nom : </b>".$s->nom ."<br>";
     echo "<b>Description :</b> ".$s->description ."<br>";
     echo "<b>Type de pain :</b> ".$s->type_pain ."<br><br>";
     foreach($s->images as $image){
          echo "<b>Nom du l'image :</b><a href='#'> ".$image->filename ."</a><br>";
     }
 }


/*
 * Question 3
 */
echo "<h2>3. lister les images et indiquer pour chacune d'elle le sandwich associé en affichant son nom et
son type de pain. : </h2>";
echo "<br>";
 $images1 = Image::with('sandwich')->get();

 foreach($images1 as $image){
      echo "<b>Nom du l'image :</b><a href='#'> ".$image->filename ."</a><br>";
      echo "<b>Sandwich :</b>".$image->sandwich->nom ."<br><br>";
 }

/*
 * Question 4
 */
echo "<h2>4. créer 3 images associées au sandwich ajouté dans l'exercice 1. : </h2>";

$Sandwich = Sandwich::select()->find(6);

 $newImage1 = new Image();
 $newImage1->titre = 'Bingerville';
 $newImage1->filename = 'newImage1.jpg';
 $newImage1->Sandwich()->associate($Sandwich);
 $newImage1->save();

 $newimage2 = new Image();
 $newimage2->titre = 'Cocody';
 $newimage2->filename = 'newimage2.jpg';
 $newimage2->Sandwich()->associate($Sandwich);
 $newimage2->save();

 $newimage3 = new Image();
 $newimage3->titre = 'Abidjanaise';
 $newimage3->filename = 'newimage3.jpg';
 $newimage3->Sandwich()->associate($Sandwich);
 $newimage3->save();
echo "Done !";

/*
 * Question 5
 */
echo "<h2>5. changer le sandwich associé à la 3ème image créée et le remplacer par le sandwich d'Id 6 : </h2>";

 $Sandwich6 = Sandwich::select()->find(6);
 $image3 = Image::select()->find(44);
 $image3->Sandwich()->associate($Sandwich6);
 $image3->save();
echo "Done !";
