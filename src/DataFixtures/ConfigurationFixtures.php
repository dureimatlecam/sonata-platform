<?php

namespace App\DataFixtures;

use App\Entity\Configuration;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Contracts\Translation\TranslatorInterface;

class ConfigurationFixtures extends Fixture
{
    protected $start = 'CONF_';

    protected $translator;

    public function __construct(TranslatorInterface $translator)
    {
        $this->translator = $translator;
    }

    public function load(ObjectManager $manager)
    {
        // Create configuration for list valid IP for maintenance
        $config = new Configuration;
        $config->setName($this->start.'MAINTENANCE_IP_VALID');
        $config->setValue('::1,127.0.0.1');
        $config->setTitle($this->translator->trans('configuration.filters.ip', [], 'fixtures'));
        $manager->persist($config);

        // Create configuration for status maintenance
        $config = new Configuration;
        $config->setName($this->start.'MAINTENANCE_STATUS');
        $config->setValue(1);
        $config->setTitle($this->translator->trans('configuration.enable.disable.ip', [], 'fixtures'));
        $config->setType('boolean');
        $manager->persist($config);

        // Create configuration for SEO home title
        $config = new Configuration;
        $config->setName($this->start.'SEO_HOME_TITLE');
        $config->setValue($this->translator->trans('seo.home.value.title', [], 'fixtures'));
        $config->setTitle($this->translator->trans('seo.home.title.title', [], 'fixtures'));
        $manager->persist($config);

        // Create configuration for SEO home description
        $config = new Configuration;
        $config->setName($this->start.'SEO_HOME_DESCRIPTION');
        $config->setValue($this->translator->trans('seo.home.value.description', [], 'fixtures'));
        $config->setTitle($this->translator->trans('seo.home.title.description', [], 'fixtures'));
        $manager->persist($config);

        // Create configuration for SEO home keywords
        $config = new Configuration;
        $config->setName($this->start.'SEO_HOME_KEYWORDS');
        $config->setTitle($this->translator->trans('seo.home.title.keywords', [], 'fixtures'));
        $manager->persist($config);

        // Create configuration for SEO home indexation
        $config = new Configuration;
        $config->setName($this->start.'SEO_HOME_INDEXATION');
        $config->setValue(1);
        $config->setTitle($this->translator->trans('seo.home.title.indexation', [], 'fixtures'));
        $config->setType('boolean');
        $manager->persist($config);

        $manager->flush();
    }
}
