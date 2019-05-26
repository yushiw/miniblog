<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ArticleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testIndex()
    {
        $response = $this->json('GET', '/articles');
        $response->assertStatus(200);
    }

    public function testStore()
    {
        $response = $this->json('POST', '/articles/store', [
            'title' => 'title',
            'text' => 'text',
        ]);
        $response->assertStatus(200);
    }

    public function testRead()
    {
        $response = $this->json('GET', '/articles/-1');
        $response->assertStatus(404);

        $response = $this->json('GET', '/articles/1');
        $response->assertStatus(200);
    }

    public function testUpdate()
    {
        $response = $this->json('POST', '/articles/-1/update', []);
        $response->assertStatus(404);

        $response = $this->json('POST', '/articles/1/update', [
            'title' => 'title',
            'text' => 'text',
        ]);
        $response->assertStatus(200);
    }

    public function testDelete()
    {
        $response = $this->json('POST', '/articles/1/delete');
        $response->assertStatus(200);
    }

}
