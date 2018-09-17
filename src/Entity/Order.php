<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\OrderRepository")
 */
class Order
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $date_create;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $status;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $status_payments;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $user;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $order_price;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\OrderItem", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $orderitem;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateCreate(): ?string
    {
        return $this->date_create;
    }

    public function setDateCreate(string $date_create): self
    {
        $this->date_create = $date_create;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getStatusPayments(): ?string
    {
        return $this->status_payments;
    }

    public function setStatusPayments(string $status_payments): self
    {
        $this->status_payments = $status_payments;

        return $this;
    }

    public function getUser(): ?string
    {
        return $this->user;
    }

    public function setUser(string $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getOrderPrice(): ?string
    {
        return $this->order_price;
    }

    public function setOrderPrice(string $order_price): self
    {
        $this->order_price = $order_price;

        return $this;
    }

    public function getOrderitem(): ?OrderItem
    {
        return $this->orderitem;
    }

    public function setOrderitem(OrderItem $orderitem): self
    {
        $this->orderitem = $orderitem;

        return $this;
    }
}
