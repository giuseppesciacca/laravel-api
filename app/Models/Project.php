<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'img_path', 'slug', 'type_id', 'user_id'];

    public static function generateSlug($title)
    {
        return Str::slug($title, '-');
    }

    public function user(): BelongsTo
    {
        return $this->BelongsTo(User::class);
    }

    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class);
    }

    public function tecnologies(): BelongsToMany
    {
        return $this->belongsToMany(Tecnology::class);
    }
}
