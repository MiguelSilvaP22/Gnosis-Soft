<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UsuarioModuleTest extends TestCase
{
    /* @return void */

    //Prueba: Al listar los usuarios traiga al usuario con run: 10954339-k
    function test_carga_de_usuarios()
    {
        $this->get('/usuario')
            ->assertStatus(200)
            ->assertSee('10954339-k');
    }
    //Prueba: Al crear usuarios se vea el campo RUN
    function test_form_de_usuario()
    {
        $this->get('/crearUsuario')
            ->assertStatus(200)
            ->assertSee('RUN');
    }
    //Prueba: Al editar al usuario de id 5, muestre el nombre Cecilia
    function test_update_de_usuario()
    {
        $this->get('/editarUsuario/5')
            ->assertStatus(200)
            ->assertSee('Cecilia');
    }

}
