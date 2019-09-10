<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Report
 *
 * @ORM\Table(name="report")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ReportRepository")
 */
class Report
{

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     *
     * * Many Report have Many Fishes.
     * @ManyToMany(targetEntity="Fish")
     * @JoinTable(name="reports_fishes",
     *      joinColumns={@JoinColumn(name="report_id", referencedColumnName="id")},
     *      inverseJoinColumns={@JoinColumn(name="fish_id", referencedColumnName="id", unique=true)}
     *      )
     *
     *
     * @ManyToOne(targetEntity="Lake")
     * @JoinColumn(name="lake_id", referencedColumnName="id")
     */

    private $lake;

    private $id;

    private $fishes;

    public function __construct()
    {
        $this->fishes = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}

