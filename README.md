# Install project
- `php artisan migrate` **(Configure the data base before)**
- `php artisan db:seed --class=VoyagerDatabaseSeeder` **(Insert voyager data)**
- `php artisan db:seed --class=InitialDataSeeder` **(Insert voyager superadmin)**

# Voyager
- Route : gdm.test/admin
- User  : superadmin:superadmin
