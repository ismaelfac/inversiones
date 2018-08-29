<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PropertyAvailability extends Model
{
    protected $fillable = ['it_represents', 'label'];
    public $timestamps = false;
    
    public function property()
    {
        return $this->hasMany(Property::class);
    }
}
