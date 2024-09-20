<?php

declare(strict_types=1);

namespace Garvinhicking\ClinspectorGadget\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\DescriptorHelper;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ClinspectorGadgetCommand extends Command
{
    protected function configure(): void
    {
        $this->setHelp(
            'Get JSON of all commands and their arguments.'
        );
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $helper = new DescriptorHelper();
        $helper->describe(
            $output,
            $this->getApplication(),
            [
                'format' => 'json',
            ]
        );

        return Command::SUCCESS;
    }
}
