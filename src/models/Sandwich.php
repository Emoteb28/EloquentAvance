<?php
namespace catawich\models;

use Illuminate\Database\Eloquent\SoftDeletes;

class Sandwich extends \Illuminate\Database\Eloquent\Model {
     use SoftDeletes;
       protected $table      = 'sandwich';
       protected $primaryKey = 'id';     
       public    $timestamps = false;  
       protected $dates = ['deleted_at'];

       public function categories()
       {
            return $this->belongsToMany('catawich\models\Categorie', 'sand2cat', 'sand_id', 'cat_id');
       }

       public function images()
       {
            return $this->hasMany('catawich\models\Image', 's_id');
       }

       public function tailles()
       {
            return $this->belongsToMany('catawich\models\Taille', 'tarif', 'sand_id', 'taille_id')
                                        ->withPivot('prix');
       }
}
