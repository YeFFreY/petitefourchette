<?php

namespace Tests\Feature;

use App\CashBook;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ManageCashbooksTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function a_user_can_start_a_cashbook()
    {
        $this->signIn();

        $this->get('/cashbooks/create')->assertOk();

        $attributes = [
            'service_id' => $this->faker->word
        ];

        $this->post('/cashbooks', $attributes); // FIXME assert redirect to view of this cashbook ?

        $this->assertEquals(1,CashBook::all()->count());
        $this->assertDatabaseHas('cash_books', $attributes);

        $this->get('/cashbooks')
            ->assertSee($attributes['service_id']);
    }

     /** @test */
     public function an_cashbook_requires_a_service_id()
     {
         $this->signIn();
 
         $attributes = factory('App\CashBook')->raw([
             'service_id' => ''
         ]);
 
         $this->post('/cashbooks', $attributes)->assertSessionHasErrors(['service_id']);
     }
 
     /** @test */
     public function guests_cannot_manage_cashbooks()
     {
         $cashbook = factory('App\CashBook')->create();
 
         $this->get('/cashbooks')->assertRedirect('login');
         $this->get('/cashbooks/create')->assertRedirect('login');
         $this->get($cashbook->path().'edit')->assertRedirect('login');
         $this->get($cashbook->path())->assertRedirect('login');
         $this->post('/cashbooks', $cashbook->toArray())->assertRedirect('login');
     }

         /** @test */
    public function a_user_can_view_a_cashbook()
    {
        $this->withoutExceptionHandling();
        $this->signIn();

        $cashbook = factory('App\CashBook')->create();

        $this->get($cashbook->path())
            ->assertSee($cashbook->service_id)
            ->assertSee($cashbook->start_at->format('Y-m-d H:00'));
    }
}
