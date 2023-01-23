<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomePageTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_users_index()
    {
        $user = User::factory()->create([
            'id'=>10,
            'name'=>'stepan',
        ]);
        $response = $this
            ->actingAs($user)
            ->get('/api/users');
        $response->assertOk();
        $response->assertJsonPath('data.name',$user->name);
    }
}
