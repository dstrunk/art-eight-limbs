<?php

namespace Tests\Feature\Jobs;

use App\Jobs\CreateWeeklyPosts;
use App\Services\EntryGenerator;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Statamic\Eloquent\Entries\EntryModel;
use Tests\TestCase;

class CreateWeeklyPostsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function createWeeklyPosts_creates_entries_with_a_post_topic_excerpt_and_content()
    {
        $this->mock(EntryGenerator::class, function ($mock) {
            $mock->shouldReceive('generateTitle')->times(5)->andReturn(
                'Entry title 0',
                'Entry title 1',
                'Entry title 2',
                'Entry title 3',
                'Entry title 4',
            );
            $mock->shouldReceive('generateContent')->times(5)->andReturn(
                'Entry content 0',
                'Entry content 1',
                'Entry content 2',
                'Entry content 3',
                'Entry content 4',
            );
            $mock->shouldReceive('generateExcerpt')->times(5)->andReturn(
                'Entry excerpt 0',
                'Entry excerpt 1',
                'Entry excerpt 2',
                'Entry excerpt 3',
                'Entry excerpt 4',
            );
        });

        $job = new CreateWeeklyPosts();
        $job->handle();

        $this->assertEquals(5, EntryModel::all()->count());
        EntryModel::all()->each(function ($entry, $i) {
            $this->assertEquals("Entry title $i", $entry->title);
            $this->assertEquals("Entry content $i", $entry->content);
            $this->assertEquals("Entry excerpt $i", $entry->excerpt);
        });
    }
}
