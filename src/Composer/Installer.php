<?php

namespace Imaginaria\Composer;

use Composer\Package\PackageInterface;
use Composer\Installer\LibraryInstaller;

class Installer extends LibraryInstaller
{
    const PLUGIN_PREFIX_LENGTH = 18;
    /**
     * @inheritDoc
     */
    public function getInstallPath(PackageInterface $package)
    {
        $prefix = substr($package->getPrettyName(), 0, self::PLUGIN_PREFIX_LENGTH);
        if ('imaginaria/plugin.' !== $prefix) {
            throw new \InvalidArgumentException(
                'Unable to install plugin, imaginaria plugins '
                .'should always start their package name with '
                .'"imaginaria/plugin."'
            );
        }

        return 'plugins/' . substr($package->getPrettyName(), self::PLUGIN_PREFIX_LENGTH);
    }

    /**
     * @inheritDoc
     */
    public function supports($packageType)
    {
        return 'imaginaria-plugin' === $packageType;
    }


}