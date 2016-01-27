<?php

namespace Crowi\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * @ODM\Document(collection="pages")
 */
class Page
{
    /** @const integer */
    const GRANT_PUBLIC = 1;

    /** @const integer */
    const GRANT_RESTRICTED = 2;

    /** @const integer */
    const GRANT_SPECIFIED = 3;

    /** @const integer */
    const GRANT_OWNER = 4;

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
    private $path;

    /**
     * @var Revision
     *
     * @ODM\ReferenceOne(targetDocument="Revision", simple=true)
     */
    private $revision;

    /**
     * @var string
     *
     * @ODM\String
     */
    private $redirectTo;

    /**
     * @var int
     *
     * @ODM\Int
     */
    private $grant;

    /**
     * @var array
     *
     * @ODM\ReferenceMany(targetDocument="User")
     */
    private $grantedUsers = [];

    /**
     * @var User
     *
     * @ODM\ReferenceOne(targetDocument="User", simple=true)
     */
    private $creator;

    /**
     * @var array
     *
     * @ODM\ReferenceMany(targetDocument="User")
     */
    private $liker = [];

    /**
     * @var array
     *
     * @ODM\ReferenceMany(targetDocument="User")
     */
    private $seenUsers = [];

    /**
     * @var \DateTime
     *
     * @ODM\Date
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ODM\Date
     */
    private $updatedAt;

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
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @return Revision
     */
    public function getRevision()
    {
        return $this->revision;
    }

    /**
     * @return string
     */
    public function getRedirectTo()
    {
        return $this->redirectTo;
    }

    /**
     * @return int
     */
    public function getGrant()
    {
        return $this->grant;
    }

    /**
     * @return array
     */
    public function getGrantedUsers()
    {
        return $this->grantedUsers;
    }

    /**
     * @return User
     */
    public function getCreator()
    {
        return $this->creator;
    }

    /**
     * @return array
     */
    public function getLiker()
    {
        return $this->liker;
    }

    /**
     * @return array
     */
    public function getSeenUsers()
    {
        return $this->seenUsers;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @return bool
     */
    public function isPublic()
    {
        return !$this->grant || $this->grant === self::GRANT_PUBLIC;
    }

    /**
     * @param User $user
     *
     * @return bool
     */
    public function isCreator(User $user)
    {
        return $this->creator->getId() === $user->getId();
    }

    /**
     * @param User $user
     *
     * @return bool
     */
    public function isGrantedFor(User $user)
    {
        if ($this->isPublic() || $this->isCreator($user)) {
            return true;
        }

        return false;
    }
}
