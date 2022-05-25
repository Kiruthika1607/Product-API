<?php
declare(strict_types=1);

namespace Magelearn\Customform\Api\Data;

interface CustomformInterface extends \Magento\Framework\Api\ExtensibleDataInterface
{
	const ID = 'id';
    const MESSAGE = 'message';
    const FIRST_NAME = 'first_name';
	const LAST_NAME = 'last_name';
    const CREATED_AT = 'created_at';
    const EMAIL = 'email';
    const PHONE = 'phone';
	const STATUS = 'status';
    public function getId();

    public function setId($id);

//    public function getExtensionAttributes();

    public function setExtensionAttributes(
        \Magelearn\Customform\Api\Data\CustomformExtensionInterface $extensionAttributes
    );

    public function getFirstName();

    public function setFirstName($firstName);

    public function getLastName();

    public function setLastName($lastName);

    public function getEmail();

    public function setEmail($email);

    public function getPhone();

    public function setPhone($phone);

    public function getMessage();

    public function setMessage($message);

    public function getStatus();

    public function setStatus($status);

    public function getCreatedAt();

    public function setCreatedAt($createdAt);
}

