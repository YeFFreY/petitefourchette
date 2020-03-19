<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EmployeeTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_has_a_path()
    {
        $employee = factory('App\Employee')->create();
        $this->assertEquals('/employees/' . $employee->id, $employee->path());
    }

    /** @test */
    public function it_can_add_an_evaluation()
    {
        $employee = factory('App\Employee')->create();

        $evaluation = $employee->addEvaluation('Test evaluation');

        $this->assertCount(1, $employee->evaluations);
        $this->assertTrue($employee->evaluations->contains($evaluation));
    }
}
