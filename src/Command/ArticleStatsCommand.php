<?php

namespace App\Command;

use function GuzzleHttp\default_ca_bundle;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class ArticleStatsCommand extends Command
{
    protected static $defaultName = 'article:stats';

    protected function configure()
    {
        $this
            ->setDescription('text')
            ->addArgument('slug', InputArgument::REQUIRED, 'The article\'s slug')
            ->addOption('format', null, InputOption::VALUE_REQUIRED, 'Option description')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);
        $slug = $input->getArgument('slug');

        $data = ['slug' => ['hearts' => rand(5, 100)]];

	    $io->listing($data);

       /* if ($slug) {
            $io->note(sprintf('You passed an argument: %s', $slug));
        }*/

        switch ($input->getOption('format')){
	        case 'json':
		        $io->write(json_encode($data));
		        break;

	        case 'text':
		        $io->note(sprintf('Format: %s', $input->getOption('format')));
		        break;

	        default:
		        $io->note("Crazy format");
	        	break;

        }

        if ($input->getOption('format')) {
            // ...
        }

        $io->success('You have a new command! Now make it your own! Pass --help to see your options.');
    }
}
