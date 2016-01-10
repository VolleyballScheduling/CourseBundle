<?php
namespace Volleyball\Bundle\CourseBundle\Controller;

class CourseController extends \Volleyball\Bundle\UtilityBundle\Controller\Controller
{
    /**
     * Index action
     * @inheritdoc
     */
    public function indexAction(array $courses)
    {
        return ['courses' => $this->getCourses()];
    }

    /**
     * New action
     * @inheritdoc
     */
    public function newAction()
    {
        $course = new \Volleyball\Bundle\CourseBundle\Entity\Course();
        $form = $this->createBoundObjectForm($course, 'new');

        if ($form->isBound() && $form->isValid()) {
            $this->persist($course, true);
            $this->addFlash('course created');

            return $this->redirectToRoute('volleyball_courses_index');
        }

        return ['form' => $form->createView()];
    }
    
    /**
     * Search action
     * @inheritdoc
     */
    public function searchAction(array $courses)
    {
        $course = new \Volleyball\Bundle\CourseBundle\Entity\Course();
        $form = $this->createBoundObjectForm($course, 'search');
        
        if ($form->isBound() && $form->isValid()) {
            /** @TODO finish course search, also restrict access */
            $courses = array();

            return ['courses' => $courses];
        }

        return ['form' => $form->createView()];
    }
    
    /**
     * Show action
     * @inheritdoc
     */
    public function showAction(\Volleyball\Bundle\CourseBundle\Entity\Course $course)
    {
        return ['course' => $course];
    }


}
