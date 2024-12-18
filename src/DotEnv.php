<?php

declare(strict_types=1);

namespace ZenPaymentSdk;

class DotEnv
{
    public function load(string $path): void
    {
        $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        foreach ($lines as $line) {
            list($name, $value) = explode('=', $line, 2);

            $_ENV[$name] = $value;
        }
    }
}