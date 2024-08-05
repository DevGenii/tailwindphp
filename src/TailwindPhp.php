<?php

namespace DevGenii\TailwindPhp;

use ScssPhp\ScssPhp\Compiler;
use Symfony\Component\Process\Process;
use Throwable;

class TailwindPhp
{
    public static function build(?string $css = null, ?string $configFile = null): string
    {

        $binFolder = dirname(__DIR__) . '/bin/';

        if (!$configFile) {
            $configFile = 'tailwind.config.js';
        }

        // Temp filepath
        if ($css) {
            $input = tempnam(sys_get_temp_dir(), 'css_');
            file_put_contents($input, $css);

            $tailwindcss = new Process([
                $binFolder . '/tailwindcss-linux-x64',
                '--no-autoprefixer', // for speed
                '-c',
                $configFile,
                '-i',
                $input,
            ], '..');
        } else {

            $tailwindcss = new Process([
                $binFolder . '/tailwindcss-linux-x64',
                '--no-autoprefixer', // for speed
                '-c',
                $configFile,
            ], '..');
        }

        $status = $tailwindcss->run();


        if ($status !== 0) {

            $output = str_replace("\n", "\\A", $tailwindcss->getErrorOutput());
            $errors = trim(htmlspecialchars($output, ENT_COMPAT, 'UTF-8'));

            throw new \Exception($errors);
        }

        // Delete tmpfile
        if (!empty($input)) {
            unlink($input);
        }

        return $tailwindcss->getOutput();
    }
}
