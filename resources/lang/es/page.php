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
        'companies' => 'Compañías',
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
            'error' => 'Debes ingresar un nombre para la compañía.',
        ],
        'email' => [
            'title' => 'Correo',
            'label' => 'Correo',
            'place' => 'Correo.',
            'tooltip' => 'Es el correo de la compañía.',
            'error' => 'Debes ingresar un correo valido para la compañía.',
        ],
        'logo' => [
            'title' => 'Logo',
            'label' => 'Logo',
            'tooltip' => 'Es el logo para la compañía de tipo (jpeg, png, bmp, gif, svg o webp), dimesiones minimo 100*100 y de peso maximo de '.getUploadMax().'MB .',
            'error' => 'Debes ingresar una imagen valida para la compañía de tipo (jpeg, png, bmp, gif, svg o webp), dimesiones minimo 100*100 y de peso maximo de '.getUploadMax().'MB .',
        ],
        'website' => [
            'title' => 'Sitio Web',
            'label' => 'Url sitio web',
            'place' => 'Url sitio web.',
            'tooltip' => 'Es la url del sitio web de la compañía.',
            'error' => 'Debes ingresar una url del sitio web valida para la compañía.',
        ],
    ],

];