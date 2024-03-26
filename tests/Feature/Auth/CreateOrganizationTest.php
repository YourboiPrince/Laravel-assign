<?php

namespace Tests\Feature;

use App\Models\Organization;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Foundation\Testing\RefreshDatabase;


class CreateOrgaizationTest extends TestCase
{
    use RefreshDatabase;
    use HandlesAuthorization;
   
    //Fetch the user with super admin role and create an organization
    public function test_can_create_organization(): void {
        $user = User::factory()->create();
        $this->actingAs($user);
        $response = $this->get('/admin/organizations/create');
        $response->assertStatus(200);
    }
    
    public function test_can_update_organization(): void {
        $user = User::factory()->create();
        //create an organization factory
        Organization::factory()->create(['name'=> 'Organization 1']);
        $this->actingAs($user);
        $response = $this->get('/admin/organizations/1/edit');
        $response->assertStatus(200);
    }
    
}