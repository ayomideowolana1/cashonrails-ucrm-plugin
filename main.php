<?php

chdir(__DIR__);

use Cashonrails\Service\Logger;

require_once __DIR__ . '/vendor/autoload.php';

// Get UCRM log manager.
$log = \Ubnt\UcrmPluginSdk\Service\PluginLogManager::create();
$log->appendLog('Finished execution.');

(function ($debug) {
    $logger = new Logger($debug);
    $logger->info('CLI process started');
    $startTime = microtime(true);
    $builder = new \DI\ContainerBuilder();

    $container = $builder->build();
    // use the logger with same logging settings everywhere
    $container->set(Logger::class, $logger);

    $importer = $container->get(\Cashonrails\Importer::class);

    try {
        $importer->import();
    } catch (Exception $e) {
        echo $e->getMessage() . "\n";
        $logger->error($e->getMessage());
    }
    echo "\n";
    $endTime = microtime(true);
    $logger->info(sprintf('CLI process ended, wall time: %s sec', $endTime - $startTime));
})(($argv[1] ?? '') === '--verbose'); // if invoked with --verbose, increase logging verbosity
