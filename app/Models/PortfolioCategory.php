<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortfolioCategory extends Model
{
    use HasFactory;

    protected $table = 'portfolio_categories';

    protected $fillable = [
        'name',
        'slug',
    ];

    public function portfolio_item(){
        return $this->hasMany(PortfolioItem::class);
    }
}
