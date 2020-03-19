<?php

namespace Tests\Feature;

use App\CashBook;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CashbookTransactionsTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function an_income_can_be_added_to_cashbook()
    {
        $this->withoutExceptionHandling();
        $this->signIn();

        $cashbook = factory('App\CashBook')->create();

        $this->get($cashbook->path())->assertOk();

        $attributes = [
            'type' => 'INCOME',
            'description' => $this->faker()->sentence(),
            'amount' => $this->faker->numberBetween(500, 10000)
        ];

        $this->post($cashbook->path() . '/transactions', $attributes);

        $this->get($cashbook->path())
            ->assertSee($attributes['description'])
            ->assertSee(number_format($attributes['amount'],2, ',', '.'));
    }

        /** @test */
        public function an_expense_can_be_added_to_cashbook()
        {
            $this->withoutExceptionHandling();
            $this->signIn();
    
            $cashbook = factory('App\CashBook')->create();
    
            $this->get($cashbook->path())->assertOk();
    
            $attributes = [
                'type' => 'EXPENSE',
                'description' => $this->faker()->sentence(),
                'amount' => $this->faker->numberBetween(500, 10000)
            ];
    
            $this->post($cashbook->path() . '/transactions', $attributes);
    
            $this->get($cashbook->path())
                ->assertSee($attributes['description'])
                ->assertSee(number_format($attributes['amount'],2, ',', '.'));
        }
}
