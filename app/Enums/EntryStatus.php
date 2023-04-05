<?php

namespace App\Enums;

enum EntryStatus: string
{
    case Pending = 'pending';
    case GeneratingTitle = 'generating title';
    case GeneratingContent = 'generating content';
    // case GeneratingContentImages = 'generating content images';
    case GeneratingExcerpt = 'generating excerpt';
    // case GeneratingFeaturedImage = 'generating featured image';
    case Complete = 'complete';
    case Failed = 'failed';
}

