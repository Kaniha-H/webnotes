<?php

namespace App\Entity;

use App\Repository\FeedbackFormRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FeedbackFormRepository::class)
 * @ORM\Table(name="support_feedback")
 */
class Feedback
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;
    
    
    // USER INFOS
    // --

    /**
     * @ORM\Column(type="string", length=40)
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=40)
     */
    private $lastname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=40, nullable=true)
     */
    private $phone;
    
    
    // FEEDBACK INFOS
    // --

    /**
     * @ORM\Column(type="string", columnDefinition="enum('comments', 'questions', 'bugreports', 'suggests')")
     */
    private $type;

    /**
     * @ORM\Column(type="text")
     */
    private $content;

    /**
     * @ORM\Column(type="string", nullable=false)
     */
    private $rate;


    // SECURITY INFOS
    // --

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $userAgent;

    /**
     * @ORM\Column(type="string", length=36)
     */
    private $ipAddress;
    
    
    // DATES
    // --

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $readAt;
    
    
    // BOOLEAN FLAGS
    // --

    /**
     * @ORM\Column(type="boolean")
     */
    private $isRead = false;


    // = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = =

    
    public function __construct()
    {
        $this->createdAt = new \DateTime('now');
    }

    // = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = =


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getResponse(): ?string
    {
        return $this->response;
    }

    public function setResponse(?string $response): self
    {
        $this->response = $response;

        return $this;
    }

    public function getResponseAt(): ?\DateTimeInterface
    {
        return $this->responseAt;
    }

    public function setResponseAt(\DateTimeInterface $responseAt): self
    {
        $this->responseAt = $responseAt;

        return $this;
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

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getRate(): ?string
    {
        return $this->rate;
    }

    public function setRate(?string $rate): self
    {
        $this->rate = $rate;

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

    public function getIpAddress(): ?string
    {
        return $this->ipAddress;
    }

    public function setIpAddress(string $ipAddress): self
    {
        $this->ipAddress = $ipAddress;

        return $this;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(string $location): self
    {
        $this->location = $location;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getReadAt(): ?\DateTimeInterface
    {
        return $this->readAt;
    }

    public function setReadAt(\DateTimeInterface $readAt): self
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

    public function getIsAgreeToPublish(): ?bool
    {
        return $this->isAgreeToPublish;
    }

    public function setIsAgreeToPublish(bool $isAgreeToPublish): self
    {
        $this->isAgreeToPublish = $isAgreeToPublish;

        return $this;
    }

    public function getLocationCity(): ?string
    {
        return $this->locationCity;
    }

    public function setLocationCity(?string $locationCity): self
    {
        $this->locationCity = $locationCity;

        return $this;
    }

    public function getLocationState(): ?string
    {
        return $this->locationState;
    }

    public function setLocationState(?string $locationState): self
    {
        $this->locationState = $locationState;

        return $this;
    }

    public function getLocationCountry(): ?string
    {
        return $this->locationCountry;
    }

    public function setLocationCountry(?string $locationCountry): self
    {
        $this->locationCountry = $locationCountry;

        return $this;
    }
}
