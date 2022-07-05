<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Optician extends Model
{
       /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'opticians';

    protected $fillable = ['user_id', 'campaign_id', 'name','street','zip','city','url_homepage','url_imprint','url_privacy','url_contact','url_appointment', 'status'];

    use HasFactory;

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
    public function customers()
    {
        return $this->hasMany(Customer::class);
    }

    /**
     * The relations that are associated with this model
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function customer_lists()
    {
        return $this->hasMany(CustomerList::class);
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


