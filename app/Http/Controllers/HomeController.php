<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Providers\HttpRequestsProvider as ClientHttp;

class HomeController extends Controller
{
	protected $user = array();
	protected $properties = array();
	protected $firstFiveProperties = array();
	private $count = 0;

    public function __construct()
    {
		$user = Auth()->User();
	}
	
	function getProperties(){
		//$properties = PropertiesController::getProperties();
		$properties = PropertiesController::getLatestProperties(30)['properties'];
		return $properties;
	}

	function Index(){
		$properties = $this->getProperties();
		dd(json_encode($properties));
		return view('website.content',array(
				'user'                => $this->user,
				'all_properties'      => $properties,
				'firstFiveProperties' => array_slice($properties, 1, 5),
				'nextSixProperties'   => array_slice($properties, 5, 6),
				'clients'             => $this->getClients(),
				'contactInfo'         => $this->getContactInfo(),
				//'mapProperties'       => $mapProperties,
				'propertyTypes'       => PropertiesController::getAllPropertyTypes(),
				'propertyPurposes'    => PropertiesController::getPropertiesPurpose(),
				'priceRanges'         => PropertiesController::getPriceRange()
			));
	}

	function getClients() {
		$client = new ClientHttp('');
		$data   = $client->get('user/all-users');

		for ($i = 1; $i < sizeof($data)-1; $i++) {
			if ($data[$i]['user_type'] != 'REALTOR') {
				unset($data[$i]);
			}
		}

		return array_slice($data, 0, 4);
	}

	function getContactInfo() {
		$client = new ClientHttp('');
		$data   = $client->get('user/all-users');

		for ($i = 1; $i < sizeof($data)-1; $i++) {
			if ($data[$i]['user_type'] != 'REALTOR' && $data[$i]['has_profile']) {
				unset($data[$i]);
			}
		}

		return $data[0];
	}
    function about()
    {
		$properties = $this->getProperties();
        return view('website.about_us',array(
				'user'                => $this->user,
				'all_properties'      => $properties,
				'firstFiveProperties' => array_slice($properties, 1, 5),
				'nextSixProperties'   => array_slice($properties, 5, 6),
				'clients'             => $this->getClients(),
				'contactInfo'         => $this->getContactInfo(),
				//'mapProperties'       => $mapProperties,
				'propertyTypes'       => PropertiesController::getAllPropertyTypes(),
				'propertyPurposes'    => PropertiesController::getPropertiesPurpose(),
				'priceRanges'         => PropertiesController::getPriceRange()
			));
    }
    function brand()
    {
		$properties = $this->getProperties();
        return view('website.brand',array(
				'user'                => $this->user,
				'all_properties'      => $properties,
				'firstFiveProperties' => array_slice($properties, 1, 5),
				'nextSixProperties'   => array_slice($properties, 5, 6),
				'clients'             => $this->getClients(),
				'contactInfo'         => $this->getContactInfo(),
				//'mapProperties'       => $mapProperties,
				'propertyTypes'       => PropertiesController::getAllPropertyTypes(),
				'propertyPurposes'    => PropertiesController::getPropertiesPurpose(),
				'priceRanges'         => PropertiesController::getPriceRange()
			));
    }
    function properties()
    {
		$count = 6;
		$this->count = $count;
		$properties = $this->getProperties();
		$total_properties = count($properties);
		$paginas = $total_properties / $this->count;
		//dd($paginas);
        return view('website.properties',array(
				'user'                => $this->user,
				'properties'          => $properties,
				'totalPages      '    => $total_properties,
				'paginas'             => $paginas,
				'firstFiveProperties' => array_slice($properties, 1, $this->count),
				'nextSixProperties'   => array_slice($properties, $this->count, $this->count+5 ),
				'clients'             => $this->getClients(),
				'contactInfo'         => $this->getContactInfo(),
				//'mapProperties'       => $mapProperties,
				'propertyTypes'       => PropertiesController::getAllPropertyTypes(),
				'propertyPurposes'    => PropertiesController::getPropertiesPurpose(),
				'priceRanges'         => PropertiesController::getPriceRange()
			));
    }
    function propertiesDetails(){
		$properties = $this->getProperties();
        return view('website.properties_details',array(
				'user'                => $this->user,
				'all_properties'      => $properties,
				'firstFiveProperties' => array_slice($properties, 1, 5),
				'nextSixProperties'   => array_slice($properties, 5, 6),
				'clients'             => $this->getClients(),
				'contactInfo'         => $this->getContactInfo(),
				//'mapProperties'       => $mapProperties,
				'propertyTypes'       => PropertiesController::getAllPropertyTypes(),
				'propertyPurposes'    => PropertiesController::getPropertiesPurpose(),
				'priceRanges'         => PropertiesController::getPriceRange()
			));
    }
    function propertyIncome(){
		$properties = $this->getProperties();
        return view('website.property_income',array(
				'user'                => $this->user,
				'all_properties'      => $properties,
				'firstFiveProperties' => array_slice($properties, 1, 5),
				'nextSixProperties'   => array_slice($properties, 5, 6),
				'clients'             => $this->getClients(),
				'contactInfo'         => $this->getContactInfo(),
				//'mapProperties'       => $mapProperties,
				'propertyTypes'       => PropertiesController::getAllPropertyTypes(),
				'propertyPurposes'    => PropertiesController::getPropertiesPurpose(),
				'priceRanges'         => PropertiesController::getPriceRange()
			));
    }
    function blog()
    {
		$properties = $this->getProperties();
        return view('website.blog',array(
				'user'                => $this->user,
				'all_properties'      => $properties,
				'firstFiveProperties' => array_slice($properties, 1, 5),
				'nextSixProperties'   => array_slice($properties, 5, 6),
				'clients'             => $this->getClients(),
				'contactInfo'         => $this->getContactInfo(),
				//'mapProperties'       => $mapProperties,
				'propertyTypes'       => PropertiesController::getAllPropertyTypes(),
				'propertyPurposes'    => PropertiesController::getPropertiesPurpose(),
				'priceRanges'         => PropertiesController::getPriceRange()
			));
    }
    function contact()
    {
		$properties = $this->getProperties();
        return view('website.contact',array(
				'user'                => $this->user,
				'all_properties'      => $properties,
				'firstFiveProperties' => array_slice($properties, 1, 5),
				'nextSixProperties'   => array_slice($properties, 5, 6),
				'clients'             => $this->getClients(),
				'contactInfo'         => $this->getContactInfo(),
				//'mapProperties'       => $mapProperties,
				'propertyTypes'       => PropertiesController::getAllPropertyTypes(),
				'propertyPurposes'    => PropertiesController::getPropertiesPurpose(),
				'priceRanges'         => PropertiesController::getPriceRange()
			));
    }
}
