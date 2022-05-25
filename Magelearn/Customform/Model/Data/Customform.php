<?php
declare(strict_types=1);

namespace Magelearn\Customform\Model\Data;

use Magelearn\Customform\Api\Data\CustomformInterface;

class Customform extends \Magento\Framework\Api\AbstractExtensibleObject implements CustomformInterface
{

    public function getId()
    {
        return $this->_get(self::ID);
    }


    public function setId($id)
    {
        return $this->setData(self::ID, $id);
    }

    public function getExtensionAttributes()
    {
        return $this->_getExtensionAttributes();
    }


    public function setExtensionAttributes(
        \Magelearn\Customform\Api\Data\CustomformExtensionInterface $extensionAttributes
    ) {
        return $this->_setExtensionAttributes($extensionAttributes);
    }


    public function getFirstName()
    {
        return $this->_get(self::FIRST_NAME);
    }


    public function setFirstName($firstName)
    {
        return $this->setData(self::FIRST_NAME, $firstName);
    }



    public function getLastName()
    {
        return $this->_get(self::LAST_NAME);
    }

    public function setLastName($lastName)
    {
        return $this->setData(self::LAST_NAME, $lastName);
    }


    public function getEmail()
    {
        return $this->_get(self::EMAIL);
    }

    public function setEmail($email)
    {
        return $this->setData(self::EMAIL, $email);
    }

    public function getMessage()
    {
        return $this->_get(self::MESSAGE);
    }


    public function setMessage($message)
    {
        return $this->setData(self::MESSAGE, $message);
    }


    public function getStatus()
    {
        return $this->_get(self::STATUS);
    }


    public function setStatus($status)
    {
        return $this->setData(self::STATUS, $status);
    }

    public function getCreatedAt()
    {
        return $this->_get(self::CREATED_AT);
    }


    public function setCreatedAt($createdAt)
    {
        return $this->setData(self::CREATED_AT, $createdAt);
    }


    public function getPhone()
    {
        return $this->_get(self::PHONE);
    }

    public function setPhone($phone)
    {
        return $this->setData(self::PHONE, $phone);
    }
}

