<?php

test('the application returns a successful response', function () {
    $response = $this->get('/');
    $response->assertRedirect('/home');

    $responseHome = $this->get('/home');
    $responseHome->assertStatus(200);
});
