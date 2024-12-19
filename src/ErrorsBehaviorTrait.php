<?php

declare(strict_types=1);

namespace ZenPaymentSdk;

/**
 * Trait add error behavior
 */
trait ErrorsBehaviorTrait
{
    /** @var string[] store error list  */
    protected array $errors = [];

    /**
     * Add error to $errors
     *
     * @param string $error - error text
     * @return void
     */
    protected function addError(string $error): void
    {
        $this->errors[] = $error;
    }

    /**
     * Get all errors and implode its into one string
     *
     * @return string - return implode result
     */
    public function getErrors(): string
    {
        return implode('; ', $this->errors);
    }

    /**
     * Check if error list empty
     *
     * @return bool
     */
    public function hasErrors(): bool
    {
        return count($this->errors) > 0;
    }
}