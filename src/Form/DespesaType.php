<?php

namespace App\Form;

use App\Entity\Categoria;
use App\Entity\Despesa;
use App\Entity\Fornecedor;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DespesaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nome')
            ->add('valor')
            ->add('emissao')
            ->add('vencimento')
            ->add('pago')
            ->add('fornecedor', EntityType::class, [
                'class' => Fornecedor::class,
'choice_label' => 'nome',
            ])
            ->add('categoria', EntityType::class, [
                'class' => Categoria::class,
'choice_label' => 'tipo',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Despesa::class,
        ]);
    }
}
