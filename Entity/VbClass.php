<?php
namespace Volleyball\Bundle\CourseBundle\Entity;

use Volleyball\Bundle\UtilityBundle\Traits\SluggableTrait;
use Volleyball\Bundle\UtilityBundle\Traits\TimestampableTrait;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;

use Vollyball\EnrollmentBundle\Entity\FacilityCourse;

/**
 * @ORM\Entity(repositoryClass="Volleyball\Bundle\CourseBundle\Repository\VbClassRepository")
 * @ORM\Table(name="volleyball_class")
 */
class VbClass
{
    use SluggableTrait;
    use TimestampableTrait;
    

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @ORM\Column(type="string")
     * @Assert\Length(
     *      min = "1",
     *      max = "250",
     *      minMessage = "Name must be at least {{ limit }} characters length",
     *      maxMessage = "Name cannot be longer than {{ limit }} characters length"
     * )
     */
    protected $name;
    
    /**
     * @ORM\ManyToOne(targetEntity="Volleyball\Bundle\EnrollmentBundle\Entity\FacilityCourse", inversedBy="classes")
     * @ORM\JoinColumn(name="facility_course_id", referencedColumnName="id")
     */
    protected $facilityCourse;
    
    /**
     * @ORM\ManyToOne(targetEntity="Volleyball\Bundle\FacilityBundle\Entity\Department", inversedBy="classes")
     * @ORM\JoinColumn(name="department_id", referencedColumnName="id")
     */
    protected $department;
    
    /**
     * @ORM\ManyToOne(targetEntity="Volleyball\Bundle\FacilityBundle\Entity\Faculty", inversedBy="classes")
     * @ORM\JoinColumn(name="faculty_id", referencedColumnName="id")
     */
    protected $faculty;
    
    /**
     * @ORM\ManyToOne(targetEntity="Volleyball\Bundle\CourseBundle\Entity\Course", inversedBy="classes")
     * @ORM\JoinColumn(name="course_id", referencedColumnName="id")
     */
    protected $course;
    
    /**
     * @ORM\Column(type="integer")
     */
    protected $capacity;
    
    /**
     * Enabled
     *
     * @param  boolean        $enabled enabled
     * @return boolean|Course
     */
    protected $enabled;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @{inheritdocs}
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @{inheritdocs}
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @{inheritdocs}
     */
    public function getFacilityCourse()
    {
        return $this->facilityCourse;
    }

    /**
     * @{inheritdocs}
     */
    public function setFacilityCourse(\Volleyball\Bundle\EnrollmentBundle\Entity\FacilityCourse $facilityCourse)
    {
        $this->facilityCourse = $facilityCourse;

        return $this;
    }

    /**
     * @{inheritdocs}
     */
    public function getDepartment()
    {
        return $this->department;
    }

    /**
     * @{inheritdocs}
     */
    public function setDepartment(\Volleyball\Bundle\FacilityBundle\Entity\Department $department)
    {
        $this->department = $department;

        return $this;
    }

    /**
     * @{inheritdocs}
     */
    public function getFaculty()
    {
        return $this->faculty;
    }

    /**
     * @{inheritdocs}
     */
    public function setFaculty(\Volleyball\Bundle\FacilityBundle\Entity\Faculty $faculty)
    {
        $this->faculty = $faculty;

        return $this;
    }

    /**
     * @{inheritdocs}
     */
    public function getCourse()
    {
        return $this->course;
    }
    
    /**
     * @{inheritdocs}
     */
    public function setCourse(\Volleyball\Bundle\CourseBundle\Entity\Course $course)
    {
        $this->course = $course;
        
        return $this;
    }

    /**
     * @{inheritdocs}
     */
    public function getCapacity()
    {
        return $this->capacity;
    }

    /**
     * @{inheritdocs}
     */
    public function setCapacity($capacity)
    {
        $this->capacity = $capacity;

        return $this;
    }

    /**
     * Is enabled
     * @param boolean|null $enabled
     * @return \Volleyball\Bundle\CourseBundle\Entity\VbClass
     */
    public function isEnabled($enabled = null)
    {
        if (null != $enabled && is_bool($enabled)) {
            $this->enabled = $enabled;

            return $this;
        }

        return $this->enabled;
    }
}
