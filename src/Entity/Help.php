<?php

namespace App\Entity;

use App\Repository\HelpRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=HelpRepository::class)
 * @ORM\Table(name="support_help")
 */
class Help
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    // QUESTION INFOS

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $question;

    /**
     * @ORM\Column(type="text")
     */
    private $answer;


    // COUNTERS
    // --

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $readCounter = 0;

    /**
     * @ORM\Column(type="integer")
     */
    private $positiveRate = 0;

    /**
     * @ORM\Column(type="integer")
     */
    private $negativeRate = 0;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuestion(): ?string
    {
        return $this->question;
    }

    public function setQuestion(string $question): self
    {
        $this->question = $question;

        return $this;
    }

    public function getAnswer(): ?string
    {
        return $this->answer;
    }

    public function setAnswer(string $answer): self
    {
        $this->answer = $answer;

        return $this;
    }

    public function getReadCounter(): ?int
    {
        return $this->readCounter;
    }

    public function setReadCounter(): self
    {
        $this->readCounter++;

        return $this;
    }

    public function getPositiveRate(): ?int
    {
        return $this->positiveRate;
    }

    public function setPositiveRate(int $positiveRate): self
    {
        $this->positiveRate = $positiveRate;

        return $this;
    }

    public function getNegativeRate(): ?int
    {
        return $this->negativeRate;
    }

    public function setNegativeRate(int $negativeRate): self
    {
        $this->negativeRate = $negativeRate;

        return $this;
    }
}
