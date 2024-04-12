<?php

namespace App\Entity;

use App\Repository\QuestionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: QuestionRepository::class)]
class Question
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $questionText = null;

    #[ORM\Column]
    private ?int $answerOption = null;

    #[ORM\Column]
    private ?int $questionNumber = null;

    #[ORM\Column]
    private ?int $ageCategory = null;

    #[ORM\OneToMany(targetEntity: Survey::class, mappedBy: 'question')]
    private Collection $surveys;

    /**
     * @var Collection<int, SurveyAnswer>
     */
    #[ORM\OneToMany(targetEntity: SurveyAnswer::class, mappedBy: 'question')]
    private Collection $surveyAnswers;

    public function __construct()
    {
        $this->surveys = new ArrayCollection();
        $this->surveyAnswers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuestionText(): ?string
    {
        return $this->questionText;
    }

    public function setQuestionText(string $questionText): static
    {
        $this->questionText = $questionText;

        return $this;
    }

    public function getAnswerOption(): ?int
    {
        return $this->answerOption;
    }

    public function setAnswerOption(int $answerOption): static
    {
        $this->answerOption = $answerOption;

        return $this;
    }

    public function getQuestionNumber(): ?int
    {
        return $this->questionNumber;
    }

    public function setQuestionNumber(int $questionNumber): static
    {
        $this->questionNumber = $questionNumber;

        return $this;
    }

    public function getAgeCategory(): ?int
    {
        return $this->ageCategory;
    }

    public function setAgeCategory(int $ageCategory): static
    {
        $this->ageCategory = $ageCategory;

        return $this;
    }

    /**
     * @return Collection<int, Survey>
     */
    public function getSurveys(): Collection
    {
        return $this->surveys;
    }

    public function addSurvey(Survey $survey): static
    {
        if (!$this->surveys->contains($survey)) {
            $this->surveys->add($survey);
            $survey->setQuestion($this);
        }

        return $this;
    }

    public function removeSurvey(Survey $survey): static
    {
        if ($this->surveys->removeElement($survey)) {
            // set the owning side to null (unless already changed)
            if ($survey->getQuestion() === $this) {
                $survey->setQuestion(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, SurveyAnswer>
     */
    public function getSurveyAnswers(): Collection
    {
        return $this->surveyAnswers;
    }

    public function addSurveyAnswer(SurveyAnswer $surveyAnswer): static
    {
        if (!$this->surveyAnswers->contains($surveyAnswer)) {
            $this->surveyAnswers->add($surveyAnswer);
            $surveyAnswer->setQuestion($this);
        }

        return $this;
    }

    public function removeSurveyAnswer(SurveyAnswer $surveyAnswer): static
    {
        if ($this->surveyAnswers->removeElement($surveyAnswer)) {
            // set the owning side to null (unless already changed)
            if ($surveyAnswer->getQuestion() === $this) {
                $surveyAnswer->setQuestion(null);
            }
        }

        return $this;
    }
}
