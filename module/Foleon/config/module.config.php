<?php
return [
    'service_manager' => [
        'factories' => [
            \Foleon\V1\Rest\Hola\HolaResource::class => \Foleon\V1\Rest\Hola\HolaResourceFactory::class,
        ],
    ],
    'router' => [
        'routes' => [
            'foleon.rest.doctrine.books' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/books[/:books_id]',
                    'defaults' => [
                        'controller' => 'Foleon\\V1\\Rest\\Books\\Controller',
                    ],
                ],
            ],
            'foleon.rest.doctrine.authors' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/authors[/:authors_id]',
                    'defaults' => [
                        'controller' => 'Foleon\\V1\\Rest\\Authors\\Controller',
                    ],
                ],
            ],
            'foleon.rest.hola' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/hola[/:hola_id]',
                    'defaults' => [
                        'controller' => 'Foleon\\V1\\Rest\\Hola\\Controller',
                    ],
                ],
            ],
        ],
    ],
    'zf-versioning' => [
        'uri' => [
            0 => 'foleon.rest.doctrine.books',
            1 => 'foleon.rest.doctrine.authors',
            2 => 'foleon.rest.hola',
        ],
    ],
    'zf-rest' => [
        'Foleon\\V1\\Rest\\Books\\Controller' => [
            'listener' => \Foleon\V1\Rest\Books\BooksResource::class,
            'route_name' => 'foleon.rest.doctrine.books',
            'route_identifier_name' => 'books_id',
            'entity_identifier_name' => 'id',
            'collection_name' => 'books',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \Foleon\V1\Entity\Books::class,
            'collection_class' => \Foleon\V1\Rest\Books\BooksCollection::class,
            'service_name' => 'Books',
        ],
        'Foleon\\V1\\Rest\\Authors\\Controller' => [
            'listener' => \Foleon\V1\Rest\Authors\AuthorsResource::class,
            'route_name' => 'foleon.rest.doctrine.authors',
            'route_identifier_name' => 'authors_id',
            'entity_identifier_name' => 'id',
            'collection_name' => 'authors',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \Foleon\V1\Entity\Authors::class,
            'collection_class' => \Foleon\V1\Rest\Authors\AuthorsCollection::class,
            'service_name' => 'Authors',
        ],
        'Foleon\\V1\\Rest\\Hola\\Controller' => [
            'listener' => \Foleon\V1\Rest\Hola\HolaResource::class,
            'route_name' => 'foleon.rest.hola',
            'route_identifier_name' => 'hola_id',
            'collection_name' => 'hola',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \Foleon\V1\Rest\Hola\HolaEntity::class,
            'collection_class' => \Foleon\V1\Rest\Hola\HolaCollection::class,
            'service_name' => 'hola',
        ],
    ],
    'zf-content-negotiation' => [
        'controllers' => [
            'Foleon\\V1\\Rest\\Books\\Controller' => 'HalJson',
            'Foleon\\V1\\Rest\\Authors\\Controller' => 'HalJson',
            'Foleon\\V1\\Rest\\Hola\\Controller' => 'HalJson',
        ],
        'accept_whitelist' => [
            'Foleon\\V1\\Rest\\Books\\Controller' => [
                0 => 'application/vnd.foleon.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
            'Foleon\\V1\\Rest\\Authors\\Controller' => [
                0 => 'application/vnd.foleon.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
            'Foleon\\V1\\Rest\\Hola\\Controller' => [
                0 => 'application/vnd.foleon.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
        ],
        'content_type_whitelist' => [
            'Foleon\\V1\\Rest\\Books\\Controller' => [
                0 => 'application/vnd.foleon.v1+json',
                1 => 'application/json',
            ],
            'Foleon\\V1\\Rest\\Authors\\Controller' => [
                0 => 'application/vnd.foleon.v1+json',
                1 => 'application/json',
            ],
            'Foleon\\V1\\Rest\\Hola\\Controller' => [
                0 => 'application/vnd.foleon.v1+json',
                1 => 'application/json',
            ],
        ],
    ],
    'zf-hal' => [
        'metadata_map' => [
            \Foleon\V1\Entity\Books::class => [
                'route_identifier_name' => 'books_id',
                'entity_identifier_name' => 'id',
                'route_name' => 'foleon.rest.doctrine.books',
                'hydrator' => 'Foleon\\V1\\Rest\\Books\\BooksHydrator',
                'max_depth' => 2
            ],
            \Foleon\V1\Rest\Books\BooksCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'foleon.rest.doctrine.books',
                'is_collection' => true,
                'max_depth' => 2
            ],
            \Foleon\V1\Entity\Authors::class => [
                'route_identifier_name' => 'authors_id',
                'entity_identifier_name' => 'id',
                'route_name' => 'foleon.rest.doctrine.authors',
                'hydrator' => 'Foleon\\V1\\Rest\\Authors\\AuthorsHydrator',
                'max_depth' => 2
            ],
            \Foleon\V1\Rest\Authors\AuthorsCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'foleon.rest.doctrine.authors',
                'is_collection' => true,
                'max_depth' => 2
            ],
            \Foleon\V1\Rest\Hola\HolaEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'foleon.rest.hola',
                'route_identifier_name' => 'hola_id',
                'hydrator' => \Zend\Hydrator\ArraySerializable::class,
                'max_depth' => 2
            ],
            \Foleon\V1\Rest\Hola\HolaCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'foleon.rest.hola',
                'route_identifier_name' => 'hola_id',
                'is_collection' => true,
                'max_depth' => 2
            ],
        ],
    ],
    'zf-mvc-auth' => [
        'authorization' => [],
    ],
    'zf-apigility' => [
        'db-connected' => [],
        'doctrine-connected' => [
            \Foleon\V1\Rest\Books\BooksResource::class => [
                'object_manager' => 'doctrine.entitymanager.orm_default',
                'hydrator' => 'Foleon\\V1\\Rest\\Books\\BooksHydrator',
            ],
            \Foleon\V1\Rest\Authors\AuthorsResource::class => [
                'object_manager' => 'doctrine.entitymanager.orm_default',
                'hydrator' => 'Foleon\\V1\\Rest\\Authors\\AuthorsHydrator',
            ],
        ],
    ],
    'zf-content-validation' => [
        'Foleon\\V1\\Rest\\Books\\Controller' => [
            'input_filter' => 'Foleon\\V1\\Rest\\Books\\Validator',
        ],
        'Foleon\\V1\\Rest\\Authors\\Controller' => [
            'input_filter' => 'Foleon\\V1\\Rest\\Authors\\Validator',
        ],
    ],
    'input_filter_specs' => [
        'Foleon\\V1\\Rest\\Books\\Validator' => [
            0 => [
                'name' => 'title',
                'required' => false,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => 255,
                        ],
                    ],
                ],
            ],
            1 => [
                'name' => 'authorId',
                'required' => false,
                'filters' => [],
                'validators' => [],
            ],
        ],
        'Foleon\\V1\\Rest\\Authors\\Validator' => [
            0 => [
                'name' => 'name',
                'required' => false,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => 255,
                        ],
                    ],
                ],
            ],
            1 => [
                'required' => false,
                'validators' => [],
                'filters' => [],
                'name' => 'books',
            ],
        ],
    ],
    'doctrine' => [
        'driver' => [
            'Foleon_driver' => [
                'class' => \Doctrine\ORM\Mapping\Driver\AnnotationDriver::class,
                'cache' => 'array',
                'paths' => [
                    0 => './module/Foleon/src/V1/Entity',
                ],
            ],
            'orm_default' => [
                'drivers' => [
                    'Foleon' => 'Foleon_driver',
                ],
            ],
        ],
    ],
    'doctrine-hydrator' => [
        'Foleon\\V1\\Rest\\Books\\BooksHydrator' => [
            'entity_class' => \Foleon\V1\Entity\Books::class,
            'object_manager' => 'doctrine.entitymanager.orm_default',
            'by_value' => true,
            'strategies' => [],
            'use_generated_hydrator' => true,
        ],
        'Foleon\\V1\\Rest\\Authors\\AuthorsHydrator' => [
            'entity_class' => \Foleon\V1\Entity\Authors::class,
            'object_manager' => 'doctrine.entitymanager.orm_default',
            'by_value' => false,
            'strategies' => [
                // 'books' => 'Zend\Hydrator\ArraySerializable'
            ],
            'use_generated_hydrator' => true,
        ],
    ],
];
