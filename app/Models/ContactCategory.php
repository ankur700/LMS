<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ContactCategory extends Model
{
    use HasFactory;
    protected $table = 'contact_categories';
    protected $fillable = [
        'name',
    ];
    public function contacts(): HasMany
    {
        return $this->hasMany(Contact::class);
    }

    public function children(): HasMany
    {
        return $this->hasMany(ContactCategory::class, 'id');
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(ContactCategory::class, 'parent_id');
    }
}
