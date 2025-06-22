<?php

namespace App\Jobs;

use Spatie\Image\Enums\Fit;
use App\Models\Image;
use Spatie\Image\Image as SpatieImage;
use Google\Cloud\Vision\V1\ImageAnnotatorClient;
use Illuminate\Bus\Queueable;
use Spatie\Image\Enums\AlignPosition;
use Illuminate\Contracts\Queue\ShouldQueue;



class RemoveFaces implements ShouldQueue
{
    use Queueable;

    private $article_image_id;

    public function __construct($article_image_id)
    {
        $this->article_image_id = $article_image_id;
    }

    public function handle()
    {
        $i = Image::find($this->article_image_id);
        if (!$i) {
            return;
        }

        $srcPath = storage_path('app/public/' . $i->path);
        $imageContent = file_get_contents($srcPath);

        putenv('GOOGLE_APPLICATION_CREDENTIALS=' . base_path('google-credential.json'));

        $imageAnnotator = new ImageAnnotatorClient();
        $response = $imageAnnotator->faceDetection($imageContent);
        $faces = $response->getFaceAnnotations();

        if (count($faces) > 0) {
            $image = SpatieImage::load($srcPath);

            foreach ($faces as $face) {
                $vertices = $face->getBoundingPoly()->getVertices();

                $bounds = [];

                foreach ($vertices as $vertex) {
                    $bounds[] = [$vertex->getX(), $vertex->getY()];
                }

                $w = $bounds[2][0] - $bounds[0][0];
                $h = $bounds[2][1] - $bounds[0][1];

                $image->watermark(
                    base_path('resources/img/censura.png'),
                    AlignPosition::TopLeft,
                    paddingX: $bounds[0][0],
                    paddingY: $bounds[0][1],
                    width: $w,
                    height: $h,
                    fit: Fit::Stretch
                );
            }

            $image->save($srcPath);
        }

        $imageAnnotator->close();
    }
}
