<?php

use App\Controller\Form;

// main.php

$form = new Form('do.php');

echo $form->generate_form([

    'name' => [
        'label' => 'Business Name',
        'type' => 'text',
        'value' => 'My Business Name'
    ],
    'email' => [
        'label' => 'Email Address',
        'type' => 'email',
        'value' => 'mymail@website.ma',
    ],


    'name_client' => [
        'label' => 'Client name',
        'type' => 'text',
        'value' => 'Jone Done'
    ],
    'email_client' => [
        'label' => 'Email',
        'type' => 'email',
        'value' => 'client@mail.com',
    ],

    'invoice_date' => [
        'label' => 'Date',
        'type' => 'date',
        'value' => '2021-01-01'
    ],
    'invoice_due_date' => [
        'label' => 'Due Date',
        'type' => 'date',
        'value' => '2021-01-16'
    ],
    'invoice_id' => [
        'label' => 'Invoice Number',
        'type' => 'text',
        'value' => '20210101-89'
    ],


]);