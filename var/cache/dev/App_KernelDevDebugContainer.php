<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\Container3tGSenP\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/Container3tGSenP/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/Container3tGSenP.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\Container3tGSenP\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \Container3tGSenP\App_KernelDevDebugContainer([
    'container.build_hash' => '3tGSenP',
    'container.build_id' => 'fbb15136',
    'container.build_time' => 1650379097,
], __DIR__.\DIRECTORY_SEPARATOR.'Container3tGSenP');
