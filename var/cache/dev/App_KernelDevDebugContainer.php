<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerVPhFBCD\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerVPhFBCD/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerVPhFBCD.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerVPhFBCD\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \ContainerVPhFBCD\App_KernelDevDebugContainer([
    'container.build_hash' => 'VPhFBCD',
    'container.build_id' => 'b7a9ea48',
    'container.build_time' => 1649755293,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerVPhFBCD');
