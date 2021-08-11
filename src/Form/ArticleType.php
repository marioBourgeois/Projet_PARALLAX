<?php

namespace App\Form;

use App\Entity\Article;
use Symfony\Component\Form\AbstractType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre', TextType::class)
            ->add('slug')
            ->add('image', FileType::class, [
                'label' => 'Image',
                'data_class' => null
            ])
            ->add('image_alt')
            ->add('contenu', CKEditorType::class) // Ce champ sera remplacé par un éditeur WYSIWIG
            ->add('date_modification', DateType::class, [
                'widget' => 'single_text',
            ])
            ->add('estPublie')
            ->add('credit')
             ->add('miseEnAvant')
            ->add('categories')
            ->add('Enregistrer', SubmitType::class)
            ->add('Supprimer', SubmitType::class);
    }

    
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }
}
