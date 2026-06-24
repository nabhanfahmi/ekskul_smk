<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class CompressImages extends Command
{
    /**
     * The name and signature of the console command.
     * 
     * php artisan app:compress-images
     *
     * @var string
     */
    protected $signature = 'app:compress-images';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
{
    $manager = new ImageManager(new Driver());

    $files = array_merge(
    Storage::allFiles('public/ekstrakurikuler'),
    Storage::allFiles('public/images'),
    Storage::allFiles('public/galeri_ekstrakurikuler')
);

    foreach ($files as $file) {

        $path = storage_path('app/'.$file);

        $image = $manager->read($path);

        $image->scale(width: 1000);

        $image->toJpeg(80)->save($path);

        $this->info($file.' selesai');
    }
}
}
