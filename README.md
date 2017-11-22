# Maan Corporation

Migration Sequence ::

Admin Module

    php artisan migrate --path="modules/admin/database/migrations/"

User Module

    php artisan migrate --path="modules/user/database/migrations/"

Ticketing Module

    php artisan migrate --path="modules/ticketing/database/migrations/"

Hazz Module

    php artisan migrate --path="modules/hazz/database/migrations/"

Umrah Module

    php artisan migrate --path="modules/umrah/database/migrations/"
    
Tour Package Module

    php artisan migrate --path="modules/tour_package/database/migrations/"

For migration

    php artisan make:migration create_posts_table  --path=modules/admin/database/migrations/

    