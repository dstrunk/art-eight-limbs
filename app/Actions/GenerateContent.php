<?php

namespace App\Actions;

use App\Enums\EntryStatus;
use App\Services\EntryGenerator;
use Illuminate\Support\Facades\Log;

class GenerateContent
{
    public function __construct(private readonly EntryGenerator $entryGenerator)
    {
    }

    public function handle(\Statamic\Contracts\Entries\Entry $entry, \Closure $next)
    {
        try {
            $entry
                ->published(false)
                ->set('openai_status', EntryStatus::GeneratingContent->value)
                ->data([
                    ...$entry->data()->toArray(),
                    'content' => $this->entryGenerator->generateContent($entry),
                ]);

            return $next($entry);
        } catch (\Exception $e) {
            $entry
                ->published(false)
                ->set('openai_status', EntryStatus::Failed->value);

            Log::error($e->getMessage());

            return false;
        }
    }
}
