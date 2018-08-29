<?php

namespace App\Http\Controllers;

use App\Providers\HttpRequestsProvider as ClientHttp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Properties;

class PropertiesController extends Controller
{
	/**
     * Create a new user instance.
     *
     * @param  array  $Properties_wasi
     * @return \App\Properties
     */
	static function create_Wasi(array $properties_wasi){
		$properties_wasi = json_encode($properties_wasi);
		return Properties::create([
                'id_property' => $properties_wasi, array('id_property'), 
                'id_company' => $properties_wasi, array('id_company'), 
                'id_user_wasi' => $properties_wasi, array('id_user'),
				'id_client' => $properties_wasi, array('id_client'),
				'for_sale' => $properties_wasi, array('for_sale'),
                'for_rent' => $properties_wasi, array('for_rent'),
                'for_transfer' => $properties_wasi, array('for_transfer'),
                'id_property_type' => $properties_wasi, array('id_property_type'),
                'id_country' => $properties_wasi, array('id_country'),
                'departament_id' => $properties_wasi, array('departament_id'),
                'municipality_id' => $properties_wasi, array('municipality_id'),
                'location_id' => $properties_wasi, array('location_id'),
                'neighborhood_id' => $properties_wasi, array('neighborhood_id'),
   				'id_currency' => $properties_wasi, array('id_currency'),
                'iso_currency' => $properties_wasi, array('iso_currency'),
                'title' => $properties_wasi, array('title'),
                'address' => $properties_wasi, array('address'),
                'area' => $properties_wasi, array('area'),
				'id_unit_area' => $properties_wasi, array('id_unit_area'),
				'unit_area_label' => $properties_wasi, array('unit_area_label'),
                'built_area' => $properties_wasi, array('built_area'),
   				'maintenance_fee' => $properties_wasi, array('maintenance_fee'),
                'sale_price' => $properties_wasi, array('sale_price'),
                'rent_price' => $properties_wasi, array('rent_price'),
                'bedrooms' => $properties_wasi, array('bedrooms'),
                'bathrooms' => $properties_wasi, array('bathrooms'),
                'garages' => $properties_wasi, array('garages'),
                'floor' => $properties_wasi, array('floor'),
                'social_stratum_id' => $properties_wasi, array('stratum'),
                'observations' => $properties_wasi, array('observations'),
                'video' => $properties_wasi, array('video'),
                'id_property_condition' => $properties_wasi, array('id_property_condition'),
                'id_status_on_page' => $properties_wasi, array('id_status_on_page'),
                'latitude' => $properties_wasi, array('latitude'),
                'longitude' => $properties_wasi, array('longitude'),
                'building_date' => $properties_wasi, array('building_date'),
                'visits' => $properties_wasi, array('visits'),
                'reference' => $properties_wasi, array('reference'),
                'comment' => $properties_wasi, array('comment'),
                'id_rents_type' => $properties_wasi, array('id_rents_type'),
                'zip_code' => $properties_wasi, array('zip_code'),
                'id_availability' => $properties_wasi, array('id_availability'),
                'availability_label' => $properties_wasi, array('availability_label'),
                'id_publish_on_map' => $properties_wasi, array('id_publish_on_map'),
                'publish_on_map_label' => $properties_wasi, array('publish_on_map_label'),
                'galleries' => $properties_wasi, array('id'),
                'features' => $properties_wasi, array('internal'),
                'features' => $properties_wasi, array('external'),
                'label' => $properties_wasi, array('label')
            ]);
	}
    public function getProperties(Request $request) {
		//dd($request);
		$regQty   = 6;
		$page     = $request->get('page', 1);
		$criteria = self::getSearchCriteriaProperties($request);
		$properties = self::getLatestProperties($regQty, $page, $criteria);
		$count      = $properties['total_prop'];
		$totalPages = self::getQtyOfPages($count, $regQty);
		return view('website.properties',
			array(
				'properties'      => $properties['properties'],
				'totalProperties' => $count,
				'totalPages'      => $totalPages,
				'currentPage'     => $page,
			)
		);
	}
	static function getQtyOfPages($count, $regQty = 5) {
		return $count % $regQty == 0 ? $count / $regQty : floor($count / $regQty) + 1;
	}
	public static function getLatestProperties($qty = 5, $page = 1, $criteria = null) {
		$client = new ClientHttp(''); //Credenciales de acceso a la plataforma Wasi
		$searchArray = array(
			'id_availability' => 1,
			'take'            => $qty,
			'scope'           => 1,
			'skip'            => ($page - 1) * $qty
		);
		if ($criteria != null) {
			$searchArray = array_merge($searchArray, $criteria);
		}
		$data       = $client->get('property/search', $searchArray);
		//dd($data);
		$properties = [];
		for ($i = 0; $i < sizeof($data)-2; $i++) {
			if (gettype($data[$i]) == 'array') {
                $data[$i]['latitude'] = (float)$data[$i]['latitude'];
                $data[$i]['longitude'] = (float)$data[$i]['longitude'];
				$data[$i]['unit_area_label']       = self::getUnitAreaLabel($data[$i]['id_unit_area']);
				$data[$i]['unit_built_area_label'] = self::getUnitAreaLabel($data[$i]['id_unit_built_area']);
				if(in_array($data[$i]['galleries'][0], [0])){
				$data[$i]['image'] = isset($data[$i]['galleries']) && sizeof($data[$i]['galleries']) >= 0  ? $data[$i]['galleries'][0][0]['url'] : '';}
				if(in_array($data[$i]['galleries'][0], [0])){
                $data[$i]['image_description'] = isset($data[$i]['galleries']) && sizeof($data[$i]['galleries']) > 0 ? $data[$i]['galleries'][0][0]['description'] : '';}
				$properties[$i] = $data[$i];
			}
		}
		return array('properties' => $properties, 'total_prop' => $data['total']);
	}
	public static function formatForMap($properties) {
		$formattedProperties = [];
		foreach ($properties as $key => $property) {
			$formattedProperties[$key] = array(
				'id'              => $property['id_property'],
				'title'           => $property['title'],
				'latitude'        => $property['latitude'],
				'longitude'       => $property['longitude'],
				'image'           => ($property['image'])? $property['image']:'',
				'description'     => $property['address'].'<br>'.$property['region_label'].', '.$property['city_label'].', '.$property['country_label'],
				'link'            => 'propiedades/propiedad/'.$property['id_property'],
				'map_marker_icon' => 'images/markers/coral-marker-residential.png',
			);
			
		}
		return $formattedProperties;
	}
	static function getUnitAreaLabel($label) {
		$unit = '';
		switch ($label) {
			case '1':
				$unit = 'm2';
				break;
			case '2':
				$unit = 'cuadras';
				break;
			case '3':
				$unit = 'hectáreas';
				break;
			case '4':
				$unit = 'varas';
				break;
		}
		return $unit;
	}
	public static function getPropertyTypesByPurpose($purpose) {
		$client = new ClientHttp('');
		$data   = $client->get('property-type/all', array(
				'quantity' => true,
				'scope'    => 1,
				$purpose   => true
			)
		);
		$ptypes = [];
		for ($i = 0; $i < sizeof($data)-1; $i++) {
			if (gettype($data[$i]) == 'array') {
				$ptypes[$i] = $data[$i];
			}
		}
		return $ptypes;
	}
	public static function getPropertiesPurpose() {
		$ppurpose = [
			'Venta',
			'Alquiler',
			'Transferencia'
		];
		return $ppurpose;
	}
	public static function getAllPropertyTypes() {
		$client = new ClientHttp('');
		$data   = $client->get('property-type/all', array(
				'quantity' => true,
				'scope'    => 1,
			)
		);
		//dd($data);
		$pptypes = [];
		for ($i = 0; $i < sizeof($data)-1; $i++) {
			if (gettype($data[$i]) == 'array') {
				$pptypes[$i] = $data[$i];
			}
		}
		return $pptypes;
	}
	public static function getPriceRange() {
		$client = new ClientHttp('');
		$data   = $client->get('property/price-range');
		return $data;
	}
	public static function getAreaRange() {
		$client = new ClientHttp('');
		$data   = $client->get('property/area-range');
		return $data;
	}
	public static function getSearchCriteriaProperties(Request $request) {
		$searchArray = array(
			'match'            => $request->input('location', ''),
			'id_property_type' => $request->input('search_prop_type', 0),
			'for_sale'         => $request->input('search_status') == 'Venta',
			'for_rent'         => $request->input('search_status') == 'Alquiler',
			'bathrooms'        => $request->input('search_bathrooms', 0),
			'min_bedrooms'     => $request->input('search_bedrooms', 0),
			'min_built_area'   => $request->input('search_minarea', 0),
			'min_area'         => $request->input('search_minarea', 0),
			'max_built_area'   => $request->input('search_maxarea', 0),
			'max_area'         => $request->input('search_maxarea', 0),
			'min_price'        => $request->input('search_minprice', 0),
			'max_price'        => $request->input('search_maxprice', 0),
			'id_city'          => $request->get('id_city', 0),
			'id_region'        => $request->get('id_region', 0)
		);
		return $searchArray;
	}
	public function searchProperties(Request $request) {
		return $this->getProperties($request);
	}
	public function getPropertyTypeLabel($idPropertyType) {
		$data  = self::getAllPropertyTypes();
		$index = array_search($idPropertyType, array_column($data, 'id_property_type'));
		return $data[$index]['nombre'];
	}
	public function getProperty($idProperty) {
		$client   = new ClientHttp('');
		$property = $client->get('property/get/'.$idProperty);
		$property['property_type_label']   = $this->getPropertyTypeLabel($property['id_property_type']);
		$property['unit_area_label']       = self::getUnitAreaLabel($property['id_unit_area']);
		$property['unit_built_area_label'] = self::getUnitAreaLabel($property['id_unit_built_area']);
        $property['latitude'] = (float)$property['latitude'];
        $property['longitude'] = (float)$property['longitude'];
        $property['image'] = isset($property['galleries']) && sizeof($property['galleries']) > 0 ? $property['galleries'][0][0]['url'] : '';
        $property['image_description'] = isset($property['galleries']) && sizeof($property['galleries']) > 0 ? $property['galleries'][0][0]['description'] : '';
        $user              = $client->get('user/get/'.$property['id_user']);
		$similarProperties = self::getLatestProperties(6, 1, array(
				'id_property_type' => $property['id_property_type'],
				'id_region'        => $property['id_region'],
			))['properties'];
		return view('properties.property-detail.property-detail-content',
			array(
				'property'          => $property,
				'realtor'           => $user,
				'similarProperties' => $similarProperties,
			)
		);
	}
}
