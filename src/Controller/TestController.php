<?php

namespace App\Controller;

use App\Entity\Question;
use App\Entity\Option;
use App\Form\Type\OptionType;
use App\Form\Type\QuestionType;
use Sonata\CoreBundle\Form\Type\BooleanType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormFactoryBuilder;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


class TestController extends AbstractController
{
    /**
     * @Route("/tests", methods={"GET"}, name="show_tests")
     */
    public function showAction()
    {
        return $this->render('test/index.html.twig', [
            'controller_name' => 'TestController'
        ]);
    }

  /**
   * @Route("/tests/new", methods={"GET"}, name="new_test")
   */
    public function newAction(Request $request)
    {

      $question = new Question();

      // dummy code - this is here just so that the Task has some tags
      // otherwise, this isn't an interesting example
      $option = new Option();
      $option->setText('text1');
      $question->getOptions()->add($option);
      $option2 = new Option();
      $option2->setText('text2');
      $question->getOptions()->add($option2);
      // end dummy code



		$form = $this->createForm(QuestionType::class, $question);
		$form->handleRequest($request);

		$formTest = $this->createFormBuilder()
		$formTest->handleRequest($request);

      if ($form->isSubmitted() && $form->isValid()) {
        // ... maybe do some form processing, like saving the Task and Tag objects
      }

      return $this->render('test/new.html.twig', array(

        'form' => $form->createView(),

      ));
    }
}
