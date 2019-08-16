<?php


namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="users")
 */
class Users
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", lenght="255")
     */
    private $firstName;

    /**
     * @ORM\Column(type="string", lenght="255")
     */
    private $lastName;

    /**
     * @ORM\Column(type="int", lenght="11")
     */
    private $age;

    public function __toString()
    {
        $user_full_name = $this->getFirstName() . " " . $this->getLastName();

        return $user_full_name;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function setFirstName( string $firstName)
    {
        $this->firstName = $firstName;
        return $this;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function setLastName( string $lastName)
    {
        $this->firstName = $lastName;
        return $this;
    }

    public function getAge()
    {
        return $this->lastName;
    }

    public function setAge( int $age)
    {
        $this->age = $age;
        return $this;
    }
}
