<?php

namespace packages\UseCase\Memo\Dto;

class UsersMemoDto
{
    private int $memoId;
    private string $content;
    private \DateTime $createdAt;

    /**
     * UsersMemoDto constructor.
     * @param int $memoId
     * @param string $content
     * @param \DateTime $createdAt
     */
    public function __construct(int $memoId, string $content, \DateTime $createdAt)
    {
        $this->memoId = $memoId;
        $this->content = $content;
        $this->createdAt = $createdAt;
    }

    /**
     * @return int
     */
    public function getMemoId()
    {
        return $this->memoId;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }
}
