<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HomeTest extends TestCase
{
    use RefreshDatabase; 
    /**
     * A basic test example.
     *
     * @test
     */
    public function getHome()
    {
        $this->get('/')
             ->assertStatus(200)
             ->assertSee(
                '<h4 class="slider-1-title-1">Bienvenido <span>Inversiones & Proyectos</span></h4>'
                );
    }

    /**
     * A basic test example.
     *
     * @test
     */
    public function getHomeisUser()
    {
        $user = factory(User::class)->create(['is_admin' => true]);
        $this->actingAs($user)
             ->get('/')
             ->assertStatus(200)
             ->assertSee(
                '<li><a href="http://127.0.0.1:8000/panel">
                    Panel Administrador <span class="caret"></span>
                    </a></li>'
                );
    }
}
