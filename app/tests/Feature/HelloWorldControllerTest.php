<?php

namespace Tests\Feature;

use Tests\TestCase;

class HelloWorldControllerTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function testHelloWorldIsOK(): void
    {
        $response = $this->get('/api/hello-world');

        $response->assertStatus(200);
    }
}
