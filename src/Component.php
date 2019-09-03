<?php

declare(strict_types=1);

namespace Keboola\Processor\RemoveEmptyFilesAndFolders;

use Keboola\Component\BaseComponent;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;

class Component extends BaseComponent
{
    protected function getConfigClass(): string
    {
        return Config::class;
    }

    protected function getConfigDefinitionClass(): string
    {
        return ConfigDefinition::class;
    }

    public function run(): void
    {
        $this->purge($this->getDataDir() . "/in/files", $this->getDataDir() . "/out/files");
        $this->purge($this->getDataDir() . "/in/tables", $this->getDataDir() . "/out/tables");
    }

    protected function purge(string $source, string $destination): void
    {
        $finder = new Finder();
        $fs = new Filesystem();
        /**
         * @var SplFileInfo $file
         */
        foreach ($finder->in($source)->files() as $file) {
            if ($file->getSize() !== 0) {
                $fs->mkdir($destination . "/" . $file->getRelativePath());
                $fs->rename($file->getPathname(), $destination . "/" . $file->getRelativePathname());
            }
        }
    }
}
