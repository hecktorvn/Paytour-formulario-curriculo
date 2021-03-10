<?php

namespace Tests\Feature;

use Livewire\Livewire;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

use App\Models\Resume;

class ResumeTest extends TestCase
{
    use RefreshDatabase;

    protected $model = Resume::class;


    /** @test */
    public function checking_that_the_resume_submission_page_is_active()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    /** @test */
    public function resume_page_contains_livewire_component()
    {
        $this->get('/')->assertSeeLivewire('resume');
    }

    /** @test */
    public function name_is_required()
    {
        Livewire::test('resume')
            ->set('name', '')
            ->set('email', 'hecktorvn@hotmail.com')
            ->set('phone', '84000000000')
            ->set('office', 'Full-stack')
            ->set('schooling', '2')
            ->set('note', '')
            ->set('file', '')
            ->call('send')
            ->assertHasErrors('name');
    }

    /** @test */
    public function email_is_required()
    {
        Livewire::test('resume')
            ->set('name', 'Hecktor viegas do nascimento')
            ->set('email', '')
            ->set('phone', '84000000000')
            ->set('office', 'Full-stack')
            ->set('schooling', '2')
            ->set('note', '')
            ->set('file', '')
            ->call('send')
            ->assertHasErrors(['email'=>'required']);
    }

    /** @test */
    public function email_is_valid_email()
    {
        Livewire::test('resume')
            ->set('name', 'Hecktor viegas do nascimento')
            ->set('email', 'hecktorteste')
            ->set('phone', '84000000000')
            ->set('office', 'Full-stack')
            ->set('schooling', '2')
            ->set('note', '')
            ->set('file', '')
            ->call('send')
            ->assertHasErrors(['email'=>'email']);
    }

    /** @test */
    public function phone_is_required()
    {
        Livewire::test('resume')
            ->set('name', 'Hecktor viegas do nascimento')
            ->set('email', 'hecktorvn@hotmail.com')
            ->set('phone', '')
            ->set('office', 'Full-stack')
            ->set('schooling', '2')
            ->set('note', '')
            ->set('file', '')
            ->call('send')
            ->assertHasErrors('phone');
    }

    /** @test */
    public function office_is_required()
    {
        Livewire::test('resume')
            ->set('name', 'Hecktor viegas do nascimento')
            ->set('email', 'hecktorvn@hotmail.com')
            ->set('phone', '84000000000')
            ->set('office', null)
            ->set('schooling', '2')
            ->set('note', '')
            ->set('file', '')
            ->call('send')
            ->assertHasErrors('office');
    }

    /** @test */
    public function schooling_is_required()
    {
        Livewire::test('resume')
            ->set('name', 'Hecktor viegas do nascimento')
            ->set('email', 'hecktorvn@hotmail.com')
            ->set('phone', '84000000000')
            ->set('office', 'Full-stack')
            ->set('schooling', null)
            ->set('note', '')
            ->set('file', '')
            ->call('send')
            ->assertHasErrors('schooling');
    }

    /** @test */
    public function file_is_required()
    {
        Livewire::test('resume')
            ->set('name', 'Hecktor viegas do nascimento')
            ->set('email', 'hecktorvn@hotmail.com')
            ->set('phone', '84000000000')
            ->set('office', 'Full-stack')
            ->set('schooling', '2')
            ->set('note', '')
            ->set('file', '')
            ->call('send')
            ->assertHasErrors('file');
    }
}
