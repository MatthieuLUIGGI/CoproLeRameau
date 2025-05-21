<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resolution extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'vote_start_date',
        'vote_end_date',
        'status',
    ];

    protected $casts = [
        'vote_start_date' => 'date',
        'vote_end_date' => 'date',
    ];

    public function votes()
    {
        return $this->hasMany(Vote::class);
    }

    public function isVotingOpen()
    {
        $now = now();
        return $now >= $this->vote_start_date && $now <= $this->vote_end_date;
    }
    
    // Optionnel : pour rafraîchir le cache des votes
    public function refreshVotesCount()
    {
        $this->votes_count = $this->votes()->count();
        $this->save();
    }
}