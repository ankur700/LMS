<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'contacts';

    protected $fillable = [
        'title',
        'name',
        'gender',
        'designation',
        'language',
        'email',
        'fax',
        'phone_number',
        'mobile_number',
        'extension_number',
        'organisation_name',
        'organisation_department',
        'organisation_address',
        'personal_address_one',
        'personal_address_two',
        'city',
        'state',
        'country',
        'region',
        'zip_code',
        'postal_code',
        'contact_list_id',
        'contact_category_id',
    ];
    public function contactList(): BelongsTo
    {
        return $this->belongsTo(ContactList::class);
    }

    public function contactCategory(): BelongsTo
    {
        return $this->belongsTo(ContactCategory::class);
    }

}
