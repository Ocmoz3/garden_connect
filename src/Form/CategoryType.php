<?php

namespace App\Form;

use App\Entity\Category;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class CategoryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'label' => 'Titre'
            ])
            ->add('image', FileType::class, [
                'label' => 'Image Categorie',
                'mapped' => false,
                'required' => false,
                'data_class' => null,
                'constraints' => [
                    new File([
                        'maxSize' => '10000k',
                        'mimeTypes' => [
                            'image/jpeg',
                            'image/png',
                            'image/gif',
                        ],
                        'mimeTypesMessage' => 'Seuls les formats PNG, JPEG ou GIF sont acceptés !)',
                        'uploadIniSizeErrorMessage' => 'Votre fichier est trop volumineux !',
                        'uploadErrorMessage' => 'Erreur dans l\'ajout du fichier !',
                        'uploadExtensionErrorMessage' => 'Mauvaise extension !',
                        'uploadFormSizeErrorMessage' => 'Votre fichier est trop volumineux !',
                        'uploadNoFileErrorMessage' => 'Aucun fichier n\'a été enregistré !',
                    ])
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Category::class,
        ]);
    }
}
