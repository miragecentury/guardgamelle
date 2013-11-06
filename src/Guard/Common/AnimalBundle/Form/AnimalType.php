<?php

namespace Guard\Common\AnimalBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AnimalType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('sexe')
            ->add('date_naissance')
            ->add('race')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Guard\Common\AnimalBundle\Entity\Animal'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'guard_common_animalbundle_animal';
    }
}
