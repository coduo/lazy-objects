<?php

namespace Coduo\LazyObjects\Proxy\Adapter\OcramiusProxyManager\Factory;

use Coduo\LazyObjects\Proxy\Adapter\OcramiusProxyManager\ProxyGenerator\LazyObjectsProxyGenerator;
use ProxyManager\Factory\AbstractBaseFactory;

/**
 * Factory responsible of producing proxy lazy objects
 */
class LazyObjectsFactory extends AbstractBaseFactory
{
    /**
     * @var LazyObjectsProxyGenerator|null
     */
    private $generator;

    /**
     * @return \Coduo\LazyObjects\Proxy\Proxy
     */
    public function createProxy($instance, array $prefixInterceptors = array(), array $suffixInterceptors = array())
    {
        $proxyClassName = $this->generateProxy(get_class($instance));

        return new $proxyClassName($instance, $prefixInterceptors, $suffixInterceptors);
    }

    /**
     * {@inheritDoc}
     */
    protected function getGenerator()
    {
        return $this->generator ?: $this->generator = new LazyObjectsProxyGenerator();
    }
}
