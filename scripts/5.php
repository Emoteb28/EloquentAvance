<?php
/**
 * Created by PhpStorm.
 * User: isaac
 * Date: 16/01/19
 * Time: 21:08
 */

require_once 'Header.php';

//-------5. Requêtes sur des associations -----------
use catawich\models\Sandwich;
use catawich\models\Image;
use catawich\models\Categorie;
use catawich\models\Taille;


/*
 * Question 1
 */
echo "<h2>1. pour la catégorie dont le nom contient 'traditionnel', lister les sandwichs dont le type_pain
contient 'baguette' :   </h2>";

 $sands1 = Sandwich::with('categories')
     ->whereHas('categories',function($c){
     $c->where('nom','=','traditionnel');
 })
     ->where('type_pain','=','baguette')->get();


 foreach ($sands1 as $s) {
      echo "<b>Nom  : </b> : ".$s->nom . "<br>";
     echo "<b>Type de pain : </b> ".$s->type_pain . "<br>";
     foreach($s->categories as $cat){
          echo "Categorie: ".$cat->nom . "<br>";
     }
 }

/*
 * Question 2
 */
echo "<h2>2. pour le sandwich d'ID 5, lister les images de type 'image/jpeg' et de def_X > 720 :  </h2>";

 $imgs1 = Image::with('sandwich')->whereHas('sandwich',function($s){
     $s->where('id','=',5);
 })
     ->where('def_x','>',720)->get();


 foreach ($imgs1 as $i) {
      echo "<b>Nom de l'image :</b> ".$i->filename . "<br>";
     echo "<b>Def_X : </b>".$i->def_x . "<br>";
      echo "<b>Identifiant Sandwich: </b>".$i->sandwich->id . "<br><br>";

 }

/*
 * Question 3
 */
echo "<h2>3. lister les sandwichs qui ont plus de 4 images associées :  </h2>";

 $sandwichs4 = Sandwich::with('images')->has('images','>',6)->get();


 foreach ($sandwichs4 as $s) {
      echo "<b>Nom  : </b>".$s->nom . "<br>";
     echo "<b>Type de pain : </b> ".$s->type_pain . "<br>";
     foreach($s->images as $i){
          echo "<b>Nom de l'image: :</b> ".$i->filename . "<br>";
     }
 }

/*
 * Question 4
 */
echo "<h2>4. lister les catégories qui ont plus de 6 images associées :  </h2>";

 $cats6 = Categorie::whereHas('sandwichs',function($s){
     $s->has('images','>',6);
 })
     ->get();


 foreach ($cats6 as $c) {
      echo "<b>Nom  : </b> ".$c->nom . "<br>";
 }

//-----------method2 :

 $cats6 = Categorie::Has('sandwichs.images','>',6)->get();


 foreach ($cats6 as $c) {
      echo "<b>Nom  : </b> ".$c->nom . "<br>";
 }


/*
 * Question 5
 */
echo "<h2>5. lister les catégories qui contiennent des sandwichs dont le type de pain est 'baguette' :  </h2>";

 $cats7 = Categorie::whereHas('sandwichs',function($s){
     $s->where('type_pain','=','baguette');
 })->get();


 foreach ($cats7 as $c) {
      echo "<b>Nom  : </b> ".$c->nom . "<br>";
     foreach($c->sandwichs as $s){
         echo "<b>Nom  : </b>  ".$s->nom . "<br>";
         echo "<b>Type de pain : </b> ".$s->type_pain . "<br><br>";
     }
 }

/*
 * Question 6
 */
echo "<h2>6. lister les sandwichs qui possèdent des images de types 'image/jpeg' de taille > 18000 :  </h2>";

 $sands6 = Sandwich::with('images')->whereHas('images',function($i){
     $i->where('type','=','image/jpeg')->where('taille','>',18000);
 })
     ->get();

 foreach ($sands6 as $s) {
      echo "<b>Nom  : </b> ".$s->nom . "<br>";
     foreach($s->images as $i){
          echo "<b>Nom de l'image: :</b> ".$i->filename . "<br>";
         echo"<b>Type image: </b>".$i->type . "<br>";
         echo "<b>Taille image:  </b>".$i->taille . "<br><br>";
     }
 }

/*
 * Question 7
 */
echo "<h2>7. lister les catégories qui possèdent des images de types 'image/jpeg' de taille > 18000 :  </h2>";

 $cats7 = Categorie::with('sandwichs')->whereHas('sandwichs',function($s){
     $s->whereHas('images',function($i){
         $i->where('type','=','image/jpeg')->where('taille','>',18000);
     });
 })->get();


 foreach ($cats7 as $c) {
      echo "<b>Nom  : </b>".$c->nom . "<br>";
     foreach($c->sandwichs as $s){
          echo "<b>Nom sandwich : </b> ".$s->nom . "<br>";
         echo "<b>Type de pain : </b> ".$s->type_pain . "<br><br>";
     }
 }



/*
 * Question 8
 */
echo "<h2>8. lister les sandwichs qui possèdent des images de types 'image/jpeg' de taille > 18000 et qui sont de catégorie 'traditionnel:  </h2>";

 $sands8 = Sandwich::with('images','categories')->whereHas('images',function($i){
     $i->where('type','=','image/jpeg')->where('taille','>',18000);
 })->whereHas('categories',function($c){
     $c->where('nom','=','traditionnel');
 })->get();

 foreach ($sands8 as $s) {
      echo "<b>Nom  : </b> ".$s->nom . "<br>";
     foreach($s->images as $i){
          echo "<b>Nom image: </b> ".$i->filename . "<br>";
         echo"<b>Type image: </b>".$i->type . "<br>";
         echo "<b>Taille image:  </b>".$i->taille . "<br><br>";
     }
     foreach($s->categories as $c){
          echo "<b>Nom  : </b>".$c->nom . "<br><br>";
     }
 }

/*
 * Question 9
 */
echo "<h2>9. Pour le sandwich d'ID 7, lister les tailles pour lequel il est disponible avec un prix < 7.0 :  </h2>";

 $sand9 = Sandwich::with(array('tailles' => function($t)
 {
     $t->wherePivot('prix', '<', 7);
 }))->find(7);

 foreach ($sand9->tailles as $t) {
     echo "<b>Nom  : </b>". $t->nom . "<br>";

 }
