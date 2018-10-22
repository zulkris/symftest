<?php
/**
 * Created by PhpStorm.
 * User: zulkris
 * Date: 22.10.18
 * Time: 13:35
 */

namespace App\Controller;

use App\Entity\Question;
use App\Entity\Option;
use App\Form\Type\OptionType;
use App\Form\Type\QuestionType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class QuestionController extends AbstractController
{

  /**
   * @Route("/question/new", methods={"GET"}, name="new_question")
   */
  public function newQuestion(Request $request)
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

    //$formTest = $this->createFormBuilder();
    //$formTest->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
      // ... maybe do some form processing, like saving the Task and Tag objects
    }

    return $this->render('question/new.html.twig', array(

      'form' => $form->createView(),

    ));
  }


}