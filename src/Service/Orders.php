<?php
/**
 * Created by PhpStorm.
 * User: skillup_student
 * Date: 24.09.18
 * Time: 19:09
 */

namespace App\Service;


use App\Entity\Order;
use App\Entity\OrderItem;
use App\Entity\Product;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\ORM\TransactionRequiredException;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class Orders
{
    const CART_SESSION_NAME = 'shoppingCartId';
    /**
     * @var EntityManager
     */
    private $em;

    /**
     * @var SessionInterface
     */

    public function __construct(EntityManagerInterface $entityManager, SessionInterface $session)
    {
        $this->em = $entityManager;
        $this->session = $session;
    }

    /**
     * @param Product $product
     * @param int $quatity
     *
     * @throws ORMException
     * @throws OptimisticLockException
     * @throws TransactionRequiredException
     */

    public function addToCart(Product $product, $quantity = 1)
    {
        $order = $this->getCartFormSession();
        $items = $order->getItems();

        if (isset($items[$product->getId()])) {
            $item = $items[$product->getId()];
            $item->addQuantity($quantity);
        } else {
            $item = new OrderItem();
            $item->setProduct($product);
            $item->setNumberOfOrderedItems($quantity);
            $order->addItem($item);
        }

        $this->saveCart($order);

    }

    private function getCartFormSession()
    {
        $orderId = $this->session->get('shoppingCartId');

        if ($orderId) {
            /**@var Order $order */
            $order = $this->em->find(Order::class, $orderId);
        } else {
            $order = null;
        }

        if (!$order) {
            $order = new Order();
        }

        return $order;
    }

    private function saveCart(Order $order)
    {

        $this->em->persist($order);
        $this->em->flush();
        $this->session->set(self::CART_SESSION_NAME, $order->getId());
    }

}