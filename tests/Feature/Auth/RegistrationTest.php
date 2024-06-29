<?php
test('registration screen can be rendered', function () {
    $response = $this->get('/register');

    $response->assertStatus(200);
});

test('new users can register', function () {
    $response = $this->post('/register', [
        'name' => 'Test User' . rand(1, 100),
        'email' => 'test@example.com',
        'role' => 'customer',
        'password' => 'password',
        'password_confirmation' => 'password',
    ]);
    // dd($response);
    $this->assertAuthenticated();
    $response->assertRedirect(route('dashboard', absolute: false));
});
