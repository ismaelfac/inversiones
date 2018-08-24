<?php
use App\Http\Controllers\PropertiesController;
use App\Properties;
use App\PropertiesType;
use Illuminate\Database\Seeder;

class PropertiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$propertiesWasi=[];
        $propertiesWasi = PropertiesController::getLatestProperties(30)['properties'];
        $propertiesWasi = json_encode($propertiesWasi);
        dd($propertiesWasi);

         Properties::create([
                'id_property' => $properties_wasi['id_property'], 
                'id_company' => $properties_wasi['id_company'], 
                'id_user' => $properties_wasi['id_user'],
                'for_sale' => $properties_wasi['for_sale'],
                'for_rent' => $properties_wasi['for_rent'],
                'for_transfer' => $properties_wasi['for_transfer'],
                'id_property_type' => $properties_wasi['id_property_type'],
                'id_country' => $properties_wasi['id_country'],
                'country_label' => $properties_wasi['country_label'],
                'id_region' => $properties_wasi['id_region'],
                'region_label' => $properties_wasi['region_label'],
                'id_city' => $properties_wasi['id_city'],
                'city_label' => $properties_wasi['city_label'],
                'id_zone' => $properties_wasi['id_zone'],
                'zone' => $properties_wasi['zone'],
                'zone_label' => $properties_wasi['zone_label'],
                'id_currency' => $properties_wasi['id_currency'],
                'iso_currency' => $properties_wasi['iso_currency'],
                'title' => $properties_wasi['title'],
                'address' => $properties_wasi['address'],
                'area' => $properties_wasi['area'],
                'id_unit_area' => $properties_wasi['id_unit_area'],
                'built_area' => $properties_wasi['built_area'],
                'id_unit_built_area' => $properties_wasi['id_unit_built_area'],
                'unit_built_area_label' => $properties_wasi['unit_built_area_label'],
                'maintenance_fee' => $properties_wasi['maintenance_fee'],
                'sale_price' => $properties_wasi['sale_price'],
                'rent_price' => $properties_wasi['rent_price'],
                'bedrooms' => $properties_wasi['bedrooms'],
                'bathrooms' => $properties_wasi['bathrooms'],
                'garages' => $properties_wasi['garages'],
                'floor' => $properties_wasi['floor'],
                'stratum' => $properties_wasi['stratum'],
                'observations' => $properties_wasi['observations'],
                'video' => $properties_wasi['video'],
                'id_property_condition' => $properties_wasi['id_property_condition'],
                'property_condition_label' => $properties_wasi['property_condition_label'],
                'id_status_on_page' => $properties_wasi['id_status_on_page'],
                'status_on_page_label' => $properties_wasi['status_on_page_label'],
                'map' => $properties_wasi['map'],
                'latitude' => $properties_wasi['latitude'],
                'longitude' => $properties_wasi['longitude'],
                'building_date' => $properties_wasi['building_date'],
                'network_share' => $properties_wasi['network_share'],
                'visits' => $properties_wasi['visits'],
                'reference' => $properties_wasi['reference'],
                'comment' => $properties_wasi['comment'],
                'id_rents_type' => $properties_wasi['id_rents_type'],
                'rents_type_label' => $properties_wasi['rents_type_label'],
                'zip_code' => $properties_wasi['zip_code'],
                'id_availability' => $properties_wasi['id_availability'],
                'availability_label' => $properties_wasi['availability_label'],
                'id_publish_on_map' => $properties_wasi['id_publish_on_map'],
                'publish_on_map_label' => $properties_wasi['publish_on_map_label'],
                'galleries' => $properties_wasi['id'],
                'features' => $properties_wasi['internal'],
                'features' => $properties_wasi['external'],
                'label' => $properties_wasi['label'],
                'owner' => $properties_wasi['owner']
            ]);
    }
}
