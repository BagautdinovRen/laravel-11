<?php

declare(strict_types=1);

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

/**
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string $firstName
 * @property string $content
 * @property array $data
 * @property Carbon $available_at
 * @property boolean $published
 * @property User $author
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Article extends Model
{
    protected $guarded = [
        'id', 'created_at', 'updated_at',
    ];

    protected $hidden = ['slug'];

    protected $casts = [
        'available_at' => 'datetime',
        'data' => 'array',
    ];

    protected function serializeDate(DateTimeInterface $date): string
    {
        return $date->format('Y-m-d');
    }

    protected function firstName(): Attribute
    {
        return Attribute::make(
        // get: fn(mixed $value, array $attributes) => sprintf("%s--%s", $attributes['slug'], $attributes['title']),
            set: fn(string $value) => Str::lower($value),
        );
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
