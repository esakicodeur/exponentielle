<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Matiere extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function exists(): bool
    {
        return (bool) $this->id;
    }

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }
}
