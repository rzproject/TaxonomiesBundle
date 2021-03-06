<?php

/*
 * This file is part of the RzTaxonomiesBundle package.
 *
 * (c) mell m. zamora <mell@rzproject.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Rz\TaxonomiesBundle\Model;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * Model for taxonomies.
 *
 * @author Paweł Jędrzejewski <pjedrzejewski@diweb.pl>
 */
class Taxonomy implements TaxonomyInterface
{
    /**
     * Taxonomy name.
     *
     * @var string
     */
    protected $name;

    /**
     * Root taxon.
     *
     * @var TaxonInterface
     */
    protected $root;

    /**
     * {@inheritdoc}
     */
    public function __toString()
    {
        return $this->getName() ?: '-';
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * {@inheritdoc}
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * {@inheritdoc}
     */
    public function getRoot()
    {
        return $this->root;
    }

    /**
     * {@inheritdoc}
     */
    public function setRoot(TaxonInterface $root)
    {
        $this->root = $root;
    }

    /**
     * {@inheritdoc}
     */
    public function getTaxons()
    {
        return $this->root->getChildren();
    }

    public function getTaxonsAsList()
    {
        $taxons = new ArrayCollection();

        foreach ($this->root->getChildren() as $child) {
            $taxons[] = $child;

            $this->getChildTaxons($child, $taxons);
        }

        return $taxons;
    }

    private function getChildTaxons(TaxonInterface $taxon, Collection $taxons)
    {
        foreach ($taxon->getChildren() as $child) {
            $taxons[] = $child;

            $this->getChildTaxons($child, $taxons);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function hasTaxon(TaxonInterface $taxon)
    {
        return $this->root->hasChild($taxon);
    }

    /**
     * {@inheritdoc}
     */
    public function addTaxon(TaxonInterface $taxon)
    {
        $this->root->addChild($taxon);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function removeTaxon(TaxonInterface $taxon)
    {
        $this->root->removeChild($taxon);

        return $this;
    }
}
