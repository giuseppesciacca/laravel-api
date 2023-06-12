<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;

class Tecnology extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug'];

    public function projects(): BelongsToMany
    {
        return $this->belongsToMany(Project::class)->where('user_id', auth()->id());
    }

    public static function generateSlug($name)
    {
        return Str::slug($name, '-');
    }
}
