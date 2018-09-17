<?php

namespace App\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use phpDocumentor\Reflection\Types\Parent_;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */

{
    class User extends BaseUser
    {
        /**
         * @ORM\Id
         * @ORM\Column(type="integer")
         * @ORM\GeneratedValue(strategy="AUTO")
         */
        protected $id;

        /**
         * @ORM\Column(type="string", length=255)
         */
        private $first_name;

        /**
         * @ORM\Column(type="string", length=255)
         */
        private $last_name;

        /**
         * @ORM\Column(type="string", length=255)
         */
        private $address;

        public function getId(): ?int
        {
            return $this->id;
        }

        public function __construct()
        {
            parent::__construct();

            $this->first_name = '';
            $this->last_name = '';
            $this->address = '';
        }

        public function getFirstName(): ?string
        {
            return $this->first_name;
        }

        public function setFirstName(string $first_name): self
        {
            $this->first_name = $first_name;

            return $this;
        }

        public function getLastName(): ?string
        {
            return $this->last_name;
        }

        public function setLastName(string $last_name): self
        {
            $this->last_name = $last_name;

            return $this;
        }

        public function getAddress(): ?string
        {
            return $this->address;
        }

        public function setAddress(string $address): self
        {
            $this->address = $address;

            return $this;
        }
    }


}