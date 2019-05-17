<?php

namespace App\UserBundle\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CreateUserCommand extends Command
{

	protected function configure() {
		$this->setName('app:create-user')
			 ->setDescription('Create new user')
			 ->addArgument('username', InputArgument::REQUIRED, 'The username');
	}

	protected function execute( InputInterface $input, OutputInterface $output ) {
		$output->writeln([
			'User Creator',
			'============',
			'',
		]);

		$output->writeln('Username: '.$input->getArgument('username'));
	}
}