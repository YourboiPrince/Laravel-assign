<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Contact;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ContactTest extends TestCase
{
 use RefreshDatabase;
   
    //Fetch the user with super admin role and create an organization
    public function test_can_create_contact(): void {
        $user = User::factory()->create();
        $this->actingAs($user);
        $response = $this->get('/admin/contacts/create');
        $response->assertStatus(200);
    }
    public function test_can_update_contact(): void {
        $user = User::factory()->create();
        //create an contact factory
        Contact::factory()->create();
        $this->actingAs($user);
        $response = $this->get('/admin/contacts/1/edit');
        $response->assertStatus(200);
    }
    
  
}