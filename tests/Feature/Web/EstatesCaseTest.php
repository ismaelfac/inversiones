<?php

namespace Tests\Feature\Web;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Controllers\PropertiesController;

class EstatesCaseTest extends TestCase
{
    use RefreshDatabase; 
    
    /**
     * A basic test example.
     *
     * @test
     */
    function get_estates_base_wasi_actingAs_public()
    {
        $this->get('Inmobiliaria')
             ->assertStatus(200)
             ->assertSee(
                '<div class="col-md-4 col-sm-6 col-xs-12">    
                </div>'
                );
    }
    /**
     * A basic test example.
     *
     * @test
     */
    function get_estates_base_wasi_actingAs_public_()
    {
        $this->get('Inmobiliaria')
             ->assertStatus(200)
             ->assertSee(
                '<div class="col-md-4 col-sm-6 col-xs-12">    
                </div>'
                );
    }


}
