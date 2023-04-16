<?php

namespace App\Jobs;

use App\Actions\GenerateContent;
use App\Actions\GenerateExcerpt;
use App\Actions\GenerateTitle;
use App\Enums\EntryStatus;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Routing\Pipeline;
use Illuminate\Support\Carbon;
use Statamic\Facades\Entry;

class CreateWeeklyPosts implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function handle(): void
    {
        $entries = new Collection();
        foreach (range(1,  5) as $i) {
            $entries->add(Entry::make()
                ->published(false)
                ->collection('posts')
                ->set('site', 'default')
                ->set('status', 'scheduled')
                ->set('created_at', Carbon::now()->addDays($i))
                ->set('updated_at', Carbon::now()->addDays($i))
                ->set('openai_status', EntryStatus::Pending->value)
            );
        }

        $entries->each(function ($entry) {
            app(Pipeline::class)
                ->send($entry)
                ->through([
                    GenerateTitle::class,
                    GenerateContent::class,
                    GenerateExcerpt::class,
                ])
                ->then(function ($entry) {
                    $entry->set('openai_status', EntryStatus::Complete->value);
                    $entry->save();
                });
        });
    }
}
