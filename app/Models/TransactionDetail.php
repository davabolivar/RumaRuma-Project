<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class TransactionDetail extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'transactionID',
        'barangID',
        'quantity'
    ];

    /**
     * Get the transaction associated with the TransactionDetail
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function transaction(): HasOne
    {
        return $this->hasOne(Transaction::class);
    }
}
