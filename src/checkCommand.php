<?php
namespace ConsoleApp;

use AlexNovikov\Brackets;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class checkCommand extends Command
{
    /**
     * @var Brackets - instance of the Brackets checker class
     */
    private $brackets;
    
    /**
     * checkCommand constructor.
     */
    public function __construct()
    {
        $this->brackets  = new Brackets();
        parent::__construct();
    }
    
    /**
     * Configuring the "Check" command
     */
    public function configure()
    {
        $this->setName('check')
            ->setDescription('Application is checking, does all brackets has been used correctly in the string')
            ->addArgument('brackets', InputArgument::OPTIONAL, 'Provide checking string.');
    }
    
    /**
     * Executing "Check" command
     *
     * @param InputInterface  $input
     * @param OutputInterface $output
     * @return void
     */
    public function execute(InputInterface $input, OutputInterface $output)
    {
        $string = $input->getArgument('brackets');
        $res = $this->brackets->check($string) ? 'correct' : 'incorrect';
        $output->writeln(sprintf('Your string is: %s', $res));
    }
}