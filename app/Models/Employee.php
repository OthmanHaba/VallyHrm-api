<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Employee extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function position(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Position::class);
    }

    public function bankBranch(): BelongsTo
    {
        return $this->belongsTo(BankBranch::class);
    }

    public function bank(): BelongsTo
    {
        return $this->belongsTo(Bank::class);
    }

    public function employment(): \Illuminate\Database\Eloquent\Relations\MorphTo
    {
        return $this->morphTo();
    }

    public function qualification(): BelongsTo
    {
        return $this->belongsTo(Qualification::class);
    }
}
