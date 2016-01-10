<?php
namespace Volleyball\Bundle\CourseBundle\Controller;

class RequirementController extends \Volleyball\Bundle\UtilityBundle\Controller\Controller
{
    /**
     * Index action
     * @inheritdoc
     */
    public function indexAction(array $requirements)
    {
        return ['requirements' => $this->getRequirements()];
    }

    /**
     * New action
     * @inheritdoc
     */
    public function newAction()
    {
        $requirement = new \Volleyball\Bundle\CourseBundle\Entity\Requirement();
        $form = $this->createBoundObjectForm($requirement, 'new');

        if ($form->isBound() && $form->isValid()) {
            $this->persist($requirement, true);
            $this->addFlash('requirement created');

            return $this->redirectToRoute('volleyball_requirements_index');
        }

        return ['form' => $form->createView()];
    }
    
    /**
     * Search action
     * @inheritdoc
     */
    public function searchAction(array $requirements)
    {
        $requirement = new \Volleyball\Bundle\CourseBundle\Entity\Requirement();
        $form = $this->createBoundObjectForm($requirement, 'search');
        
        if ($form->isBound() && $form->isValid()) {
            /** @TODO finish requirement search, also restrict access */
            $requirements = array();

            return ['requirements' => $requirements];
        }

        return ['form' => $form->createView()];
    }
    
    /**
     * Show action
     * @inheritdoc
     */
    public function showAction(\Volleyball\Bundle\CourseBundle\Entity\Requirement $requirement)
    {
        return ['requirement' => $requirement];
    }


}
