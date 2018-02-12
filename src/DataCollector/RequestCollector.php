<?php

namespace Mapado\ApiPlatformProfilerBundle\DataCollector;

use ApiPlatform\Core\Metadata\Resource\Factory\ResourceMetadataFactoryInterface;
use ApiPlatform\Core\Metadata\Resource\Factory\ResourceNameCollectionFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\DataCollector\DataCollector;

class RequestCollector extends DataCollector
{
    /**
     * collectionFactory
     *
     * @var ResourceNameCollectionFactoryInterface
     */
    private $collectionFactory;

    /**
     * metadataFactory
     *
     * @var ResourceMetadataFactoryInterface
     */
    private $metadataFactory;

    /**
     * __construct
     *
     * @param ResourceNameCollectionFactoryInterface $collectionFactory
     * @param ResourceMetadataFactoryInterface $metadataFactory
     */
    public function __construct(ResourceNameCollectionFactoryInterface $collectionFactory, ResourceMetadataFactoryInterface $metadataFactory)
    {
        $this->collectionFactory = $collectionFactory;
        $this->metadataFactory = $metadataFactory;
    }

    public function collect(Request $request, Response $response, \Exception $exception = null)
    {
        $resourceClass = $request->attributes->get('_api_resource_class');
        $resourceMetadata = $resourceClass ? $this->metadataFactory->create($resourceClass) : null;

        $this->data = array(
            // 'collection_operation_name' => $request->attributes->get('_api_collection_operation_name'),
            'resource_class' => $resourceClass,
            'resource_metadata' => $resourceMetadata,
            'method' => $request->getMethod(),
            'acceptable_content_types' => $request->getAcceptableContentTypes(),
        );
    }

    public function getMethod()
    {
        return $this->data['method'];
    }

    public function getAcceptableContentTypes()
    {
        return $this->data['acceptable_content_types'];
    }

    public function getResourceClass()
    {
        return $this->data['resource_class'];
    }

    public function getResourceMetadata()
    {
        return $this->data['resource_metadata'];
    }

    public function getName()
    {
        return 'mapado_api_platform_profiler.request_collector';
    }

    /**
     * {@inheritdoc}
     */
    public function reset()
    {

    }
}
