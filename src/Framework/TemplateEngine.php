<?php

declare(strict_types=1);

namespace Framework;

class TemplateEngine
{
    public function __construct(private string $basePath)
    {
        // Initialize the template engine, e.g., set up paths, configurations, etc.
    }

    public function render(string $template, array $data = []): string
    {
        // Extract data to variables for use in the template
        extract($data, EXTR_SKIP);

        $filePath = $this->resolve($template);

        ob_start();
        include $filePath;

        $output = ob_get_contents();
        ob_end_clean();

        return $output;
    }

    public function resolve(string $template)
    {
        $filePath = "{$this->basePath}/{$template}";

        if (!file_exists($filePath)) {
            throw new \RuntimeException("Template file not found: {$filePath}");
        }

        return $filePath;
    }
}
