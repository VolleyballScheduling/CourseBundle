<?php
namespace Volleyball\Bundle\CourseBundle\Form\Type;

class RequirementSearchFormType extends \Volleyball\Bundle\UtilityBundle\Form\Type\SearchFormType
{
    public function buildForm(
        \Symfony\Component\Form\FormBuilderInterface $builder,
        array $options)
    {
        $builder->add('name');
    }
    
    public function setDefaultOptions(\Symfony\Component\OptionsResolver\OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Volleyball\Bundle\CourseBundle\Entity\Requirement'
        ));
    }

    public function getName()
    {
        return 'requirement_search';
    }
}
