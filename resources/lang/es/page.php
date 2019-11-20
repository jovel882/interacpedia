<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Textos para la pagina
    |--------------------------------------------------------------------------
    |
    | Son todos los textos necesarios para la pagina.
    |
    */
    'general' => [
        'actions' => 'Acciones',
        'create' => 'Crear',
        'edit' => 'Editar',
        'delete' => 'Eliminar',
        'view' => 'Ver',
        'cancel' => 'Cancelar',
        'empty' => 'Vacio',
        'updateDate' => 'Actualizacion',
        'createDate' => 'Creacion',
        'deleteDate' => 'Eliminacion',
        'titleRequired' => 'Los campos marcados con * son obligatorios.',
        'dataTableLang' =>  '{
            "search": "Buscar",
        }',
    ],    
    'menu' => [
        'title' => 'Menú Principal',
        'companies' => 'Compañias',
        'employees' => 'Empleados',
    ],    
    'lang' => [
        'es' => 'Español',
        'en' => 'Inglés',
    ],    
    'home' => [
        'title' => 'Inicio',
        'header' => 'Inicio del sitio.',
    ],
    'companies' => [
        'title' => 'Compañías',
        'header' => 'Compañías',
        'selectOpcion' => 'Selecciona una compañía.',
        'table' => [
            'id' => 'ID',
            'name' => 'Nombre',
            'email' => 'Correo',
            'logo' => 'Logo',
            'website' => 'Web',
        ],
        'add' => [
            'title' => 'Compañías - Crear',
            'header' => 'Crear Compañía.',
            'error' => 'Se genero un error al crear la compañía, válida e intenta nuevamente. Si continúa comunícate con nosotros.',
            'success' => 'Se creó correctamente la compañía :name.',
        ],
        'edit' => [
            'title' => 'Compañías - Editar',
            'header' => 'Editar Compañía.',
            'error' => 'Se genero un error al actualizar la compañía, válida e intenta nuevamente. Si continúa comunícate con nosotros.',
            'success' => 'Se actualizó correctamente la compañía :name.',
        ],
        'view' => [
            'title' => 'Compañías - Ver',
            'header' => 'Ver Compañía.',
        ],
        'delete' => [
            'title' => 'Eliminar Compañía',
            'msg' => 'Recuerde que esto eliminará los empleados asociados a esta compañía. Está seguro de eliminar la compañía',
            'error' => 'Se genero un error al eliminar la compañía, válida e intenta nuevamente. Si continúa comunícate con nosotros.',
            'success' => 'Se eliminó correctamente la compañía :name.',            
        ],
        'name' => [
            'title' => 'Nombre',
            'label' => '* Nombre',
            'place' => 'Nombre.',
            'tooltip' => 'Es el nombre de la compañía.',
        ],
        'email' => [
            'title' => 'Correo',
            'label' => 'Correo',
            'place' => 'Correo.',
            'tooltip' => 'Es el correo de la compañía.',
        ],
        'logo' => [
            'title' => 'Logo',
            'label' => 'Logo',
            'tooltip' => 'Es el logo para la compañía de tipo (jpeg, png, bmp, gif, svg o webp), dimesiones minimo 100*100 y de peso maximo de '.getUploadMax().'MB .',
        ],
        'website' => [
            'title' => 'Sitio Web',
            'label' => 'Url sitio web',
            'place' => 'Url sitio web.',
            'tooltip' => 'Es la url del sitio web de la compañía.',
        ],
        'notify' => [
            'subject' => 'Nueva compañía.',
            'greeting' => 'Hola!',
            'txt' => 'Se creo una nueva compañía.',
            'action' => 'Ver detalle de la nueva compañía',
            'regards' => 'Saludos,',
            'footer' => 'Si tienes problemas para hacer clic en el botón ":actionText", copia y pega la URL a continuación
            en su navegador web:',
        ],
    ],
    'employees' => [
        'title' => 'Empleados',
        'header' => 'Empleados',
        'table' => [
            'id' => 'ID',
            'first_name' => 'Nombres',
            'last_name' => 'Apellidos',
            'email' => 'Correo',
            'phone' => 'Telefono',
            'company' => 'Compañía',
        ],
        'add' => [
            'title' => 'Empleados - Crear',
            'header' => 'Crear Empleado.',
            'error' => 'Se genero un error al crear el empleado, válida e intenta nuevamente. Si continúa comunícate con nosotros.',
            'success' => 'Se creó correctamente el empleado :name.',
        ],
        'edit' => [
            'title' => 'Empleados - Editar',
            'header' => 'Editar Empleado.',
            'error' => 'Se genero un error al actualizar el empleado, válida e intenta nuevamente. Si continúa comunícate con nosotros.',
            'success' => 'Se actualizó correctamente el empleado :name.',
        ],
        'view' => [
            'title' => 'Empleados - Ver',
            'header' => 'Ver Empleado.',
        ],
        'delete' => [
            'title' => 'Eliminar Empleado',
            'msg' => 'Está seguro de eliminar el empleado',
            'error' => 'Se genero un error al eliminar el empleado, válida e intenta nuevamente. Si continúa comunícate con nosotros.',
            'success' => 'Se eliminó correctamente el empleado :name.',            
        ],
        'first_name' => [
            'title' => 'Nombres',
            'label' => '* Nombres',
            'place' => 'Nombres.',
            'tooltip' => 'Son los nombres del empleado.',
        ],
        'last_name' => [
            'title' => 'Apellidos',
            'label' => '* Apellidos',
            'place' => 'Apellidos.',
            'tooltip' => 'Son los apellidos del empleado.',
        ],
        'email' => [
            'title' => 'Correo',
            'label' => 'Correo',
            'place' => 'Correo.',
            'tooltip' => 'Es el correo del empleado.',
        ],
        'phone' => [
            'title' => 'Telefono',
            'label' => 'Telefono',
            'place' => 'Telefono.',
            'tooltip' => 'Es el telefono del empleado con el formato [+][pais][numero de la linea] ejemplo +573202919054 .',
        ],
        'company' => [
            'title' => 'Compañía',
            'label' => 'Compañía',
            'tooltip' => 'Es la compañía a la que pertence el empleado',            
        ],
    ],

];