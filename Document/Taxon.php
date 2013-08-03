<?php

namespace Rz\TaxonomiesBundle\Document;

use Rz\TaxonomiesBundle\Model\Taxon as BaseTaxon;

/**
 * Taxon document.
 *
 * @author Paweł Jędrzejewski <pjedrzejewski@diweb.pl>
 * @author Ivannis Suárez Jérez <ivannis.suarez@gmail.com>
 */
class Taxon extends BaseTaxon
{
    /**
     * Required by DoctrineExtensions.
     *
     * @var mixed
     */
    protected $left;

    /**
     * Required by DoctrineExtensions.
     *
     * @var mixed
     */
    protected $right;

    /**
     * Required by DoctrineExtensions.
     *
     * @var mixed
     */
    protected $level;

    public function getLeft()
    {
        return $this->left;
    }

    public function setLeft($left)
    {
        $this->left = $left;
    }

    public function getRight()
    {
        return $this->right;
    }

    public function setRight($right)
    {
        $this->right = $right;
    }

    public function getLevel()
    {
        return $this->level;
    }

    public function setLevel($level)
    {
        $this->level = $level;
    }
}
