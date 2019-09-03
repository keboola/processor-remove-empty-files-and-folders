<?php

declare(strict_types=1);

namespace Keboola\Processor\RemoveEmptyFilesAndFolders;

use Keboola\Component\BaseComponent;
use Keboola\Component\UserException;
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
        /** @var Config $config */
        $config = $this->getConfig();

        $this->purge($this->getDataDir() . "/in/files", $this->getDataDir() . "/out/files", $config);
        $this->purge($this->getDataDir() . "/in/tables", $this->getDataDir() . "/out/tables", $config);
    }

    protected function purge(
        string $source,
        string $destination,
        Config $config
    ): void {
        $finder = new Finder();
        $fs = new Filesystem();
        /**
         * @var SplFileInfo $file
         */
        foreach ($finder->in($source)->files() as $file) {
            if ($file->getSize() !== 0) {
                if ($config->removeFilesWithBlankLines() === true && $this->skipFileWithEmptyLines($file)) {
                    continue;
                }

                $fs->mkdir($destination . "/" . $file->getRelativePath());
                $fs->rename($file->getPathname(), $destination . "/" . $file->getRelativePathname());
            }
        }
    }

    private function skipFileWithEmptyLines(SplFileInfo $file): bool
    {
        $handle = fopen($file->getPathname(), "rb");
        if ($handle) {
            while (($line = fgets($handle)) !== false) {
                if (rtrim($line, "\r\n") !== '') {
                    fclose($handle);
                    return false;
                }
            }

            fclose($handle);
            return true;
        }

        throw new UserException(
            'File "' . $file->getPathname() . '" can\'t be open.'
        );
    }
}
