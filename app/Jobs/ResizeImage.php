<?php

namespace App\Jobs;

use Spatie\Image\Image;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Spatie\Image\Enums\CropPosition;
use Illuminate\Support\Facades\Log;
use Spatie\Image\Enums\Fit;
use Spatie\Image\Enums\Unit;

class ResizeImage implements ShouldQueue
{
    use Queueable;
    private $width, $height, $fileName, $path;

    /**
     * Create a new job instance.
     */
    public function __construct($filePath, $width, $height)
    {
        $this->path = dirname($filePath);
        $this->fileName = basename($filePath);
        $this->width = $width;
        $this->height = $height;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        
            $width = $this->width;
            $height = $this->height;
            $srcPath = storage_path() . '/app/public/' . $this->path . '/' . $this->fileName;
            $destPath = storage_path() . '/app/public/' . $this->path . "/crop_{$width}x{$height}_" . $this->fileName;

            Image::load($srcPath)
                ->resize($width, $height)
                ->watermark(
                    base_path('resources/img/watermark.png'),
                    width: 50,
                    height: 50,
                    paddingX: 5,
                    paddingY: 5,
                    paddingUnit: Unit::Percent
                )
    ->save($destPath);
    }
}
