<?php

namespace Tests\Feature;

use ATS\Model\User;
use Bouncer;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EstudiantesModuleTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testLoadEstudiantesAdmin()
    {
        Bouncer::dontCache();
        $user = factory(User::class)->create(['type' => 'admin']);
        $user->assign($user->type);

        $response = $this->actingAs($user)->get('/admin/estudiantes');
        $response->assertStatus(200);
    }
}
