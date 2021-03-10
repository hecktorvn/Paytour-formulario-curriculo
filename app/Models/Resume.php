<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'id',
        'name',
        'phone',
        'email',
        'office',
        'schooling',
        'note',
        'file'
    ];

    protected $date = [
        'created_at'
    ];

    public function file()
    {
        return $this->file ?
            Storage::disk('resumes')->url($this->file)
            :
            null;
    }

    public function getSchooling()
    {
        $schooling = [
            '',
            'Fundamental',
            'Médio',
            'Superior (Graduação)',
            'Pós-graduação',
            'Mestrado',
            'Doutorado',
            'Escola'
        ];

        return $schooling[$this->schooling];
    }
}
