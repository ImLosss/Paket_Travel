<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    protected $guarded = ['id'];

    protected $casts = [
        'price' => 'float',
        'departure_date' => 'datetime',
        'return_date' => 'datetime',
        'duration' => 'integer',
        'rating' => 'integer',
        'quota' => 'integer',
        'category_id' => 'integer',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function facilities()
    {
        return $this->hasMany(Facility::class);
    }

    public function getFasilitasAttribute()
    {
        return $this->facilities;
    }

    public function getId(): int
    {
        return (int) $this->getKey();
    }

    public function getNama(): string
    {
        return (string) $this->name;
    }

    public function getDeskripsi(): string
    {
        return (string) $this->description;
    }

    public function getThumbnail(): string
    {
        return (string) $this->thumbnail;
    }

    public function getHarga(): float
    {
        return (float) $this->price;
    }

    public function getRating(): int
    {
        return (int) $this->rating;
    }
}
