# Codeigniter 4 + Datatables + Bonfire2

---

I have done this simple CRUD exercise to integrate Ci4, Bonfire2, Datatables.

On the Front shows a simple table of false accounting entries.

In the Backend, the administrative management is supported by Bonfire2.

I have created for this demo, two tables with fake data: 'Diario' and 'Tipos'.

---

## Installation:

- Cloning this project.

- Ejecutar: `Composer install`

- Follow to the letter the installation instructions of [Bonfire2](https://lonnieezell.github.io/Bonfire2/)

- Execute in the 'db' the file: `App\Database\myci45_dtbf2.sql`

- Execute: `php spark db:seed App\Database\Seeds\Tipos`

- Execute: `php spark db:seed App\Database\Seeds\Diario`

---

### Software used:

- Codeigniter 4.5.1

- On the front, the [Startbootstrap](https://startbootstrap.com/template/bare)

- [Bonfire2](https://lonnieezell.github.io/Bonfire2/)

- [Codeigniter4-Datatables](https://github.com/hermawanramadhan/CodeIgniter4-DataTables)

- Bootstrap 5.*

---

### Note:

After installation, you must make two corrections in: 
C:\xampp8212\htdocs\MyCi45_DtBf2\app\Config\Filters.php

lin 73 `'csrf' => ['except' => ['/diario_ss','admin/diario_ss']],`

C:\xampp8212\htdocs\MyCi45_DtBf2\app\Config\Bonfire.php

lin 28 ```
public $appModules = [
         'App\Modules' => APPPATH . 'Modules',
    ];```

C:\xampp8212\htdocs\MyCi45_DtBf2\themes\Admin\Components\sidebar.php

lin 1 ```href="<?= site_url('home') ?>```

lin 42 ```href="<?= site_url($item->url) ?>">```

and C:\xampp8212\htdocs\MyCi45_DtBf2\app\Config\AuthGroups.php

lin 64

```...
        'me.security'         => "Can change user's own password",       
        //Modulo Diario
        'diario.list'          => 'Can view list of pages',
        'diario.view'          => 'Can view pages details',
        'diario.create'        => 'Can create new pages',
        'diario.edit'          => 'Can edit existing pages',
        'diario.delete'        => 'Can delete existing pages',
        //Modulo Tipos
        'tipos.list'          => 'Can view list of pages',
        'tipos.view'          => 'Can view pages details',
        'tipos.create'        => 'Can create new pages',
        'tipos.edit'          => 'Can edit existing pages',
        'tipos.delete'        => 'Can delete existing pages',
    ];
```

lin 107

```public
        'superadmin' => [
            ...
            'diario.*',
            'tipos.*'
        ],
        'admin' => [
            ...
            'diario.*',
            'tipos.*'
        ],
        'developer' => [
            ...
            'diario.*',
            'tipos.*'
        ],
        'user' => [
             'diario.list',
             'tipos.list'
        ],
        'beta' => [
            'beta.access',
        ],
    ];
```

---

Example of the front end
![front_1](/img/front_1.png)

Example of the Backend
![admin_1](/img/admin_1.png)

---![admin_2](/img/admin_2.png)

My respect and thanks to the developers of Ci4, Bonfire2 and Hermawanramadhan.

All code is subject to improvement and optimization.

All developed code is distributed under MIT license.

June, 2024
