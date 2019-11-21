<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Texts for the page
    |--------------------------------------------------------------------------
    |
    | They are all the necessary texts for the page.
    |
    */
    'general' => [
    'actions' => 'Actions',
    'create' => 'Create',
    'edit' => 'Edit',
    'delete' => 'Delete',
    'view' => 'View',
    'cancel' => 'Cancel',
    'empty' => 'Empty',
    'updateDate' => 'Update',
    'createDate' => 'Creation',
    'deleteDate' => 'Deletion',
    'titleRequired' => 'Fields marked with * are required.',
    'dataTableLang' => '{
        "search": "Search",
    }',
    ],
    'menu' => [
    'title' => 'Main Menu',
    'companies' => 'Companies',
    'employee' => 'Employees',
    ],
    'lang' => [
    'es' => 'Spanish',
    'en' => 'English',
    ],
    'home' => [
    'title' => 'Home',
    'header' => 'Start of the site.',
    'txt' => 'Welcome, access the functions through the menu.',
    ],
    'companies' => [
    'title' => 'Companies',
    'header' => 'Companies',
    'selectOpcion' => 'Select a company.',
    'table' => [
    'id' => 'ID',
    'name' => 'Name',
    'email' => 'Email',
    'logo' => 'Logo',
    'website' => 'Web',
    ],
    'add' => [
    'title' => 'Companies - Create',
    'header' => 'Create Company.',
    'error' => 'An error is generated when creating the company, valid and try again. If you continue, contact us.',
    'success' => 'The company was created successfully :name.',
    ],
    'edit' => [
    'title' => 'Companies - Edit',
    'header' => 'Edit Company.',
    'error' => 'An error is generated when updating the company, valid and try again. If you continue, contact us.',
    'success' => 'The company was successfully updated :name.',
    ],
    'view' => [
    'title' => 'Companies - See',
    'header' => 'View Company.',
    ],
    'delete' => [
    'title' => 'Delete Company',
    'msg' => 'Remember that this will eliminate the employees associated with this company. You are sure to eliminate the company ',
    'error' => 'An error is generated when the company is deleted, valid and try again. If you continue, contact us.',
    'success' => 'Company was successfully deleted :name.',
    ],
    'name' => [
    'title' => 'Name',
    'label' => '* Name',
    'place' => 'Name.',
    'tooltip' => 'Is the name of the company.',
    ],
    'email' => [
    'title' => 'Mail',
    'label' => 'Mail',
    'place' => 'Mail.',
    'tooltip' => 'It\'s the company\'s email.',
    ],
    'logo' => [
    'title' => 'Logo',
    'label' => 'Logo',
    'tooltip' => 'It is the logo for the type company (jpeg, png, bmp, gif, svg or webp), minimum dimensions 100 * 100 and maximum weight of' .getUploadMax (). 'MB.',
    ],
    'website' => [
    'title' => 'Website',
    'label' => 'Url website',
    'place' => 'Url website.',
    'tooltip' => 'It is the url of the company\'s website.',
    ],
    'notify' => [
    'subject' => 'New company.',
    'greeting' => 'Hello!',
    'txt' => 'A new company was created.',
    'action' => 'See detail of the new company',
    'greetings' => 'Greetings',
    'footer' => 'If you have trouble clicking the " :actionText" button, copy and paste the URL below
    in your web browser: ',
    ],
    ],
    'employees' => [
    'title' => 'Employees',
    'header' => 'Employees',
    'table' => [
    'id' => 'ID',
    'first_name' => 'Names',
    'last_name' => 'Surname',
    'email' => 'Email',
    'phone' => 'Telephone',
    'company' => 'Company',
    ],
    'add' => [
    'title' => 'Employees - Create',
    'header' => 'Create Employee.',
    'error' => 'An error is generated when creating the valid employee and tries again. If you continue, contact us.',
    'success' => 'The employee was created successfully :name.',
    ],
    'edit' => [
    'title' => 'Employees - Edit',
    'header' => 'Edit Employee.',
    'error' => 'An error is generated when updating the valid employee and tries again. If you continue, contact us.',
    'success' => 'Employee updated successfully :name.',
    ],
    'view' => [
    'title' => 'Employees - See',
    'header' => 'See Employee.',
    ],
    'delete' => [
            'title' => 'Delete Employee',
            'msg' => 'You are sure to delete the employee',
            'error' => 'An error was generated when the employee was deleted, valid and try again. If you continue, contact us. ',
            'success' => 'The employee was successfully deleted :name.',
    ],
    'first_name' => [
        'title' => 'Names',
        'label' => '* Names',
        'place' => 'Names.',
        'tooltip' => 'Are the names of the employee.',
    ],
    'last_name' => [
        'title' => 'Surname',
        'label' => '* Surname',
        'place' => 'Surname.',
        'tooltip' => 'Are the last names of the employee.',
    ],
    'email' => [
        'title' => 'Mail',
        'label' => 'Mail',
        'place' => 'Mail.',
        'tooltip' => 'Is the email of the employee.',
    ],
    'phone' => [
        'title' => 'Telephone',
        'label' => 'Telephone',
        'place' => 'Telephone.',
        'tooltip' => 'This is the employee\'s phone with the format [+] [country] [line number] example +573202919054.',
    ],
    'company' => [
        'title' => 'Company',
        'label' => 'Company',
        'tooltip' => 'It is the company to which the employee belongs',
    ],
],

];
