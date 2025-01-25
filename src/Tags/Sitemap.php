<?php

namespace Spatie\Sitemap\Tags;

use Carbon\Carbon;
use DateTimeInterface;

class Sitemap extends Tag
{
    public string $url;

    public ?Carbon $lastModificationDate = null;

    public static function create(string $url): static
    {
        return new static($url);
    }

    public function __construct(string $url)
    {
        $this->url = $url;
    }

    public function setUrl(string $url = ''): static
    {
        $this->url = $url;

        return $this;
    }

    public function setLastModificationDate(?DateTimeInterface $lastModificationDate): static
    {
        $this->lastModificationDate = empty($lastModificationDate) ? null : Carbon::instance($lastModificationDate);

        return $this;
    }

    public function path(): string
    {
        return parse_url($this->url, PHP_URL_PATH) ?? '';
    }
}
