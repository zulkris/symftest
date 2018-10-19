<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TestRepository")
 */
class Test
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Question", mappedBy="test_id")
     */
    private $question_id;

    public function __construct()
    {
        $this->question_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|Question[]
     */
    public function getQuestionId(): Collection
    {
        return $this->question_id;
    }

    public function addQuestionId(Question $questionId): self
    {
        if (!$this->question_id->contains($questionId)) {
            $this->question_id[] = $questionId;
            $questionId->addTestId($this);
        }

        return $this;
    }

    public function removeQuestionId(Question $questionId): self
    {
        if ($this->question_id->contains($questionId)) {
            $this->question_id->removeElement($questionId);
            $questionId->removeTestId($this);
        }

        return $this;
    }
}
