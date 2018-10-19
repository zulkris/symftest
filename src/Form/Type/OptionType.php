<?php
/**
 * Created by PhpStorm.
 * User: zulkris
 * Date: 19.10.18
 * Time: 12:12
 */

namespace App\Form\Type;

use App\Entity\Option;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OptionType extends AbstractType //implements FormTypeInterface
{
  public function buildForm(FormBuilderInterface $builder, array $options)
  {
    $builder->add('text')->add('is_right');
  }

  public function configureOptions(OptionsResolver $resolver)
  {
    $resolver->setDefaults(array(
      'data_class' => Option::class,
    ));
  }
}


