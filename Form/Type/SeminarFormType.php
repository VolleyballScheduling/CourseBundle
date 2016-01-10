<?php
namespace Volleyball\Bundle\CourseBundle\Form\Type;

class SeminarFormType extends \Symfony\Component\Form\AbstractType {
    public function buildForm(
        \Symfony\Component\Form\FormBuilderInterface $builder,
        array $options
    ) {
        $builder->add('name');
        $builder->add('course_enrollment');
        $builder->add('faculty');
        $builder->add('department');
    $builder->add('period');
    }

  public function getName() {
    return 'volleyball_seminar';
  }
}
