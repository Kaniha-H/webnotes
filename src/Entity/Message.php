<?php

namespace App\Entity;

use App\Repository\MessageRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MessageRepository::class)
 */
class Message
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    // USER INFO
    // --

    /**
     * @ORM\Column(type="string", length=80)
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=80)
     */
    private $lastname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;


    // MESSAGE INFO
    // --

    /**
     * @ORM\Column(type="text")
     */
    private $message;


    // DATES
    // --

    /**
     * @ORM\Column(type="datetime")
     */
    private $sendedAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $readAt;


    // BOOLEAN
    // --

    /**
     * @ORM\Column(type="boolean")
     */
    private $isRead = false;


    // SECURITY DATA
    // --

    /**
     * @ORM\Column(type="string", length=32)
     */
    private $ipAddress;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $userAgent;


    // = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = =

    public function __construct()
    {
        $this->sendedAt = new \DateTime;
    }

    // = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = =

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): self
    {
        $this->message = $message;

        return $this;
    }

    public function getSendedAt(): ?\DateTimeInterface
    {
        return $this->sendedAt;
    }

    public function setSendedAt(\DateTimeInterface $sendedAt): self
    {
        $this->sendedAt = $sendedAt;

        return $this;
    }

    public function getReadAt(): ?\DateTimeInterface
    {
        return $this->readAt;
    }

    public function setReadAt(?\DateTimeInterface $readAt): self
    {
        $this->readAt = $readAt;

        return $this;
    }

    public function getIsRead(): ?bool
    {
        return $this->isRead;
    }

    public function setIsRead(bool $isRead): self
    {
        $this->isRead = $isRead;

        return $this;
    }

    public function getIpAddress(): ?string
    {
        return $this->ipAddress;
    }

    public function setIpAddress(string $ipAddress): self
    {
        $this->ipAddress = $ipAddress;

        return $this;
    }

    public function getUserAgent(): ?string
    {
        return $this->userAgent;
    }

    public function setUserAgent(string $userAgent): self
    {
        $this->userAgent = $userAgent;

        return $this;
    }
}
