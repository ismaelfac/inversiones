<?php

namespace App;
use App\{User, Post, RentType, FeaturesProperty };
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $fillable = [
        'id_property', 'id_company', 'id_user_wasi','id_client','for_sale',
        'for_rent','for_transfer','id_property_type','country_id',
        'departament_id','municipality_id','location_id','neighborhood_id',
        'id_currency','iso_currency','title','address','area',
        'unit_area_label','built_area','id_unit_built_area','unit_built_area_label',
        'maintenance_fee','sale_price','rent_price','bedrooms','bathrooms',
        'garages','floor','stratum','social_stratum_id','observations','video','id_property_condition',
        'property_condition_label','id_status_on_page',
        'latitude','longitude','building_date',
        'visits','reference','comment','id_rents_type',
        'zip_code','id_availability','id_publish_on_map',
        ,'user_id','state_page_id'

    ];
    protected $casts = [
        'for_sale' => 'boolean',
        'for_rent' => 'boolean',
        'for_transfer' => 'boolean'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    public function feature_property()
    {
        return $this->MaanytoMany(FeaturesProperty::class);
    }
    public function RentType()
    {
        return $this->belongsTo(RentType::class);
    }
}
