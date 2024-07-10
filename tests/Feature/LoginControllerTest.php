<?php
use Tests\TestCase;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginControllerTest extends TestCase
{
    public function test_store_with_valid_data()
    {
        $request = new Request([
            'email' => 'test@example.com',
            'password' => 'password'
        ]);

        $controller = new LoginController();
        $response = $controller->store($request);

        $this->assertRedirect($response, 'home');
    }

    public function test_store_with_invalid_credentials()
    {
        $request = new Request([
            'email' => 'invalid@example.com',
            'password' => 'invalidpassword'
        ]);

        $controller = new LoginController();
        $response = $controller->store($request);

        $this->assertRedirect($response, 'login');
        $this->assertSessionHasErrors('error');
    }

    public function test_store_validation_failure()
    {
        $request = new Request([
            'email' => 'invalidemail',
            'password' => '' // Empty password
        ]);

        $controller = new LoginController();
        $response = $controller->store($request);

        $this->assertSessionHasErrors(['email', 'password']);
    }

    private function assertRedirect($response, $route)
    {
        $this->assertTrue($response->isRedirection());
        $this->assertEquals(route($route), $response->getTargetUrl());
    }

    private function assertSessionHasErrors($key)
    {
        $this->assertSessionHasErrors($key);
    }
}