<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;

    protected $table = 'campaigns';

    protected $fillable = ['user_id', 'name','active'];

        /**
     * The relations that are associated with this model
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * The relations that are associated with this model
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function customer_lists()
    {
        return $this->hasMany(CustomerList::class);
    }
}
