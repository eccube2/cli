<?php

namespace Eccube2\Command\Install;

use Eccube2\Init;
use Eccube2\Util\InstallUtil;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class AgreementCommand extends Command
{
    protected static $defaultName = 'install:agreement';

    /** @var InstallUtil */
    protected $install;

    public function initialize(InputInterface $input, OutputInterface $output)
    {
        define('INSTALL_FUNCTION', true);
        Init::init();

        $this->install = new InstallUtil();
    }

    protected function configure()
    {
        $this
            ->setDescription('ソフトウェア使用許諾書')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);

        $io->writeln($this->install->agreement());
    }
}
