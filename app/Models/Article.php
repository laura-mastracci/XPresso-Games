<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Scout\Searchable;

class Article extends Model
{ use Searchable;
    public $fillable=['title','description','price','link', 'category_id','user_id', 'hot'];
    
    protected $casts = [
        'hot' => 'boolean'
    ];

    public function user():BelongsTo{
        return $this->belongsTo(User::class);
    }
    public function category():BelongsTo{
        return $this->belongsTo(Category::class);
    }

    public function likes():BelongsToMany{
        return $this->belongsToMany(User::class);
    }

    public function reviews():HasMany{
        return $this->hasMany(Review::class);
    }
    public function setAccepted ($value){
        $this->is_accepted = $value;
        $this->save();
        return true;
    }
    public static function toBeRevisedCount(){
        return Article::where('is_accepted', null)->count();
    }
    public function toSearchableArray()
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
            'category' => $this->category,
        ];
    }
    public function images():HasMany
    {
        return $this->hasMany(Image::class);
    }


    public function karts():HasMany
    {
        return $this->hasMany(Article::class);
    }
}
