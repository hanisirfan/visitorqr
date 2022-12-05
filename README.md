# VisitorQR

## Requirements
1. Web server with PHP version ^8.1 support.
2. PHP extensions: curl, exif, fileinfo, gd, intl, mbstring, mysqli, openssl, pdo_mysql, sodium, xsl

    I listed every extensions enabled on my development environment. I don't really know what extensions required for the packages installed :laughing:

3. NodeJS version ^14.18.0.
4. Composer version ^2.3.10

## Project installation

1. Download the release or clone this project inside your web server root folder. Make sure Virtualhost / Server block is configured correctly to point `/public` as document root.
2. Copy `.env.example` file and rename it to `.env`.
3. Create a new database and set the newly created database credentials inside `.env` file.
4. Run these commands to compile the assets and install the project.

    `composer compile-project`

    `php artisan install PASSWORD USER_NAME EMAIL_ADDRESS`

## Customizations

1. You can replace the title of the system with your organization name by editing `ORG_NAME` inside `.env` file.

2. You may replace the logo used for this system by replacing these files:
    - `resources/img/logo/favicon.ico`
    - `resources/img/logo/logo.svg`

    The image ratio is 1x1. Finish the logo replacement by running `npm run build` command to rebuild the assets.

## Troubleshooting

### File Permission Error

If you encountered an issue with file permission, make sure you change the owner and group of this system directory on your file system.

For NGINX running on Ubuntu, you can run these commands on this system directory assuming NGINX user and group is `www-data`:

- `sudo chown -R www-data:www-data *`
- `sudo chown www-data:www-data .*`

## Deleting Visitors By Its Age

You can remove visitors that have a certain age (in seconds) after their addition to the system. You can do that by running the artisan `deleteVisitorByAge` command. Run `php artisan help deleteVisitorByAge` for more info.

To schedule `deleteVisitorByAge` command, you need to define it in `app/Console/Kernel.php` file's schedule method. For example:
```
protected function schedule(Schedule $schedule)
{
    $schedule->command('deleteVisitorByAge --days=3')
    ->daily()
    ->runInBackground();
}
```

This will schedule the deletion of visitors that are 3 days old every day at midnight.

To running the actual Laravel Scheduler, add a single cron entry to your server to run `schedule:run` command every minute.

```
* * * * * cd /path-to-your-project && php artisan schedule:run >> /dev/null 2>&1
```

Refer [this article](https://www.cyberciti.biz/faq/how-do-i-add-jobs-to-cron-under-linux-or-unix-oses/) on how to add Cron entries in Linux.

Refer [Laravel documentation](https://laravel.com/docs/9.x/scheduling#scheduling-artisan-commands) for more info in task scheduling.

### Logs

All logs of `deleteVisitorByAge` command are stored in `storage/logs/deleteVisitorByAgeCommand.log` file.

## Copyright

Copyright (c) 2022 Muhammad Hanis Irfan Bin Mohd Zaid.

Licensed under the MIT license.
