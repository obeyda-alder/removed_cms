<?php
return [
    'dashboard'  => 'Dashboard',
    'logout'     => 'Logout',
    'profile'    => 'profile',
    'title_p'    => 'paid with ...',
    'update'     => 'update',
    'save'       => 'save',
    'create'     => 'create',
    'cancel'     => 'cancel',
    'restore'    => 'restore',
    'delete'     => 'delete',
    'select'     => 'select',
    'change'     => 'change',
    'remove'     => 'remove',
    'soft_delete'=> 'soft delete',
    'update'     => 'update',
    'refreshDataTable' => 'Refresh',
    'rout_start' => [
        'dashboard' => 'Dashboard',
        'users' => [
            'label' => 'Users',
            'types' => [
                'ALL'       => 'ALL',
                'ROOT'      => 'ROOT',
                'ADMINS'    => 'ADMINS',
                'EMPLOYEES' => 'EMPLOYEES',
                'AGENCIES'  => 'AGENCIES',
                'CUSTOMERS' => 'CUSTOMERS',
            ],
        ],
        'agencies' => [
            'label' => 'agencies',
            'agencies_types' => [
                'master_agent'  => 'Master Agent',
                'sub_agent'     => 'Sub Agent',
            ]
        ],
        'categories' => [
            'label' => 'categories',
        ],
        'units' => [
            'label' => 'units',
        ],
    ],
    'users' => [
        'table' => [
            'id'                 => '#',
            'name'               => 'name',
            'type'               => 'type',
            'username'           => 'username',
            'phone_number'       => 'phone_number',
            'email'              => 'email',
            'verification_code'  => 'verification_code',
            'status'             => 'status',
            'registration_type'  => 'registration_type',
            'actions'            => 'actions'
        ],
        'ALL'        => 'All',
        'ROOT'       => 'ROOT',
        'ADMINS'     => 'ADMINS',
        'EMPLOYEES'  => 'EMPLOYEES',
        'AGENCIES'   => 'AGENCIES',
        'CUSTOMERS'  => 'CUSTOMERS',
        'create'     => 'create user',
        'new'        => 'Create a new :type',
        'update'     => 'Updating data ( :name )',
        'fields' => [
            'name' => [
                'label' => 'name',
                'placeholder' => 'Enter name',
                'help' => 'name',
            ],
            'username' => [
                'label' => 'full name',
                'placeholder' => 'Enter full name',
                'help' => 'full name',
            ],
            'email' => [
                'label' => 'email',
                'placeholder' => 'Enter email',
                'help' => 'email',
            ],
            'password' => [
                'label' => 'password',
                'placeholder' => 'Enter password',
                'help' => 'password',
            ],
            'image' => [
                'label' => 'Select Image',
                'placeholder' => 'Select Image',
                'help' => 'Select Image',
            ],
            'phone_number' => [
                'label' => 'phone number',
                'placeholder' => 'Enter phone number',
                'help' => 'phone number',
            ],
            'confirm_password' => [
                'label' => 'confirm password',
                'placeholder' => 'confirm password',
                'help' => 'confirm password',
            ],
        ],
    ],
    'lang_data_table' => 'https://cdn.datatables.net/plug-ins/1.10.16/i18n/English.json',
    'msg' => [
        'error_message' => [
            'title'        => 'error !!',
            'description'  => 'error message!!',
        ],
        'validation_error' => [
            'title'        => 'error !!',
            'description'  => 'validation error',
        ],
        'success_message' => [
            'title'        => 'success',
            'description'  => 'success message',
        ],
    ],
    'agencies' => [
        'table' => [
            'id'                  => '#',
            'title'               => 'title',
            'first_name'          => 'first_name',
            'last_name'           => 'last_name',
            'phone_number'        => 'phone_number',
            'email'               => 'email',
            'status'              => 'status',
            'actions'             => 'actions',
        ],
        'MASTER_AGENT' => 'MASTER AGENT',
        'SUB_AGENT'    => 'SUB AGENT',
        'create'     => 'create Agent',
        'new'        => 'Create a new :agencies_type',
        'update'     => 'Updating data ( :name )',
        'fields' => [
            'title' => [
                'label' => 'Title',
                'placeholder' => 'Enter Title',
                'help' => 'Title',
            ],
            'user_id' => [
                'label' => 'select user',
                'placeholder' => 'select user',
                'help' => 'select user',
            ],
            'master_agent_id' => [
                'label' => 'select master agent',
                'placeholder' => 'select master agent',
                'help' => 'select master agent',
            ],
            'description' => [
                'label' => 'Description',
                'placeholder' => 'Enter Description',
                'help' => 'Description',
            ],
            'first_name' => [
                'label' => 'First name',
                'placeholder' => 'Enter First name',
                'help' => 'First name',
            ],
            'last_name' => [
                'label' => 'Last name',
                'placeholder' => 'Enter Last name',
                'help' => 'Last name',
            ],
            'email' => [
                'label' => 'Email',
                'placeholder' => 'Enter Email',
                'help' => 'Email',
            ],
            'desc_address' => [
                'label' => 'Address Description',
                'placeholder' => 'Enter Address Description',
                'help' => 'Address Description',
            ],
            'latitude' => [
                'label' => 'Latitude',
                'placeholder' => 'Latitude',
                'help' => 'Latitude',
            ],
            'longitude' => [
                'label' => 'Longitude',
                'placeholder' => 'Longitude',
                'help' => 'Longitude',
            ],
            'iban' => [
                'label' => 'Iban',
                'placeholder' => 'Enter Iban',
                'help' => 'Iban',
            ],
            'iban_name' => [
                'label' => 'Iban Name',
                'placeholder' => 'Enter Iban Name',
                'help' => 'Iban Name',
            ],
            'iban_type' => [
                'label' => 'Iban Type',
                'placeholder' => 'Iban Type',
                'help' => 'Iban Type',
            ],
            'phone_number' => [
                'label' => 'Phone Number',
                'placeholder' => 'Enter Phone Number',
                'help' => 'Phone Number',
            ],
            'status' => [
                'label' => 'Status',
                'placeholder' => 'Status',
                'help' => 'Status',
                '0' => 'PENDING',
                '1' => 'ACTIVE',
                '2' => 'SUSPENDED',
            ],
        ],
    ],
    'countries' => [
        'label' => 'countries',
        'placeholder' => 'select country',
        'help' => 'countries',
    ],
    'cities' => [
        'label' => 'cities',
        'placeholder' => 'select city',
        'help' => 'cities',
    ],
    'municipalities' => [
        'label' => 'municipalities',
        'placeholder' => 'select municipality',
        'help' => 'municipalities',
    ],
    'neighborhoodes' => [
        'label' => 'neighborhoodes',
        'placeholder' => 'selecct neighborhood',
        'help' => 'neighborhoodes',
    ],
    'categories' => [
        'table' => [
            'id'                  => '#',
            'name'                => 'name',
            'code'                => 'code',
            'from_to'             => 'from_to',
            'price'               => 'price',
            'status'              => 'status',
            'actions'             => 'actions',
        ],
        'label'        => 'categories',
        'create'       => 'create categories',
        'new'          => 'Create a new category',
        'update'       => 'Updating data ( :name )',
        'genrate_code' => 'genrate code',
        'from_to' => 'from :from to :to',
        'fields' => [
            'name' => [
                'label' => 'name',
                'placeholder' => 'Enter name',
                'help' => 'name',
            ],
            'code' => [
                'label' => 'code',
                'placeholder' => 'Click To Genrate Code',
                'help' => 'code',
            ],
            'from' => [
                'label' => 'from',
                'placeholder' => 'Enter from',
                'help' => 'from',
            ],
            'to' => [
                'label' => 'to',
                'placeholder' => 'Enter to',
                'help' => 'to',
            ],
            'price' => [
                'label' => 'price',
                'placeholder' => 'Enter price',
                'help' => 'price',
            ],
            'status' => [
                'label' => 'select status',
                'placeholder' => 'select status',
                'help' => 'select status',
                'NOT_ACTIVE' => 'NOT ACTIVE',
                'ACTIVE'     => 'ACTIVE',
            ],
        ],
    ],
    'units' => [
        'table' => [
            'id'                  => '#',
            'name'                => 'name',
            'code'                => 'code',
            'price'               => 'price',
            'status'              => 'status',
            'actions'             => 'actions',
        ],
        'label'        => 'units',
        'create'       => 'create units',
        'new'          => 'Create a new unit',
        'update'       => 'Updating data ( :name )',
        'genrate_code' => 'genrate code',
        'fields' => [
            'user_id' => [
                'label' => 'Define the user to connect the unit',
                'placeholder' => 'Define the user to connect the unit',
                'help' => 'Define the user to connect the unit',
            ],
            'category_id' => [
                'label' => 'Define the category to connect the unit',
                'placeholder' => 'Define the category to connect the unit',
                'help' => 'Define the category to connect the unit',
            ],
            'name' => [
                'label' => 'name',
                'placeholder' => 'Enter name',
                'help' => 'name',
            ],
            'code' => [
                'label' => 'code',
                'placeholder' => 'Click To Genrate Code',
                'help' => 'code',
            ],
            'price' => [
                'label' => 'price',
                'placeholder' => 'Enter price',
                'help' => 'price',
            ],
            'status' => [
                'label' => 'select status',
                'placeholder' => 'select status',
                'help' => 'select status',
                'NOT_ACTIVE' => 'NOT ACTIVE',
                'ACTIVE'     => 'ACTIVE',
            ],
        ],
        'create_by_category' => 'create unit by category',
        'create_new_unit' => 'create new unit',
    ],
];
