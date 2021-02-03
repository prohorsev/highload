<?php

namespace Lesson;

use Monolog\Logger;

class NewLogger extends Logger
{
    /**
     * Расширение функциональности логирования используемой памяти
     * @param $usage
     * @param $base_memory_usage
     */
    public function logMemoryUsage($usage, $base_memory_usage) {
        parent::log("Bytes diff: %d\n", $usage - $base_memory_usage);
    }
}