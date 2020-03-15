<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ManageEquipmentsTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function a_user_can_create_an_equipment()
    {
        $this->signIn();

        $this->get('/equipments/create')->assertOk();

        $attributes = [
            'name' => $this->faker->word,
            'reference' => $this->faker->uuid
        ];

        $this->post('/equipments', $attributes)->assertRedirect('/equipments');

        $this->assertDatabaseHas('equipments', $attributes);

        $this->get('/equipments')
            ->assertSee($attributes['name'])
            ->assertSee($attributes['reference']);
    }

    /** @test */
    public function a_user_can_update_an_equipment()
    {
        $equipment = factory('App\Equipment')->create();

        $this->signIn();

        $this->get($equipment->path().'/edit')->assertOk();

        $this->patch($equipment->path(), $attributes = [
            'name' => 'Changed',
            'reference' => 'Changed'
            ]
            )->assertRedirect($equipment->path());
        
        $this->assertDatabaseHas('equipments', $attributes);
    }

    /** @test */
    public function an_equipment_requires_a_name_and_reference()
    {
        $this->signIn();

        $attributes = factory('App\Equipment')->raw([
            'name' => '',
            'reference' => ''
        ]);

        $this->post('/equipments', $attributes)->assertSessionHasErrors(['name', 'reference']);
    }

    /** @test */
    public function guests_cannot_manage_equipments()
    {
        $equipment = factory('App\Equipment')->create();

        $this->get('/equipments')->assertRedirect('login');
        $this->get('/equipments/create')->assertRedirect('login');
        $this->get($equipment->path().'edit')->assertRedirect('login');
        $this->get($equipment->path())->assertRedirect('login');
        $this->post('/equipments', $equipment->toArray())->assertRedirect('login');
    }


    /** @test */
    public function a_user_can_view_an_equipment()
    {
        $this->signIn();

        $equipment = factory('App\Equipment')->create();

        $this->get($equipment->path())
            ->assertSee($equipment->name)
            ->assertSee($equipment->reference);
    }
}
