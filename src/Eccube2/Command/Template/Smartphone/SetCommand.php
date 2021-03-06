<?php

/*
 * This file is part of EC-CUBE2 CLI.
 *
 * (C) Tsuyoshi Tsurushima.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Eccube2\Command\Template\Smartphone;

use Eccube2\Init;
use Eccube2\Util\TemplateUtil;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class SetCommand extends Command
{
    protected static $defaultName = 'template:smartphone:set';

    /** @var TemplateUtil */
    protected $template;

    public function initialize(InputInterface $input, OutputInterface $output)
    {
        Init::init();

        $this->template = new TemplateUtil();
    }

    protected function configure()
    {
        $this
            ->setDescription('スマートフォンテンプレートコード設定')
            ->addArgument('code', InputArgument::REQUIRED, 'テンプレートコード')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $code = $input->getArgument('code');

        $this->template->setSmartphoneTemplate($code);

        $output->writeln('    <info>設定しました。</info>');
    }
}
