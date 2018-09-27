<?php

namespace Vanderlee\Comprehend\Core\Context;

trait CaseSensitiveContextTrait
{
    private $case_sensitivity = [];

    public function pushCaseSensitivity($case_sensitive = true)
    {
        array_push($this->case_sensitivity, (bool)$case_sensitive);
    }

    public function popCaseSensitivity()
    {
        return array_pop($this->case_sensitivity);
    }

    public function isCaseSensitive()
    {
        return end($this->case_sensitivity);
    }

    // Helper
    public function handleCase($text)
    {
        return $this->isCaseSensitive() ? $text : mb_strtolower($text);
    }
}