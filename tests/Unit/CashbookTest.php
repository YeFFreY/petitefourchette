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
    public function it_gives_total_incomes()
    {
        $cashbook = factory('App\CashBook')->create();

        $cashbook->addIncome('Initial Balance', 500);
        $cashbook->addIncome('Income 1', 100);
        $cashbook->addIncome('Income 2', 10);
        $cashbook->addIncome('Income 3', 1);

        $this->assertCount(4, $cashbook->transactions);
        $this->assertEquals(611, $cashbook->totalIncomes());
    }

    /** @test */
    public function it_gives_total_expenses()
    {
        $cashbook = factory('App\CashBook')->create();

        $cashbook->addExpense('Expense 1', 100);
        $cashbook->addExpense('Expense 2', 10);
        $cashbook->addExpense('Expense 3', 1);

        $this->assertCount(3, $cashbook->transactions);
        $this->assertEquals(111, $cashbook->totalExpenses());
    }

    /** @test */
    public function it_gives_balance()
    {
        $cashbook = factory('App\CashBook')->create();

        $cashbook->addIncome('Initial Balance', 500);
        $cashbook->addExpense('Expense 1', 100);
        $cashbook->addIncome('Income 1', 10);
        $cashbook->addExpense('Expense 3', 1);
        $cashbook->addIncome('Expense 3', 2);

        $this->assertCount(5, $cashbook->transactions);
        $this->assertEquals(411, $cashbook->balance());
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
