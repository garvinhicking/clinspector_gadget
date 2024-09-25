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
        // Capture the current output in a buffer
        $bufferedOutput = new \Symfony\Component\Console\Output\BufferedOutput();
    
        $helper = new DescriptorHelper();
        $helper->describe(
            $bufferedOutput,
            $this->getApplication(),
            [
                'format' => 'json',
            ]
        );

        // Get the raw JSON output
        $jsonOutput = $bufferedOutput->fetch();

        // Decode and re-encode with pretty print
        $prettyJson = json_encode(json_decode($jsonOutput, true), JSON_PRETTY_PRINT);

        // Output the prettified JSON
        $output->writeln($prettyJson, $output::OUTPUT_RAW);

        return Command::SUCCESS;
    }
}
