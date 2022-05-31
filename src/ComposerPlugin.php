<?php

namespace Imaginaria\Composer;

use Composer\Composer;
use Composer\IO\IOInterface;
use Composer\Plugin\PluginInterface;

class ComposerPlugin implements PluginInterface
{
    public function activate(Composer $composer, IOInterface $io)
    {
        $installer = new ComposerInstaller($io, $composer);
        $composer->getInstallationManager()->addInstaller($installer);
    }

    /**
     * @inheritDoc
     */
    public function deactivate(Composer $composer, IOInterface $io)
    {
    }

    /**
     * @inheritDoc
     */
    public function uninstall(Composer $composer, IOInterface $io)
    {
    }
}