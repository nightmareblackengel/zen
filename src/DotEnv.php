<?php

declare(strict_types=1);

namespace ZenPaymentSdk;

/**
 * Class load String from file and save it to $_ENV
 */
class DotEnv
{
    /**
     * Load file entry, then parse it into variables, then save its into $_ENV
     *
     * @var string $path - full file path
     */
    public function load(string $path): void
    {
        if (!file_exists($path)) {
            return;
        }

        $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        foreach ($lines as $line) {
            list($name, $value) = explode('=', $line, 2);

            $_ENV[$name] = $value;
        }
    }
}
