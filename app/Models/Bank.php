<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Bank extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function branches(): HasMany
    {
        return $this->hasMany(BankBranch::class, 'bank_id');
    }
}
