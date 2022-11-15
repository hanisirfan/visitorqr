# VisitorQR

## Requirements
1. Web server with PHP version ^8.1 support.
2. PHP extensions: curl, exif, fileinfo, gd, intl, mbstring, mysqli, openssl, pdo_mysql, sodium, xsl

    I listed every extensions enabled on my development enviroment. I don't really know what extensions required for packages installed :laughing:

3. NodeJS version ^14.18.0.
4. Composer version ^2.3.10

## Project installation

1. Copy `.env.example` file and rename it to `.env`.
2. Create a new database and set the newly created database details inside `.env` file.
2. Run these commands to compile the assets and install the project.

`composer compile-project`

`php artisan install PASSWORD USER_NAME EMAIL_ADDRESS`

## Copyright

Copyright (c) 2022 Muhammad Hanis Irfan Bin Mohd Zaid a.k.a. Hanis Irfan.

Licensed under the MIT license.
