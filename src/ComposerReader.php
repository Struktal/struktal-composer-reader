<?php

namespace struktal\ComposerReader;

class ComposerReader {
    public static string $projectDirectory = "";
    public static string $composerFile = "composer.json";

    private array $composerData = [];

    public static function setProjectDirectory(string $directory): void {
        self::$projectDirectory = rtrim($directory, '/') . '/';
    }

    public static function setComposerFile(string $file): void {
        self::$composerFile = $file;
    }

    public static function getComposerFilePath(): string {
        return self::$projectDirectory . self::$composerFile;
    }

    private function loadComposerData(): void {
        $filePath = self::getComposerFilePath();
        if(file_exists($filePath)) {
            $content = file_get_contents($filePath);
            $this->composerData = json_decode($content, true);
        }
    }

    public function get(string... $keys): mixed {
        if(empty($this->composerData)) {
            $this->loadComposerData();
        }

        $data = $this->composerData;
        foreach($keys as $key) {
            if(isset($data[$key])) {
                $data = $data[$key];
            } else {
                return null;
            }
        }

        return $data;
    }
}
