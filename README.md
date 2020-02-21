# Install project

### First time
- `php artisan migrate` **(Configure the data base before)**
- `php artisan db:seed --class=VoyagerDatabaseSeeder` **(Insert voyager data)**
- `php artisan db:seed --class=InitialDataSeeder` **(Insert voyager superadmin)**

### After pulling MultiAuth branch
- `composer require bitfumes/laravel-multiauth`
- `php artisan migrate:reset`
- `php artisan migrate`
- `php artisan db:seed --class=VoyagerDatabaseSeeder`
- `php artisan db:seed --class=InitialDataSeeder`

# Test users

### Voyager
- Route : gdm.test/admin
- User  : superadmin:superadmin

### Patient
- Route : gdm.test/patient
- User  : AA000000:password

### Medecin
- Route : gdm.test/medecin
- User  : 123456789:password

### Pharmacie
- Route : gdm.test/pharmacie
- User  : 555555555:password

### Examinateur
- Route : gdm.test/examinateur
- User  : 999999999:password
