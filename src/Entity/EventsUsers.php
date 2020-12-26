<?php

namespace App\Entity;

use App\Repository\EventsUsersRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EventsUsersRepository::class)
 */
class EventsUsers
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ip_user;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $user_agent;

    /**
     * @ORM\Column(type="string", length=2)
     */
    private $code_county;

    /**
     * @ORM\Column(type="string", length=6)
     */
    private $event_key;

    /**
     * @ORM\Column(type="datetime")
     * @ORM\OrderBy({"name" = "DESC"})
     */
    private $created_at;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updated_at;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIpUser(): ?string
    {
        return $this->ip_user;
    }

    public function setIpUser(string $ip_user): self
    {
        $this->ip_user = $ip_user;

        return $this;
    }

    public function getUserAgent(): ?string
    {
        return $this->user_agent;
    }

    public function setUserAgent(string $user_agent): self
    {
        $this->user_agent = $user_agent;

        return $this;
    }

    public function getCodeCounty(): ?int
    {
        return $this->code_county;
    }

    public function setCodeCounty(int $code_county): self
    {
        $this->code_county = $code_county;

        return $this;
    }

    public function getEventKey(): ?string
    {
        return $this->event_key;
    }

    public function setEventKey(string $event_key): self
    {
        $this->event_key = $event_key;

        return $this;
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }

    public function setCreatedAt(string $created_at): self
    {
        $this->created_at = new \DateTime($created_at);

        return $this;
    }

    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(string $updated_at): self
    {
        $this->updated_at = new \Datetime($updated_at);

        return $this;
    }
}
