<?php

namespace App\Entity;

use App\Repository\SurveyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SurveyRepository::class)]
class Survey
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'surveys')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Patient $patient = null;

    /**
     * @var Collection<int, SurveyAnswer>
     */
    #[ORM\OneToMany(targetEntity: SurveyAnswer::class, mappedBy: 'survey')]
    private Collection $surveyAnswer;

    #[ORM\ManyToOne(inversedBy: 'surveys')]
    private ?User $user = null;

    public function __construct()
    {
        $this->surveyAnswer = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPatient(): ?Patient
    {
        return $this->patient;
    }

    public function setPatient(?Patient $patient): static
    {
        $this->patient = $patient;

        return $this;
    }

    /**
     * @return Collection<int, SurveyAnswer>
     */
    public function getSurveyAnswer(): Collection
    {
        return $this->surveyAnswer;
    }

    public function addSurveyAnswer(SurveyAnswer $surveyAnswer): static
    {
        if (!$this->surveyAnswer->contains($surveyAnswer)) {
            $this->surveyAnswer->add($surveyAnswer);
            $surveyAnswer->setSurvey($this);
        }

        return $this;
    }

    public function removeSurveyAnswer(SurveyAnswer $surveyAnswer): static
    {
        if ($this->surveyAnswer->removeElement($surveyAnswer)) {
            // set the owning side to null (unless already changed)
            if ($surveyAnswer->getSurvey() === $this) {
                $surveyAnswer->setSurvey(null);
            }
        }

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }
}
