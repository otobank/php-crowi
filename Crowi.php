<?php

namespace Crowi;

use Doctrine\MongoDB\Connection;
use Doctrine\ODM\MongoDB\Configuration;
use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ODM\MongoDB\DocumentRepository;
use Doctrine\ODM\MongoDB\Mapping\Driver\AnnotationDriver;

class Crowi
{
    /** @var DocumentManager $dm */
    private $dm;

    /**
     * @param array $options
     */
    public function __construct(array $options = [])
    {
        AnnotationDriver::registerAnnotationClasses();

        $options = array_merge([
            'mongodb_url' => 'mongodb://localhost/crowi',
            'password_seed' => 'this is default session secret',
            'temporary_dir' => sys_get_temp_dir() . '/crowi',
            'doctrine_configration' => null,
        ], $options);

        if (!$options['doctrine_configration'] instanceof Configuration) {
            $config = new Configuration();
            $config->setDefaultDB(trim(parse_url($options['mongodb_url'], PHP_URL_PATH), '/'));
            $config->setProxyDir($options['temporary_dir'] . '/Proxies');
            $config->setProxyNamespace('Proxies');
            $config->setHydratorDir($options['temporary_dir'] . '/Hydrators');
            $config->setHydratorNamespace('Hydrators');
            $config->setMetadataDriverImpl(AnnotationDriver::create(__DIR__ . '/Document'));
            $options['doctrine_configration'] = $config;
        }

        $this->dm = DocumentManager::create(
            new Connection($options['mongodb_url']), $options['doctrine_configration']);
    }

    /**
     * Get DocumentRepository (shortcut)
     *
     * @param string $documentName
     * @return DocumentRepository
     */
    public function __get($documentName)
    {
        return $this->getRepository($documentName);
    }

    /**
     * Get DocumentRepository
     *
     * @param string $documentName
     * @return DocumentRepository
     */
    public function getRepository($documentName)
    {
        return $this->dm->getRepository('Crowi\\Document\\' . $documentName);
    }

    /**
     * @return DocumentManager
     */
    public function getDocumentManager()
    {
        return $this->dm;
    }
}
