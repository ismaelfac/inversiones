<?php

namespace App;
use App\FeaturesProperty;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    protected $fillable = ['it_represents', 'label'];
    public $timestamps = false;
    
    public function feature_property()
    {
        return $this->MaanytoMany(FeaturesProperty::class);
    }    
}
