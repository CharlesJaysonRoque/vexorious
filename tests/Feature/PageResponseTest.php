<?php

test('root url redirects to home', function () {
    $response = $this->get('/');
    $response->assertRedirect(route('home'));
});

test('public pages return successful response and contain site titles', function (string $url, string $expectedTitle) {
    $response = $this->get($url);
    $response->assertStatus(200);
    $response->assertSee($expectedTitle, false);
})->with([
    ['/home', 'Vexorious SMP'],
    ['/about', 'About Us'],
    ['/member', 'Community Members'],
    ['/gallery', 'Build Gallery'],
    ['/rules', 'Server Rules'],
    ['/world-map', 'Interactive World Map'],
]);
