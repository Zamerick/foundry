<?php

declare(strict_types=1);

namespace App\Commands;

use Illuminate\Contracts\Container\Container;
use Symfony\Component\Console\Command\ListCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use NunoMaduro\LaravelConsoleSummary\Contracts\DescriberContract;

/**
 * This is an Laravel Console Summary Command implementation.
 */
class SummaryCommand extends ListCommand
{
    /**
         * The supported format.
         */
    private const FORMAT = 'txt';

    /**
     * @var \Illuminate\Contracts\Container\Container
     */
    protected $container;

    /**
     * SummaryCommand constructor.
     *
     * @param \Illuminate\Contracts\Container\Container $container
     */
    public function __construct(Container $container)
    {
        parent::__construct('list');

        $this->container = $container;
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output): void
    {
        $this->logo($output);

        if ($input->getOption('format') === static::FORMAT && !$input->getOption('raw')) {
            $this->container[DescriberContract::class]->describe($this->getApplication(), $output);
        } else {
            parent::execute($input, $output);
        }
    }

    /**
    *  Prints the ascii art logo for the application.
    *
    * @return void
    */
    private function logo($output)
    {
        $output->writeln('<info>                                        </>');
        $output->writeln('<info> ______                    _            </>');
        $output->writeln('<info>|  ____|                  | |           </>');
        $output->writeln('<info>| |__ ___  _   _ _ __   __| |_ __ _   _ </>');
        $output->writeln("<info>|  __/ _ \| | | | '_ \ / _` | '__| | | |</>");
        $output->writeln('<info>| | | (_) | |_| | | | | (_| | |  | |_| |</>');
        $output->writeln('<info>|_|  \___/ \__,_|_| |_|\__,_|_|   \__, |</>');
        $output->writeln('<info>                                   __/ |</>');
        $output->writeln('<info>                                  |___/ </>');
    }
}
