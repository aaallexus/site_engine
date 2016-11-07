#!/bin/sh
/usr/bin/mysqldump carp_project -u root > mysqldump.sql
git push
