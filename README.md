laravel login api with roles and permission
composer require spatie/laravel-permission(install this pakage or roles and permission );

go to app.php in config folder and add this provider in provider arrays (Spatie\Permission\PermissionServiceProvider::class,)

php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"(use this command to publish migration and providers);

use Spatie\Permission\Traits\HasRoles;(add this in user.php model )

use HasRoles; (add this)

confgire your database in .env

make userseeder and add code in run function.

Spatie\Permission\Models\Permission(import this pakage on top of seeder class because this is used for permissions);

use role model in userseeder also to define role

give permissions and everything in seeder class for dummy data.

run php artisan migrate:fresh

create controller in api folder or where you want. 

do php artisan make:request LoginRequest to validate data

use helper function in app/helpers/helper.php to send error to frontend.

use resource function to send response for successfull login user. laravel provides us resource class.

use pluck keyword to send only required data to frontend not all data from roles table pluck is used in resource folder.