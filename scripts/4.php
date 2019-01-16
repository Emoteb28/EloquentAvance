<?php
/**
 * Created by PhpStorm.
 * User: isaac
 * Date: 07/01/19
 * Time: 23:55
 */

require_once 'Header.php';

 use catawich\models\Sandwich;

/*
 * Question 1
 */
echo "<h2>1. afficher la liste des tailles proposées pour le sandwich d'ID 5 :   </h2>";

 $sandwich5 = Sandwich::with('tailles')->find(5);

 foreach ($sandwich5->tailles as $t) {
      echo "<b> Nom  : </b>". $t->nom. "<br>";
 }

/*
 * Question 2
 */

echo "<h2>2. Idem, mais en ajoutant le prix du sandwich pour chaque taille :   </h2>";
 $sandwich6 = Sandwich::with('tailles')->find(5);

 foreach ($sandwich6->tailles as $t) {
      echo "<b>Nom  : </b>". $t->nom . "<br>";
     echo "<b>Prix  : </b>".$t->pivot->prix . "<br>";
 }


/*
 * Question 3
 */

echo "<h2>3. associer le sandwich créé au 1.5 aux différentes tailles existantes en précisant le prix dans
chaque cas :</h2>";

 $mySandwich = Sandwich::select()->find(11);

 $mySandwich->tailles()->sync([
     1 => ['prix' => 10],
     2 => ['prix' => 20],
     3 => ['prix' => 30],
     4 => ['prix' => 40]
 ]);

 $mySandwich->save();
