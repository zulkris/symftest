<?php
/**
 * Created by PhpStorm.
 * User: zulkris
 * Date: 22.10.18
 * Time: 14:15
 */

namespace App\Controller;

use App\Entity\Option;
use App\Entity\Question;
use App\Entity\Test;
use Doctrine\Bundle\DoctrineCacheBundle\Tests\DependencyInjection\AbstractDoctrineCacheExtensionTest;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Console\Tests\Descriptor\ObjectsProvider;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\Mapping as ORM;


class TestController extends AbstractController
{

  /**
   * @Route("/tests/fake", name="fake_tests", methods={"POST"})
   */
  public function fakeTests() {


    $option1 = new Option();
    $option1->setText('Зубная фея');
    $option1->setIsRight(false);
    $option2 = new Option();
    $option2->setText('Спанч-Боб');
    $option2->setIsRight(true);
    $option3 = new Option();
    $option3->setText('Змей Горыныч');
    $option3->setIsRight(false);

    $question = new Question();
    $question->setType('radio');
    $question->setTitle('Кто обитает на дне океана?');
    $option1->setQuestionId($question->getId());
    $option2->setQuestionId($question->getId());
    $option3->setQuestionId($question->getId());
    $question->addOption($option1)->addOption($option2)->addOption($option3);
    //$option1->setQuestionId($question->getId());
    //$option2->setQuestionId($question->getId());
    //$option3->setQuestionId($question->getId());
/*
    $question2 = new Question();
    $question2->setType('radio');
    $question2->setTitle('У кого один рог?');
    $option11 = new Option();
    $option11->setText('Единорог');
    $option22 = new Option();
    $option22->setText('Чебурашка');
    $option33 = new Option();
    $option33->setText('Прораб');

    $question2->addOption($option11)->addOption($option22)->addOption($option33);
*/
    $test = new Test();
    $question->setTestId($test->getId());
    $test->setName('Тест на знание выдуманных зверей');
    $test->addQuestion($question);

    $entityManager = $this->getDoctrine()->getManager();
    $entityManager->persist($test);

    $entityManager->flush();




    return $this->redirect('/admin', 201);
  }
}