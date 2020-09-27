<?php

namespace packages\Domain\Domain\Memo;

class Memo
{
    private int $id;
    private int $userId;
    private string $content;
    private \DateTime $createdAt;

    /**
     * Memo constructor.
     * @param int $id
     * @param int $userId
     * @param string $content
     * @param \DateTime $createdAt
     */
    public function __construct(int $id, int $userId, string $content, \DateTime $createdAt)
    {
        $this->id = $id;
        $this->userId = $userId;
        $this->content = $content;
        $this->createdAt = $createdAt;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }
}
