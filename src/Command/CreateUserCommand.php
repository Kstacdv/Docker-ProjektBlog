<?php

namespace App\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'createUser',
    description: 'Command for creating and defining a new user.',
)]
class CreateUserCommand extends Command
{

    private bool $requirePassword;

    public function __construct(bool $requirePassword = false) {
        $this->requirePassword = $requirePassword;
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->addArgument('arg1', InputArgument::OPTIONAL, 'Argument description')
            ->addOption('option1', null, InputOption::VALUE_NONE, 'Option description')
            ->setHelp("This command allows you to create a user");
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $arg1 = $input->getArgument('arg1');

        $output->writeln([
           'User Creator',
           '============='
        ]);

//        $output->writeln($this->someMethod());

        $output->writeln('Whoa!');

        $output->write('You are about to ');
        $output->write('create user.');

//        if ($arg1) {
//            $io->note(sprintf('You passed an argument: %s', $arg1));
//        }
//
//        if ($input->getOption('option1')) {
//            // ...
//        }
//
//        $io->success('You have a new command! Now make it your own! Pass --help to see your options.');

        $output->writeln('Username: '.$input->getArgument('username'));

        return Command::SUCCESS;
    }
}
