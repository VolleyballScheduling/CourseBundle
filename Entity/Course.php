<?php
namespace Volleyball\Bundle\CourseBundle\Entity;

use \Doctrine\ORM\Mapping as ORM;
use \Gedmo\Mapping\Annotation as Gedmo;
use \Symfony\Component\Validator\Constraints as Assert;
use \Doctrine\Common\Collections\ArrayCollection;

use \Volleyball\Bundle\UtilityBundle\Traits\SluggableTrait;
use \Volleyball\Bundle\UtilityBundle\Traits\TimestampableTrait;

/**
 * @ORM\Entity(repositoryClass="Volleyball\Bundle\CourseBundle\Repository\CourseRepository")
 * @ORM\Table(name="course")
 */
class Course implements \Volleyball\Component\Course\Interfaces\CourseInterface
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
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

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
     * @ORM\ManyToMany(targetEntity="Volleyball\Bundle\OrganizationBundle\Entity\Organization", inversedBy="courses")
     * @ORM\JoinTable(name="courses_organizations")
     */
    protected $organizations;

    /**
     * @ORM\ManyToMany(targetEntity="Volleyball\Bundle\OrganizationBundle\Entity\Council", inversedBy="courses")
     * @ORM\JoinTable(name="courses_councils")
     */
    protected $councils;
    
    /**
     * @ORM\ManyToOne(targetEntity="Volleyball\Bundle\OrganizationBundle\Entity\Region", inversedBy="courses")
     * @ORM\JoinTable(name="courses_regions")
     */
    protected $regions;
    
    /**
     * @ORM\OneToMany(targetEntity="Volleyball\Bundle\CourseBundle\Entity\VbClass", mappedBy="course")
     */
    protected $classes;
    
    /**
     * @ORM\OneToMany(targetEntity="Volleyball\Bundle\CourseBundle\Entity\Requirement", mappedBy="course")
     */
    protected $requirements;
    

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
    public function getOrganizations()
    {
        return $this->organizations;
    }
    
    /**
     * @{inheritdocs}
     */
    public function getOrganization($organization)
    {
        return $this->organizations->get($organization);
    }
    
    /**
     * @{inheritdocs}
     */
    public function setOrganizations(array $organizations)
    {
        if (!$this->organizations instanceof ArrayCollection) {
            $organizations = new ArrayCollection($organizations);
        }
        
        $this->organizations = $organizations;
        
        return $this;
    }

    /**
     * @{inheritdocs}
     */
    public function addOrganization(\Volleyball\Bundle\OrganizationBundle\Entity\Organization $organization)
    {
        $this->organizations->add($organization);

        return $this;
    }
    
    /**
     * Remove organization
     * @param mixed $organization
     * @return \Volleyball\Bundle\CourseBundle\Entity\Course
     */
    public function removeOrganization($organization)
    {
        $this->organizations->remove($organization);

        return $this;
    }
    
    /**
     * @{inheritdocs}
     */
    public function getCouncils()
    {
        return $this->councils;
    }
    
    /**
     * @{inheritdocs}
     */
    public function getCouncil($council)
    {
        return $this->councils->get($council);
    }
    
    /**
     * @{inheritdocs}
     */
    public function setCouncils(array $councils)
    {
        if (!$this->councils instanceof ArrayCollection) {
            $councils = new ArrayCollection($councils);
        }
        
        $this->councils = $councils;
        
        return $this;
    }

    /**
     * @{inheritdocs}
     */
    public function addCouncil(\Volleyball\Bundle\OrganizationBundle\Entity\Council $council)
    {
        $this->councils->add($council);

        return $this;
    }
    
    /**
     * Remove council
     * @param mixed $council
     * @return \Volleyball\Bundle\CourseBundle\Entity\Course
     */
    public function removeCouncil($council)
    {
        $this->councils->remove($council);

        return $this;
    }
    
    /**
     * @{inheritdocs}
     */
    public function getRegions()
    {
        return $this->regions;
    }
    
    /**
     * @{inheritdocs}
     */
    public function getRegion($region)
    {
        return $this->regions->get($region);
    }
    
    /**
     * @{inheritdocs}
     */
    public function setRegions(array $regions)
    {
        if (!$this->regions instanceof ArrayCollection) {
            $regions = new ArrayCollection($regions);
        }
        
        $this->regions = $regions;
        
        return $this;
    }

    /**
     * @{inheritdocs}
     */
    public function addRegion(\Volleyball\Bundle\OrganizationBundle\Entity\Region $region)
    {
        $this->regions->add($region);

        return $this;
    }
    
    /**
     * Remove region
     * @param mixed $region
     * @return \Volleyball\Bundle\CourseBundle\Entity\Course
     */
    public function removeRegion($region)
    {
        $this->regions->remove($region);

        return $this;
    }

    /**
     * @{inheritdocs}
     */
    public function getVbClasses()
    {
        return $this->classes;
    }

    /**
     * @{inheritdocs}
     */
    public function setVbClasses(array $classes)
    {
        if (! $classes instanceof ArrayCollection) {
            $classes = new ArrayCollection($classes);
        }

        $this->classes = $classes;

        return $this;
    }

    /**
     * @{inheritdocs}
     */
    public function hasVbClasses()
    {
        return !$this->classes->isEmpty();
    }

    /**
     * @{inheritdocs}
     */
    public function getVbClass($class)
    {
        return $this->classes->get($class);
    }

    /**
     * @{inheritdocs}
     */
    public function addVbClass(\Volleyball\Bundle\CourseBundle\Entity\VbClass $class)
    {
        $this->classes->add($class);

        return $this;
    }

    /**
     * Remove a class
     *
     * @param mixed $class class
     *
     * @return self
     */
    public function removeVbClass($class)
    {
        $this->classes->remove($class);

        return $this;
    }

    /**
     * @{inheritdocs}
     */
    public function getRequirements()
    {
        return $this->requirements;
    }

    /**
     * @{inheritdocs}
     */
    public function setRequirements(array $requirements)
    {
        if (! $requirements instanceof ArrayCollection) {
            $requirements = new ArrayCollection($requirements);
        }

        $this->requirements = $requirements;

        return $this;
    }

    /**
     * Has requirements
     *
     * @return boolean
     */
    public function hasRequirements()
    {
        return !$this->requirements->isEmpty();
    }

    /**
     * @{inheritdocs}
     */
    public function getRequirement($requirement)
    {
        return $this->requirements->get($requirement);
    }

    /**
     * @{inheritdocs}
     */
    public function addRequirement(\Volleyball\Bundle\CourseBundle\Entity\Requirement $requirement)
    {
        $this->requirements->add($requirement);

        return $this;
    }

    /**
     * Remove a requirement
     *
     * @param mixed $requirement requirement
     *
     * @return \Volleyball\Bundle\CourseBundle\Entity\VbClss
     */
    public function removeRequirement($requirement)
    {
        $this->requirements->remove($requirement);

        return $this;
    }
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->classes = new \Doctrine\Common\Collections\ArrayCollection();
        $this->requirements = new \Doctrine\Common\Collections\ArrayCollection();
        $this->organizations = new \Doctrine\Common\Collections\ArrayCollection();
        $this->councils = new \Doctrine\Common\Collections\ArrayCollection();
        $this->regions = new \Doctrine\Common\Collections\ArrayCollection();
    }
}
