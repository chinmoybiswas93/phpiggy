<?php

declare(strict_types=1);

function dd(mixed $data): void
{
    echo "<pre>";
    print_r($data);
    echo "</pre>";
    die();
}
