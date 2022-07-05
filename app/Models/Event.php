<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    /**
     * The relations that are associated with this model
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function customer_lists()
    {
        return $this->hasMany(CustomerList::class);
    }
}
