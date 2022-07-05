<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerList extends Model
{
    use HasFactory;

    protected $table = 'customer_lists';

    protected $fillable = ['optician_id', 'campaign_id', 'event_id', 'name'];

    /**
     * The relations that are associated with this model
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function opticians()
    {
        return $this->belongsTo(Optician::class, 'optician_id', 'id');
    }

    /**
     * The relations that are associated with this model
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function events()
    {
        return $this->belongsTo(Event::class, 'event_id', 'id');
    }

    /**
     * The relations that are associated with this model
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function campaigns()
    {
        return $this->belongsTo(Campaign::class, 'campaign_id', 'id');
    }
}
