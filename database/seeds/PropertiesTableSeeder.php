<?php
use App\Http\Controllers\PropertiesController;
use App\Properties;
use App\PropertiesType;
use Illuminate\Database\Seeder;

class PropertiesTableSeeder extends Seeder
{
    public function run()
    {
        $propertiesTercero = PropertiesController::getLatestProperties(30)['properties'];
        $propertiesTercero = json_encode($propertiesTercero);
        dd($propertiesTercero);
        foreach ($propertiesTercero as $property_Tercero) {
            $property = Property::select('id_property')->where('id_property',$property_Tercero['id_property'])->get();
            if (is_null($property)) {
                ($property_Tercero[''] 
                Properties::create([
                    'id_property' => $property_Tercero['id_property'], 
                    'id_company' => $property_Tercero['id_company'], 
                    'id_user' => $property_Tercero['id_user'],
                    'for_sale' => $property_Tercero['for_sale'],
                    'for_rent' => $property_Tercero['for_rent'],
                    'for_transfer' => $property_Tercero['for_transfer'],
                    'id_property_type' => $property_Tercero['id_property_type'],
                    'id_country' => 45,
                    'id_region' => $property_Tercero['id_region'],
                    'id_city' => $property_Tercero['id_city'],
                    'id_zone' => $property_Tercero['id_zone'],
                    'id_location' => $property_Tercero['id_location'],
                    'id_currency' => $property_Tercero['id_currency'],
                    'iso_currency' => $property_Tercero['iso_currency'],
                    'title' => $property_Tercero['title'],
                    'address' => $property_Tercero['address'],
                    'area' => $property_Tercero['area'],
                    'id_unit_area' => $property_Tercero['id_unit_area'],
                    'built_area' => $property_Tercero['built_area'],
                    'id_unit_built_area' => $property_Tercero['id_unit_built_area'],
                    'unit_built_area_label' => $property_Tercero['unit_built_area_label'],
                    'maintenance_fee' => $property_Tercero['maintenance_fee'],
                    'sale_price' => $property_Tercero['sale_price'],
                    'rent_price' => $property_Tercero['rent_price'],
                    'bedrooms' => $property_Tercero['bedrooms'],
                    'bathrooms' => $property_Tercero['bathrooms'],
                    'garages' => $property_Tercero['garages'],
                    'floor' => $property_Tercero['floor'],
                    'stratum' => $property_Tercero['stratum'],
                    'observations' => $property_Tercero['observations'],
                    'video' => $property_Tercero['video'],
                    'id_property_condition' => $property_Tercero['id_property_condition'],
                    'property_condition_label' => $property_Tercero['property_condition_label'],
                    'id_status_on_page' => $property_Tercero['id_status_on_page'],
                    'status_on_page_label' => $property_Tercero['status_on_page_label'],
                    'map' => $property_Tercero['map'],
                    'latitude' => $property_Tercero['latitude'],
                    'longitude' => $property_Tercero['longitude'],
                    'building_date' => $property_Tercero['building_date'],
                    'network_share' => $property_Tercero['network_share'],
                    'visits' => $property_Tercero['visits'],
                    'reference' => $property_Tercero['reference'],
                    'comment' => $property_Tercero['comment'],
                    'id_rents_type' => $property_Tercero['id_rents_type'],
                    'rents_type_label' => $property_Tercero['rents_type_label'],
                    'zip_code' => $property_Tercero['zip_code'],
                    'id_availability' => $property_Tercero['id_availability'],
                    'availability_label' => $property_Tercero['availability_label'],
                    'id_publish_on_map' => $property_Tercero['id_publish_on_map'],
                    'publish_on_map_label' => $property_Tercero['publish_on_map_label'],
                    'galleries' => $property_Tercero['id'],
                    'features' => $property_Tercero['internal'],
                    'features' => $property_Tercero['external'],
                    'label' => $property_Tercero['label'],
                    'owner' => $property_Tercero['owner']
                ]);
            }
        }
    }
}
