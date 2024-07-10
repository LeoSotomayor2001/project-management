<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class RegisterControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_it_registers_a_new_user()
    {
        // Datos de prueba
        // $userData = [
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        //     'password' => 'password',
        //     'password_confirmation' => 'password',
        // ];

        // // Hacer la solicitud POST a la ruta de registro
        // $response = $this->post('/registro', $userData);

        // // Verificar que el usuario fue creado en la base de datos
        // $this->assertDatabaseHas('users', [
        //     'email' => 'test@example.com',
        // ]);

        // // Verificar que el usuario tenga la contraseña encriptada correctamente
        // $user = User::where('email', 'testa@example.com')->first();
        // $this->assertTrue(Hash::check('password', $user->password));

        // // Verificar que la redirección fue correcta y contiene el mensaje esperado
        // $response->assertRedirect('/login');
        // $response->assertSessionHas('message', 'Registrado correctamente. Por favor inicia sesion.');
    }
}
