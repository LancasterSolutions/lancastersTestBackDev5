<?php

namespace AppBundle\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class CreateUserCommand extends Command
{

    protected static $defaultName = 'app:test-command';
    protected $requirePassword;

    public function __construct(bool $requirePassword = false)
    {
        $this->requirePassword = $requirePassword;
        parent::__construct();
    }


    protected function configure()
    {

        $this
          ->setName($this::$defaultName)
          ->setDescription('Test command')
          ->setHelp('This test command');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $url = $input->getArgument('url');

        $io = new SymfonyStyle($input, $output);

        if ( $url ) {
            $io->table(
              ['', 'Header 2'],
              [
                ['Cell 1-1', 'Cell 1-2'],
              ]
            );
            $io->success('Url: ' . $url . '\n code: 200');
        } else {

        }
    }
}