<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortfolioSectionSetting extends Model
{
    use HasFactory;

    protected $table = 'portfolio_section_settings';

    protected $fillable = [
        'title',
        'sub_title',
    ];
}
