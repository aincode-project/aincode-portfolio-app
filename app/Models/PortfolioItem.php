<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortfolioItem extends Model
{
    use HasFactory;

    public function portfolio_category(){
        return $this->belongsTo(PortfolioCategory::class);
    }
}
