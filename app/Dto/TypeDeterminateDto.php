<?php

namespace App\Dto;

class TypeDeterminateDto
{
    /** @var int|null */
    private $minPriority;

    /** @var int|null */
    private $maxPriority;

    /** @var array|null */
    private $questions;

    /**
     * @return int|null
     */
    public function getMinPriority(): ?int
    {
        return $this->minPriority;
    }

    /**
     * @param  int|null  $minPriority
     * @return TypeDeterminateDto
     */
    public function setMinPriority(?int $minPriority): TypeDeterminateDto
    {
        $this->minPriority = $minPriority;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getMaxPriority(): ?int
    {
        return $this->maxPriority;
    }

    /**
     * @param  int|null  $maxPriority
     * @return TypeDeterminateDto
     */
    public function setMaxPriority(?int $maxPriority): TypeDeterminateDto
    {
        $this->maxPriority = $maxPriority;
        return $this;
    }

    /**
     * @return array|null
     */
    public function getQuestions(): ?array
    {
        return $this->questions;
    }

    /**
     * @param  array|null  $questions
     * @return TypeDeterminateDto
     */
    public function setQuestions(?array $questions): TypeDeterminateDto
    {
        $this->questions = $questions;
        return $this;
    }
}
