<?php

namespace App\Form;

use App\Entity\Usuario;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType as TypeTextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class CadastroUsuarioType extends AbstractType

{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nome', TypeTextType::class, [
                'label' => 'Nome Completo',
                'constraints' => [
                    new NotBlank(['message' => 'O campo nome não pode estar vazio.'])
                ],
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Digite seu nome'
                ]
            ])
            ->add('email', TypeTextType::class, [
                'label' => 'Email',
                'constraints' => [
                    new NotBlank(['message' => 'Por favor, insira um e-mail.'])
                ],
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'seu@email.com'
                ]

            ])

            ->add('plainPassword', RepeatedType::class, [
                'type' => PasswordType::class,
                'mapped' => false,
                'invalid_message' => 'Os campos de senha devem ser idênticos.',
                'required' => true,
                'first_options'  => [
                    'label' => 'Senha',
                    'attr' => [
                        'class' => 'form-control',
                        'placeholder' => 'Mínimo 6 caracteres'
                    ]
                ],
                'second_options' => [
                    'label' => 'Confirmar Senha',
                    'attr' => [
                        'class' => 'form-control',
                        'placeholder' => 'Repita a senha' 
                    ]
                ],
                'constraints' => [
                    new NotBlank(['message' => 'Por favor, insira uma senha.']),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Sua senha precisa ter no mínimo {{ limit }} caracteres.',
                        'max' => 4096,
                    ]),
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Usuario::class,
        ]);
    }
}
