<?php

declare(strict_types=1);

namespace App\Core;

use App\Repositories\SettingRepository;

final class View
{
    /** @param array<string, mixed> $data */
    public static function render(string $template, array $data = [], string $layout = 'layouts/front'): string
    {
        $viewPath = BASE_PATH . '/app/Views/' . $template . '.php';
        if (!is_file($viewPath)) {
            throw new \RuntimeException('View not found: ' . $template);
        }

        if (!array_key_exists('siteSettings', $data)) {
            $data['siteSettings'] = (new SettingRepository())->all();
        }

        extract($data, EXTR_SKIP);

        ob_start();
        require $viewPath;
        $content = (string) ob_get_clean();

        $layoutPath = BASE_PATH . '/app/Views/' . $layout . '.php';
        if ($layout === '' || !is_file($layoutPath)) {
            return $content;
        }

        ob_start();
        require $layoutPath;
        return (string) ob_get_clean();
    }
}
