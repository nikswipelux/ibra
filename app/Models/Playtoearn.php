<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Playtoearn extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'playtoearns';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'project_link',
        'name',
        'status',
        'nft_support',
        'blockchain',
        'website',
        'twitter',
        'discord',
        'telegram',
        'total_rank',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
