<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function city()
    {
        return $this->belongsTo(City::class);
    } // End city

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getPriceAttribute($value)
    {
        return str_replace('.', ',', $value);
    }

    public function setPriceAttribute($value)
    {
        $this->attributes['price'] = str_replace(',', '.', $value);
    }

    public function scopeSearch($query, $term)
    {
        $term = "%$term%";
        $query->where(function ($query) use ($term) {
            $query->where('name', 'like', $term)
                ->orWhere('id', 'like', $term)
                ->orWhereHas('city', function ($q) use($term) {
                    $q->where('name', 'like', $term);
                })->orWhereHas('category', function ($q) use($term) {
                    $q->where('name', 'like', $term);
                })->orWhereHas('user', function ($q) use($term) {
                    $q->where('name', 'like', $term);
                });
        });
    }
}
