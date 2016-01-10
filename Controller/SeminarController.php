<?php
namespace Volleyball\Bundle\CourseBundle\Controller;

class SeminarController extends \Volleyball\Bundle\UtilityBundle\Controller\Controller
{
    /**
     * Index action
     * @inheritdoc
     */
    public function indexAction(array $seminars)
    {
        return ['seminars' => $this->getSeminars()];
    }

    /**
     * New action
     * @inheritdoc
     */
    public function newAction()
    {
        $seminar = new \Volleyball\Bundle\CourseBundle\Entity\Seminar();
        $form = $this->createBoundObjectForm($seminar, 'new');

        if ($form->isBound() && $form->isValid()) {
            $this->persist($seminar, true);
            $this->addFlash('seminar created');

            return $this->redirectToRoute('volleyball_seminars_index');
        }

        return ['form' => $form->createView()];
    }
    
    /**
     * Search action
     * @inheritdoc
     */
    public function searchAction(array $seminars)
    {
        $seminar = new \Volleyball\Bundle\CourseBundle\Entity\Seminar();
        $form = $this->createBoundObjectForm($seminar, 'search');
        
        if ($form->isBound() && $form->isValid()) {
            /** @TODO finish seminar search, also restrict access */
            $seminars = array();

            return ['seminars' => $seminars];
        }

        return ['form' => $form->createView()];
    }
    
    /**
     * Show action
     * @inheritdoc
     */
    public function showAction(\Volleyball\Bundle\CourseBundle\Entity\Seminar $seminar)
    {
        return ['seminar' => $seminar];
    }


}
