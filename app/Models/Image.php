<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class Image extends Model
{
    protected $fillable = ['path'];

    public function article():BelongsTo{
        return $this->belongsTo(Article::class);
    }

    public static function getUrlByFilePath($filePath, $w = null, $h = null){
        if(!$w && !$h){
            return Storage::url($filePath);
        }
        $path = dirname($filePath);
        $fileName = basename($filePath);
        $file = "{$path}/crop_{$w}x{$h}_{$fileName}";
        return Storage::url($file);
    }
    protected function casts():array{
        return ['labels'=>'array'];

    }
    
    public function getUrl($w = null, $h = null){
        return self::getUrlByFilePath($this->path, $w, $h);
    }
}
