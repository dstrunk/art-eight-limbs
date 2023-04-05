<?php

namespace Tests\Feature\Actions;

use App\Actions\GenerateContent;
use App\Actions\GenerateExcerpt;
use App\Actions\GenerateTitle;
use App\Enums\EntryStatus;
use App\Services\EntryGenerator;
use Statamic\Facades\Entry;
use Tests\TestCase;

class PipelineTest extends TestCase
{
    private readonly \Statamic\Contracts\Entries\Entry $entry;

    public function setUp(): void
    {
        parent::setUp();
        $this->entry = Entry::make()
            ->published(false)
            ->collection('posts')
            ->set('site', 'default')
            ->set('status', 'scheduled')
            ->set('created_at', now())
            ->set('updated_at', now())
            ->set('openai_status', EntryStatus::Pending->value);
    }

    /** @test */
    public function generateTitle_sets_the_entry_title()
    {
        $entryGenerator = \Mockery::mock(EntryGenerator::class)
            ->shouldReceive('generateTitle')
            ->once()
            ->andReturn('Entry title')
            ->getMock();
        $generateTitle = new GenerateTitle($entryGenerator);

        $generateTitle->handle($this->entry, function ($entry) {});

        $this->assertEquals(EntryStatus::GeneratingTitle->value, $this->entry->openai_status);
        $this->assertEquals('Entry title', $this->entry->title);
    }

    /** @test */
    public function generateContent_sets_the_entry_content()
    {
        $entryGenerator = \Mockery::mock(EntryGenerator::class)
            ->shouldReceive('generateContent')
            ->once()
            ->withAnyArgs()
            ->andReturn('Entry content')
            ->getMock();
        $generateContent = new GenerateContent($entryGenerator);

        $generateContent->handle($this->entry, function ($entry) {});

        $this->assertEquals(EntryStatus::GeneratingContent->value, $this->entry->openai_status);
        $this->assertEquals("<p>Entry content</p>\n", $this->entry->content);
    }

    /** @test */
    public function generateExcerpt_sets_the_entry_excerpt()
    {
        $entryGenerator = \Mockery::mock(EntryGenerator::class)
            ->shouldReceive('generateExcerpt')
            ->once()
            ->withAnyArgs()
            ->andReturn('Entry excerpt')
            ->getMock();
        $generateExcerpt = new GenerateExcerpt($entryGenerator);

        $generateExcerpt->handle($this->entry, function ($entry) {});

        $this->assertEquals(EntryStatus::GeneratingExcerpt->value, $this->entry->openai_status);
        $this->assertEquals('Entry excerpt', $this->entry->excerpt);
    }
}
