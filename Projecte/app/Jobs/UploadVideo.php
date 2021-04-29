<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Video;
use FFMpeg;
use Illuminate\Support\Facades\Storage;

class UploadVideo implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {   
        $p = $this->data['video_path'];
        #->resize(3840,2160)
        FFMpeg::open($p)->export()->inFormat(new FFMpeg\Format\Video\WebM)->save(preg_replace('/\\.[^.\\s]{3,4}$/', '', $p).'.webm');
        Storage::delete($p);
        $this->data['video_path'] = preg_replace('/\\.[^.\\s]{3,4}$/', '', $p).'.webm';
        $video = new Video($this->data);
        $video->save();
    }
}
