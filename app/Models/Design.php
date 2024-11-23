<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Design extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = ['id'];
    protected $with = ['product', 'category', 'seller'];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function($query, $search) {
            return $query->where(function($query) use ($search) {
                 $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%');
             });
         });

        $query->when( $filters['product'] ?? false, function($query, $product) {
            return $query->whereHas('product', function($query) use ($product) {
                $query->where('slug', $product);
            });
        });

        $query->when( $filters['category'] ?? false, function($query, $category) {
            return $query->whereHas('category', function($query) use ($category) {
                $query->where('slug', $category);
            });
        });

        $query->when( $filters['seller'] ?? false, fn($query, $seller) => 
            $query->whereHas('seller', fn($query) => 
                $query->where('username', $seller)
            )
        );
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function category() 
    {
        return $this->belongsTo(Category::class);
    }

    public function seller() 
    {
        return $this->belongsTo(User::class, 'seller_id');
    }

    public function carts()
    {
        return $this->belongsToMany(Cart::class, 'cart_designs')
        ->withPivot('quantity', 'isChecked')
        ->withTimestamps();
    }

    public function transactions()
    {
        return $this->belongsToMany(Transaction::class, 'transaction_designs')
        ->withPivot('id', 'quantity', 'sub_total_price')
        ->withTimestamps();
    }

    public function reviews()
    {
        return $this->hasMany(DesignReview::class, 'design_id', 'id');
    }

    public function reviewByUser($userId)
    {
        return $this->reviews()->where('user_id', $userId)->first();
    }

    public function averageRating()
    {
        return $this->reviews()->avg('rating') ?: 0;
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
