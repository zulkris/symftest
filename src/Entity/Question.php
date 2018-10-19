<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\QuestionRepository")
 */
class Question
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
    private $title;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Test", inversedBy="question_id")
     */
    private $test_id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Option", mappedBy="question_id", orphanRemoval=true)
     */
    private $options;

    public function __construct()
    {
        $this->test_id = new ArrayCollection();
        $this->options = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
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

    /**
     * @return Collection|Test[]
     */
    public function getTestId(): Collection
    {
        return $this->test_id;
    }

    public function addTestId(Test $testId): self
    {
        if (!$this->test_id->contains($testId)) {
            $this->test_id[] = $testId;
        }

        return $this;
    }

    public function removeTestId(Test $testId): self
    {
        if ($this->test_id->contains($testId)) {
            $this->test_id->removeElement($testId);
        }

        return $this;
    }

    /**
     * @return Collection|Option[]
     */
    public function getOptions(): Collection
    {
        return $this->options;
    }

    public function addOption(Option $option): self
    {
        if (!$this->options->contains($option)) {
            $this->options[] = $option;
            $option->setQuestionId($this);
        }

        return $this;
    }

    public function removeOption(Option $option): self
    {
        if ($this->options->contains($option)) {
            $this->options->removeElement($option);
            // set the owning side to null (unless already changed)
            if ($option->getQuestionId() === $this) {
                $option->setQuestionId(null);
            }
        }

        return $this;
    }

}
