<?php
namespace Volleyball\Bundle\CourseBundle\Entity;

use Volleyball\Bundle\UtilityBundle\Traits\SluggableTrait;
use Volleyball\Bundle\UtilityBundle\Traits\TimestampableTrait;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="Volleyball\Bundle\CourseBundle\Repository\RequirementRepository")
 * @ORM\Table(name="requirement")
 */
class Requirement
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
     * @ORM\Column(type="text")
     */
    protected $description;
    
    /**
     * @ORM\ManyToOne(targetEntity="Volleyball\Bundle\CourseBundle\Entity\Requirement", inversedBy="requirement")
     * @ORM\JoinColumn(name="parent_id", referencedColumnName="id")
     */
    protected $parent;
    
    /**
     * @ORM\ManyToOne(targetEntity="Volleyball\Bundle\CourseBundle\Entity\Course", inversedBy="requirement")
     * @ORM\JoinColumn(name="course_id", referencedColumnName="id")
     */
    protected $course;
    
    /**
     * Optional
     * @param  boolean        $optional optional
     * @return boolean|Course
     * @ORM\Column(name="optional", type="boolean")
     */
    protected $optional;

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
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @{inheritdocs}
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @{inheritdocs}
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * @{inheritdocs}
     */
    public function setParent(\Volleyball\Bundle\CourseBundle\Entity\Requirement $parent)
    {
        $this->parent = $parent;

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
    public function isOptional($optional = null)
    {
        if (null != $optional && is_bool($optional)) {
            $this->optional = $optional;

            return $this;
        }

        return $this->optional;
    }
}
