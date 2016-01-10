<?php
namespace Volleyball\Bundle\CourseBundle\Form\Type;

class RequirementType extends \Symfony\Component\Form\AbstractType
{
    public function buildForm(
      \Symfony\Component\Form\FormBuilderInterface $builder,
      array $options
    ) {
        $builder->add('name');
        $builder->add('optional');
        $builder->add('parent');
        $builder->add('text');
    }

    public function getName() {
        return 'requirement';
    }
}
