<?php

namespace App\Actions;
use App\Enums\EntryStatus;
use App\Services\EntryGenerator;
use Illuminate\Support\Facades\Log;

class GenerateTitle
{
    public function __construct(private readonly EntryGenerator $entryGenerator)
    {
    }

    public function handle(\Statamic\Contracts\Entries\Entry $entry, \Closure $next)
    {
        try {
            $entry
                ->published(false)
                ->set('openai_status', EntryStatus::GeneratingTitle->value)
                ->data([
                    ...$entry->data()->toArray(),
                    'title' => trim($this->entryGenerator->generateTitle(), '"'),
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
