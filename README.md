### API Doc https://app.swaggerhub.com/apis/bassxzero7/LaravelAPI/1.0.0

### A. Explain the structure of your code
For this project I'm using Laravel 6.0. I believe you all currently use Laravel so I shouldn't need to explain the code structure too much. You should be able to find things in the typical directories.  

### B. Any libraries you used and a short explanation on why
The only thing I'm using that isn't part of the standard Laravel install is **laravel/passport**. I need passport so that I can use Laravel's OAuth2 implementation. 

### C. Installation and testing steps (should be easy to test locally)

Clone my projects repo to your test environment.
``` bash
git clone git@github.com:bassxzero/rest_api.git
```

You need to make a copy of the `.env.example` file and rename it to `.env` at your project root.

Edit the new .env file and set your database settings.

You will need to create the database. This is a sample of the command you can run.
``` bash
mysql --user="<dbusername>" --password -e"create database rest_api"
```

Seed the database with test values. 
``` bash
composer install
php artisan db:seed
```

Create a personal access client. (When prompted, you can name it whatever you like.)
``` bash
php artisan passport:client --personal
```

???Do I need to generate a key ???
``` bash
php artisan key:generate
```
Then start your server:
``` bash
php artisan serve
```

### D. Any additional stuff you added (flex your dev muscle)

### E. Thoughts on what you would have liked to add if you had the time
These are the TODO I left in my code so I would probably have worked on these if I had more time. 

//TODO If I have time I will probably create namespaces for the controllers based on the version number
//TODO need to add rollbacks to controlller that fail part way
//TODO need correct HTTP codes on responses
//TODO soft deletes or hard deletes? I'm not 100% what this calls for yet
//TODO add option to return data in a specific format xml, json, form data, etc
//TODO I'm not sure if I like my tables relationships right now. Change them???

I also might had added some documentation for function and such.

### F. Any additional comments you have

I've had the flu since Tuesday. I'm not trying to make excuses, but I feel like I could have done better than this. 
