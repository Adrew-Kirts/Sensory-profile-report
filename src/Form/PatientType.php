<?php

namespace App\Form;

use App\Entity\Patient;
use Doctrine\DBAL\Types\AsciiStringType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Event\PostSubmitEvent;
use Symfony\Component\Form\Event\PreSubmitEvent;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\String\Slugger\AsciiSlugger;

class PatientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
//            ->add('slug')
            ->add('first_name')
            ->add('last_name')
            ->add('birthdate', null, [
                'widget' => 'single_text',
            ])
            ->addEventListener(FormEvents::POST_SUBMIT, $this->autoSlug(...))
            ->addEventListener(FormEvents::POST_SUBMIT, $this->timestampGenerator(...))
        ;
    }

    public function timestampGenerator(PostSubmitEvent $event): void
    {
        $data = $event->getData();
        if (!($data instanceof Patient)){
            return;
        }
            $data->setUpdatedAt(new \DateTimeImmutable());
        if (!$data->getId()){
            $data->setCreatedAt(new \DateTimeImmutable());
        }
    }

//    public function autoSlug(PreSubmitEvent $event): void
//    {
//        $data = $event->getData();
//        if (empty($data['slug'])){
//            $slugger = new AsciiSlugger();
//            $data['slug'] = strtolower($slugger->slug($data['first_name']));
//            $event->setData($data);
//        }
//    }

    public function autoSlug(PostSubmitEvent $event): void
    {
        $data = $event->getData();
        if (!($data instanceof Patient)){
            return;
        }

        $slugger = new AsciiSlugger();
        $data->setSlug(strtolower($slugger->slug($data->getFirstName())));
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Patient::class,
        ]);
    }
}
