<?php

namespace MarkSitko\LaravelUnsplash\Endpoints;

trait Stats
{
    /**
     * Totals
     * Get a list of counts for all of Unsplash.
     * @link https://unsplash.com/documentation#totals
     */
    public function totalStats(): self
    {
        $this->apiCall = [
            'endpoint' => 'stats/total',
        ];

        return $this;
    }

    /**
     * Month
     * Get the overall Unsplash stats for the past 30 days.
     * @link https://unsplash.com/documentation#month
     */
    public function monthlyStats(): self
    {
        $this->apiCall = [
            'endpoint' => 'stats/month',
        ];

        return $this;
    }
}
