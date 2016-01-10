<?php
namespace Volleyball\Bundle\CourseBundle\Form\Type;

class CourseType extends \Symfony\Component\Form\AbstractType
{
    public function buildForm(
        \Symfony\Component\Form\FormBuilderInterface $builder,
        array $options
    ) {
        $builder->add('name');
    }

    public function getName() {
        return 'course';
    }
}
