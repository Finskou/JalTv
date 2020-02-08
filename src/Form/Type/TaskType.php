<?php

namespace App\Form\Type;

use App\Entity\Task;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TaskType extends AbstractType 
{
  public function buildForm(FormBuilderInterface $builder, array $options)
  {
    $builder->add('title', TextType::class)
            ->add('content', TextareaType::class)
            ->add('image', TextType::class)
            ->add('createdAt', DateType::class)
            ->add('save', SubmitType::class);
  }

  public function configurationOptions(OptionsResolver $resolver)
  {
    $resolver->setDefaults([
      'data_class' => Task::class,
    ]);
  }
}
