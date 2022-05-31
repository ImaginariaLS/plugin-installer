<?php

namespace Imaginaria\Composer;

use Composer\Package\PackageInterface;
use Composer\Installer\LibraryInstaller;

class ComposerInstaller extends LibraryInstaller
{
    /**
     * @inheritDoc
     */
    public function getInstallPath(PackageInterface $package)
    {
        $mask ='imaginaria/plugin.';
        $mask_length = strlen($mask);

        $prefix = substr($package->getPrettyName(), 0, $mask_length);

        if ($mask !== $prefix) {
            throw new \InvalidArgumentException(
                'Unable to install plugin, imaginaria plugins '
                .'should always start their package name with '
                .'"imaginaria/plugin.", this plugin have prettyName: '
                ."\"{$package->getPrettyName()}\""
                .", so prefix is '{$prefix}'"
            );
        }

        return 'plugins/' . substr($package->getPrettyName(), $mask_length);
    }

    /**
     * @inheritDoc
     */
    public function supports($packageType)
    {
        return 'imaginaria-plugin' === $packageType;
    }


}