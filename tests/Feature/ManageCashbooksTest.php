<?php

namespace Tests\Feature;

use App\CashBook;
use App\Transaction;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ManageCashbooksTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function a_user_can_start_a_cashbook()
    {
        $this->withoutExceptionHandling();

        $this->signIn();

        $this->get('/cashbooks/create')->assertOk();

        $attributes = factory('App\Http\Requests\StartCashbook')->raw();

        $this->post('/cashbooks', $attributes); // FIXME assert redirect to view of this cashbook ?

        $this->assertEquals(1, CashBook::all()->count());
        $this->assertEquals(1, Transaction::all()->count());
        $this->assertDatabaseHas('cash_books', ['service_id' => $attributes['service_id']]);
        $this->assertDatabaseHas('transactions', [
            'type' => 'INCOME',
            'description' => 'Initial Balance',
            'amount' => $attributes['initial_balance']
        ]);

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
        $this->get($cashbook->path() . 'edit')->assertRedirect('login');
        $this->get($cashbook->path())->assertRedirect('login');
        $this->post('/cashbooks', $cashbook->toArray())->assertRedirect('login');
    }

    /** @test */
    public function a_user_can_view_a_cashbook()
    {
        $this->signIn();

        $cashbook = factory('App\CashBook')->create();
        $cashbook->addIncome('Initial Balance', 167);
        $cashbook->addIncome('Cash', 263);
        $cashbook->addExpense('Avance personnel', 942);

        $response = $this->get($cashbook->path());
        $response
            ->assertSee($cashbook->service_id)
            ->assertSee($cashbook->start_at->format('H:00'))
            ->assertSee($cashbook->start_at->format('Y-m-d'));

         foreach($cashbook->transactions as $transaction ) {
            $response->assertSee($transaction->amount);
        }
        $response->assertSee(number_format($cashbook->totalIncomes(),2, ',', '.'));
        $response->assertSee(number_format($cashbook->totalExpenses(),2, ',', '.'));
        $response->assertSee(number_format($cashbook->balance(),2, ',', '.'));
    }
}
