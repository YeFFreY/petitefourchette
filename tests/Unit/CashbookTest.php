<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CashbookTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_has_a_path()
    {
        $cashbook = factory('App\CashBook')->create();
        $this->assertEquals('/cashbooks/' . $cashbook->id, $cashbook->path());
    }

    /** @test */
    public function it_can_add_an_income()
    {
        $cashbook = factory('App\CashBook')->create();

        $transaction = $cashbook->addIncome('Initial Balance', 500);

        $this->assertCount(1, $cashbook->transactions);
        $this->assertTrue($cashbook->transactions->contains($transaction));
    }

    /** @test */
    public function it_can_add_an_expense()
    {
        $cashbook = factory('App\CashBook')->create();

        $transaction = $cashbook->addExpense('Avance personnel', 200);

        $this->assertCount(1, $cashbook->transactions);
        $this->assertTrue($cashbook->transactions->contains($transaction));
    }
}
