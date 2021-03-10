<?php

namespace App\Http\Livewire;

use App\Models\Resume as ResumeModel;
use App\Notifications\ResumeSend;

use Livewire\Component;
use Livewire\WithFileUploads;

class Resume extends Component
{
    use WithFileUploads;

    public $name;
    public $email;
    public $phone;
    public $office;
    public $schooling;
    public $note;
    public $file;
    public $success = false;

    public function render()
    {
        return view('livewire.resume')
            ->extends('layouts.app')
            ->section('body');
    }

    public function update()
    {
        $this->success = false;
    }

    public function updatedFile()
    {
        $this->validate([
            'file' => 'required|max:1000|mimes:doc,docx,pdf'
        ]);
    }

    public function resetValues()
    {
        $this->name = null;
        $this->email = null;
        $this->phone = null;
        $this->office = null;
        $this->schooling = null;
        $this->note = null;
        $this->file = null;
    }

    public function send()
    {
        $this->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'phone' => 'required|min:8',
            'office' => 'required',
            'schooling' => 'required',
            'file' => 'required|max:1000|mimes:doc,docx,pdf'
        ]);

        $filename = $this->file->store('/', 'resumes');

        $resume = ResumeModel::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => preg_replace('/[^0-9]/', '', $this->phone),
            'office' => $this->office,
            'schooling' => $this->schooling,
            'file' => $this->file,
            'note' => $this->note
        ]);

        $resume->notify(new ResumeSend($resume));

        $this->resetValues();
        $this->success = true;
    }
}
