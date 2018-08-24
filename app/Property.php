<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    //
    protected $fillable = [
        'id_property', 'id_company', 'id_client','for_sale',
        'for_rent','for_transfer','id_property_type','country_id',
        'departament_id','municipality_id','location_id','neighborhood_id',
        'id_currency','iso_currency','title','address','area','id_unit_area',
        'unit_area_label','built_area','id_unit_built_area','unit_built_area_label',
        'maintenance_fee','sale_price','rent_price','bedrooms','bathrooms',
        'garages','floor','stratum','observations','video','id_property_condition',
        'property_condition_label','id_status_on_page','status_on_page_label',
        'latitude','longitude','building_date','network_share',
        'visits','reference','comment','id_rents_type','rents_type_label',
        'zip_code','id_availability','availability_label','id_publish_on_map',
        'publish_on_map_label','gallery_id','features','portals','label','user_id'

    ];
    protected $casts = [
        'for_sale' => 'boolean',
        'for_rent' => 'boolean',
        'for_transfer' => 'boolean',
        'network_share' => 'boolean'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
