<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use app\Property;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->increments('id');
            $table->string('id_property')->unique();//Identificador unico de la propiedad. | no modificable
            $table->string('id_company')->nullable();// Identificador unico de la empresa propietaria, puede ser de empresa propia o empresa aliada. | no modificable
            $table->string('id_user_wasi')->nullable();
            $table->integer('id_client')->unsigned();//Identificador unico del cliente asociado a la propiedad.
            $table->foreign('id_client')->references('id')->on('clients')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->boolean('for_sale')->default(false);//Valor booleano (true o false) que indica si el inmueble esta diponible para la venta o no.
            $table->boolean('for_rent')->default(false);//Valor booleano (true o false) que indica si el inmueble esta diponible para la renta (alquilar, arrendar) o no.
            $table->boolean('for_transfer')->default(false);//Valor booleano (true o false) que indica si el inmueble esta disponible para permutar (transferencia).
            $table->unsignedInteger('id_property_type')->unsigned();//Identificador que indica el tipo de propiedad.
            $table->foreign('id_property_type')->references('id')->on('type_properties')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->integer('country_id')->unsigned();//Identificador del país de la propiedad.
            $table->foreign('country_id')->references('id')->on('countries')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->integer('departament_id')->unsigned();//Identificador de la región de la propiedad.
            $table->foreign('departament_id')->references('id')->on('departaments')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->integer('municipality_id')->unsigned();//Identificador de la ciudad de la propiedad.
            $table->foreign('municipality_id')->references('id')->on('municipalities')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->integer('location_id')->unsigned();//Nombre de la zona de la propiedad. Si no se envía un id_zone, una zona nueva es creada con este campo.
            $table->foreign('location_id')->references('id')->on('locations')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->integer('neighborhood_id')->unsigned();//Identificador del Barrio.
            $table->foreign('neighborhood_id')->references('id')->on('neighborhoods')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->string('id_currency')->nullable();//Identificador de la moneda de la propiedad.
            $table->string('iso_currency')->nullable();//Código iso de 3 letras en mayúscula que representa la moneda.
            $table->string('title')->nullable();//Título de la propiedad.
            $table->string('address')->nullable();//Dirección de la propiedad.
            $table->string('area')->nullable();//Indica el area total/superficie/terreno de la propiedad, ver la sección Areas.
            $table->string('unit_area_label')->nullable();//Nombre de la unidad de medida del area de la propiedad, ver la sección Areas.
            $table->string('built_area')->nullable();//Indica el area construida o superficie útil de la propiedad, ver la sección Areas.
            $table->string('maintenance_fee')->nullable();//Valor de la cuota de mantenimiento o administración de la propiedad.
            $table->string('sale_price')->nullable();//Precio de venta de la propiedad.
            $table->string('rent_price')->nullable();//Costo de arriendo/renta/alquiler de la propiedad.
            $table->string('bedrooms')->nullable();//Número de habitaciones de la propiedad.
            $table->string('bathrooms')->nullable();//Número de baños de la propiedad.
            $table->string('garages')->nullable();//Número de garajes de la propiedad.
            $table->string('floor')->nullable();//Número de piso en el que se encuentra la propiedad o cantidad de niveles que tiene, puede ser un valor vacío o numero de 1 a 30.
            $table->integer('social_stratum_id')->unsigned();//Estrato social, usado en Colombia, ver la sección Estratos sociales.
            $table->foreign('social_stratum_id')->references('id')->on('neighborhoods')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->mediumText('observations')->nullable();//Observaciones del inmueble.
            $table->string('video')->nullable();//URL de Youtube o Vimeo con un video del inmueble.
            $table->string('id_property_condition')->unsigned();//Identificador que indica la condición de la propiedad, ver la sección Condiciones de la propiedad.
            $table->foreign('id_property_condition')->references('id')->on('property_conditions')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');//Array con las galerías de imágenes asociadas a la propiedad.
            $table->string('id_status_on_page')->nullable();//Identificador que indica el estado de la propiedad en la página web, ver la sección Estados en la página web de la propiedad.
            $table->string('latitude')->nullable();//Latitud de Google maps de la propiedad, ver la sección Publicación en Google maps de la propiedad.
            $table->string('longitude')->nullable();//Logitud de Google maps de la propiedad, ver la sección Publicación en Google maps de la propiedad.
            $table->string('building_date')->nullable();//Año de construccion de la propiedad.
            $table->string('visits')->nullable();//Número de visitas con las que cuenta un inmueble, ver la sección Visitas de la propiedad.
            $table->string('reference')->nullable();//Referencia interna de la propiedad.
            $table->string('comment')->nullable();//Comentarios internos de la propiedad.
            $table->string('id_rents_type')->nullable();//Identificador que indica el tipo de renta de la propiedad, ver la sección Tipos de renta de la propiedad.
            $table->integer('id_rents_type')->unsigned()->default(0);//Identificador del Barrio.
            $table->foreign('id_rents_type')->references('id')->on('rent_types')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');//Array con las galerías de imágenes asociadas a la propiedad.
            $table->string('zip_code')->nullable();//Código postal de la propiedad.
            $table->string('id_availability')->nullable();//Identificador que indica la disponibilidad de la propiedad, ver la sección Disponibilidad de la propiedad.
            $table->foreign('id_availability')->references('id')->on('property_availabilities')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');//Array con las galerías de imágenes asociadas a la propiedad.
            $table->string('id_publish_on_map')->nullable();//Identificador que indica el tipo de publicación en Google maps, ver la sección Publicación en Google maps de la propiedad.
            $table->foreign('id_publish_on_map')->references('id')->on('publication_google_maps')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');//Array con las galerías de imágenes asociadas a la propiedad.
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');   
            $table->integer('state_page_id')->unsigned()->default(0);//Identificador del Barrio.
            $table->foreign('state_page_id')->references('id')->on('state_pages')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');//Array con las galerías de imágenes asociadas a la propiedad.        
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('properties');
    }
}
