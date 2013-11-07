<?php

namespace Guard\Common\AnimalBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class RaceType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {

        $builder
                ->add('nom')
                ->add('type', 'entity', array(
                    'class' => 'GuardCommonAnimalBundle:Type',
                    'property' => 'nom',
                ))
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Guard\Common\AnimalBundle\Entity\Race'
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'guard_common_animalbundle_race';
    }

}
