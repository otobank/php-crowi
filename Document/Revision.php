<?php

namespace Crowi\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * @ODM\Document(collection="revisions")
 */
class Revision
{
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
     * @var string
     *
     * @ODM\String
     */
    private $body;

    /**
     * @var string
     *
     * @ODM\String
     */
    private $format;

    /**
     * @var User
     *
     * @ODM\ReferenceOne(targetDocument="User", simple=true)
     */
    private $author;

    /**
     * @var \DateTime
     *
     * @ODM\Date
     */
    private $createdAt;

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
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @return string
     */
    public function getFormat()
    {
        return $this->format;
    }

    /**
     * @return User
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }
}
