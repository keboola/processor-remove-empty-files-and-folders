<?php

declare(strict_types=1);

namespace Keboola\Processor\RemoveEmptyFilesAndFolders;

use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;

class ConfigDefinition extends \Keboola\Component\Config\BaseConfigDefinition
{
    protected function getParametersDefinition(): ArrayNodeDefinition
    {
        $parametersNode = parent::getParametersDefinition();
        // @formatter:off
        $parametersNode
            ->children()
                ->booleanNode('remove_files_with_blank_lines')
                    ->defaultValue(false)
                ->end()
            ->end()
        ;
        // @formatter:on
        return $parametersNode;
    }
}
