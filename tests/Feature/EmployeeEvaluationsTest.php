<?php

namespace Tests\Feature;

use App\Employee;
use App\EmployeeEvaluation;
use App\evaluation;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EmployeeEvaluationsTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function an_employee_can_have_evaluations()
    {
        $this->signIn();

        $employee = factory(Employee::class)->create();

        $this->get($employee->path() . '/evaluations/create')->assertOk();

        $attributes = [
            'body' => $this->faker()->sentence()
        ];

        $this->post($employee->path() . '/evaluations', $attributes);

        $this->get($employee->path())
            ->assertSee($attributes['body']);
    }

    /** @test */
    public function a_user_can_update_an_employee_evaluation()
    {
        $this->withoutExceptionHandling();
        $employee = factory('App\Employee')->create();
        $evaluation = $employee->addEvaluation('Some evaluation body');

        $this->signIn();

        $this->get($evaluation->path() . '/edit')->assertOk();

        $this->patch(
            $evaluation->path(),
            $attributes = [
                'body' => 'Changed'
            ]
        )->assertRedirect($employee->path());

        $this->assertDatabaseHas('employee_evaluations', $attributes);
    }

    /** @test */
    public function an_evaluation_requires_a_body()
    {
        $this->signIn();

        $employee = factory(Employee::class)->create();

        $attributes = factory('App\EmployeeEvaluation')->raw([
            'body' => ''
        ]);

        $this->post($employee->path() . '/evaluations', $attributes)->assertSessionHasErrors(['body']);
    }

    /** @test */
    public function an_evaluation_can_be_deleted()
    {
        $this->signIn();

        $employee = factory(Employee::class)->create();
        $attributes = [
            'body' => 'Some evaluation body'
        ];
        $evaluation = $employee->addEvaluation($attributes['body']);

        $this->assertDatabaseHas('employee_evaluations', $attributes);

        $this->delete($evaluation->path())->assertRedirect($employee->path());
        $this->get($employee->path())
            ->assertDontSee($attributes['body']);
        $this->assertDatabaseMissing('employee_evaluations', $attributes);
    }

    /** @test */
    public function guests_cannot_add_evaluation_to_employees()
    {

        $employee = factory('App\Employee')->create();
        $attributes = factory('App\EmployeeEvaluation')->raw([
            'body' => ''
        ]);

        $this->post($employee->path() . '/evaluations', $attributes)->assertRedirect('login');
    }
}
