<?php

namespace Crowi\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * @ODM\Document(collection="users")
 */
class User
{
    /** @const integer */
    const STATUS_REGISTERED = 1;

    /** @const integer */
    const STATUS_ACTIVE = 2;

    /** @const integer */
    const STATUS_SUSPENDED = 3;

    /** @const integer */
    const STATUS_DELETED = 4;

    /** @const integer */
    const STATUS_INVITED = 5;

    /**
     * @var string
     *
     * @ODM\Id
     */
    private $id;

    /**
     * @var string
     *
     * @ODM\String
     */
    private $userId;

    /**
     * @var string
     *
     * @ODM\String
     */
    private $fbId;

    /**
     * @var string
     *
     * @ODM\String
     */
    private $image;

    /**
     * @var string
     *
     * @ODM\String
     */
    private $googleId;

    /**
     * @var string
     *
     * @ODM\String
     */
    private $name;

    /**
     * @var string
     *
     * @ODM\String
     */
    private $username;

    /**
     * @var string
     *
     * @ODM\String
     */
    private $email;

    /**
     * @var string
     *
     * @ODM\String
     */
    private $password;

    /**
     * @var integer
     *
     * @ODM\Int
     */
    private $status = self::STATUS_ACTIVE;

    /**
     * @var \DateTime
     *
     * @ODM\Date
     */
    private $createdAt;

    /**
     * @var boolean
     *
     * @ODM\Boolean
     */
    private $admin = false;

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @return string
     */
    public function getFbId()
    {
        return $this->fbId;
    }

    /**
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @return string
     */
    public function getGoogleId()
    {
        return $this->googleId;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return integer
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @return boolean
     */
    public function getAdmin()
    {
        return $this->admin;
    }
}
