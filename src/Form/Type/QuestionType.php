<?php
/**
 * Created by PhpStorm.
 * User: zulkris
 * Date: 19.10.18
 * Time: 12:14
 */

namespace App\Form\Type;

use App\Entity\Question;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class QuestionType extends AbstractType //implements FormTypeInterface
{
  public function buildForm(FormBuilderInterface $builder, array $options)
  {
    $builder->add('title')
		->add('type')
      	->add('options', CollectionType::class, array(
          'entry_type' => OptionType::class,
		  'entry_options' => array('label' => false),
			'allow_add' => true,
			'allow_delete' => true,
			'prototype' => true,
			'attr' => array(
				'class' => 'my-selector',
			),
    ));
  }

  public function configureOptions(OptionsResolver $resolver)
  {
    $resolver->setDefaults(array(
      'data_class' => Question::class,
    ));
  }

	public function getBlockPrefix()
	{
		return 'QuestionType';
	}
}
