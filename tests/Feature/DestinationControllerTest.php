<?php

namespace Tests\Feature;

use App\Models\Destination;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

// Estas pruebas verifican el acceso a los endpoints protegidos por un usuario autenticado en el controlador de destinos.
class DestinationControllerTest extends TestCase
{
    use RefreshDatabase;


    
    public function authenticated_user_can_access_protected_endpoints()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->getJson('/api/destinations');

        $response->assertStatus(200);
    }

    
    // public function user_can_create_destination_with_valid_data()
    // {
    //     $user = User::factory()->create();
    //     $this->actingAs($user);

    //     $response = $this->postJson('/api/destinations', [
    //         'title' => 'Test Destination',
    //         'location' => 'Test Location',
    //         'image' => 'test_image.jpg',
    //         'description' => 'Test Description',
    //     ]);

    //     $response->assertStatus(200)
    //         ->assertJsonStructure([
    //             'data' => [
    //                 'id',
    //                 'title',
    //                 'location',
    //                 'image',
    //                 'description',
    //                 'user_id',
    //             ],
    //         ]);
    // }
}