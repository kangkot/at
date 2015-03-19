<?php

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\HasLifecycleCallbacks;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\PrePersist;
use Doctrine\ORM\Mapping\PreUpdate;

/**
 * @Entity
 * @HasLifecycleCallbacks
 */
class User {

    /**
     * @Id @Column(type="integer")
     * @GeneratedValue
     * @var int
     */
    private $id;
    
    /**
     * @Column(type="datetime")
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @Column(type="datetime")
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @PrePersist
     * @PreUpdate
     */
    public function updateEntityDateTimes()
    {
        $this->setUpdatedAt(new \DateTime());
        (null === $this->createdAt) && $this->setCreatedAt(new \DateTime());
    }

}
