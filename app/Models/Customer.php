<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'customers';
    public static function ExportCsv(){
        $Export_csv=DB::table('customers')->select("id","slug","customer_list_id","title","firstName","lastName","street","postal","city","country","firm")->get()->toArray();
        return $Export_csv;
    }
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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function opticians()
    {
        return $this->belongsTo(Optician::class);
    }

    /**
     * The relations that are associated with this model
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer_lists()
    {
        return $this->belongsTo(CustomerList::class);
    }

    /**
     * The relations that are associated with this model
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function events()
    {
        return $this->belongsTo(Event::class);
    }
}
