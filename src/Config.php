<?php

declare(strict_types=1);

namespace Keboola\Processor\RemoveEmptyFilesAndFolders;

class Config extends \Keboola\Component\Config\BaseConfig
{
    public function ignoreFilesWithBlankLines(): bool
    {
        return $this->getValue(['parameters', 'remove_files_with_blank_lines']);
    }
}
