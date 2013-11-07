<?php

namespace Guard\Common\AnimalBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;

class AnimalType extends AbstractType {

    protected $type_id;


    public function __construct($type_id) {
        $this->type_id = $type_id;
    }
    
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $type_id = $this->type_id;
        $builder
                ->add('nom')
                ->add('sexe')
                ->add('date_naissance')
                ->add('race', 'entity', array(
                    'class' => 'GuardCommonAnimalBundle:Race',
                    'property' => 'nom',
                    'query_builder' => function(EntityRepository $er)use($type_id) {
                $queryBuilder = $er->createQueryBuilder('a');
                $queryBuilder->where('a.type = '.$type_id);
                return $queryBuilder;
            },
                ))
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Guard\Common\AnimalBundle\Entity\Animal'
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'guard_common_animalbundle_animal';
    }

}
