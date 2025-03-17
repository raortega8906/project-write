<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    /** @use HasFactory<\Database\Factories\DocumentFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'type',
        'project_id'
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
