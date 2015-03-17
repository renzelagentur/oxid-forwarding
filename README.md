# oxid-forwarding
Oxid Forwarding lets you create custom 301 Redirects with origin and target for each shop

Installation with composer
--------------------------
1. adding ra/forwarding to your composer.json require
2. run composer update
3. create vendormetadata.php in ra directory
4. Go into your administration panel of your shop
5. Go to Modules
6. Activate the RA Forwarding module and the module will create the SQL table

Installation without composer
--------------------------
1. Copy the module into your modules/ directory
2. Go into your administration panel of your shop
3. Go to Modules
4. Activate the RA Forwarding module and the module will create the SQL table

If you want to create the SQL table manually,
you can find the SQL Statement in the Install.sql
