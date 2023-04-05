<?php

namespace App\Services;

use OpenAI\Laravel\Facades\OpenAI;
use Statamic\Facades\Entry;

class EntryGenerator
{
    /**
     * @throws \Exception
     */
    public function generateTitle(): string
    {
        $topics = implode(', ', Entry::all()->where('collection', '=', 'posts')->pluck('title')->toArray());
        $response = OpenAI::chat()->create([
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                [
                    'role' => 'system',
                    'content' => 'You are a content marketing assistant, focused on providing a search engine optimized title for a given topic.',
                ],
                [
                    'role' => 'user',
                    'content' => "Create an idea for a Muay Thai blog post. Avoid the following topics: $topics. Provide only the topic, nothing before or after.",
                ],
            ],
        ]);

        if (!$response->choices) {
            throw new \Exception('Unable to generate a title using OpenAI.');
        }

        return $response->choices[0]->message->content;
    }

    /**
     * @throws \Exception
     */
    public function generateContent(\Statamic\Contracts\Entries\Entry $entry): string
    {
        $response = OpenAI::chat()->create([
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                [
                    'role' => 'system',
                    'content' => 'You are a content marketing assistant, focused on providing search engine optimized content for a given topic.',
                ],
                [
                    'role' => 'user',
                    'content' => "Create a five paragraph blog post for the following topic: {$entry->title}",
                ],
            ],
        ]);

        if (!$response->choices) {
            throw new \Exception('Unable to generate content using OpenAI.');
        }

        return $response->choices[0]->message->content;
    }

    /**
     * @throws \Exception
     */
    public function generateExcerpt(\Statamic\Contracts\Entries\Entry $entry): string
    {
        $response = OpenAI::chat()->create([
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                [
                    'role' => 'system',
                    'content' => 'You are a content marketing assistant, focused on providing a search engine optimized excerpt for a blog post.',
                ],
                [
                    'role' => 'user',
                    'content' => "Provide two to three sentences summarizing the following blog post: {$entry->content}.",
                ],
            ],
        ]);

        if (!$response->choices) {
            throw new \Exception('Unable to generate an excerpt using OpenAI.');
        }

        return $response->choices[0]->message->content;
    }
}
