# Docker PHPFPM74 Trift edition

This dockerfile runs php74-fpm daemonized by supervisor.

Image name: **24hoursmedia/pfpm74trift**

## Features

* php74-trift daemonized by supervisord
* easily daemonize your php application with the already available supervisord
* composer preinstalled
* contains hirak/prestissimo for speeding up composer installs
* based on alpine

## Test it

```
docker-compose
```

```
./build.sh
./run.sh
```

## Customization

### With environment variables

You can set the following environment variables to configure php at startup:

- php_max_input_vars
- php_date_timezone

I.e. in docker-compose.yml:

```
    environment:
      php_max_input_vars: 2000
```

### Build args

```
# set to 1 to include imagick libs and php extension
ARG WITH_IMAGICK=1
# set to 1 to include the icu patch
ARG WITH_ICONV_PATCH=0
# include composer acceleration (disable on prod)
ARG WITH_PRESTISSIMO=1
```

### Add daemons for supervisor

You can add applications to supervisor to run daemonized.
For this, place a file 'myworker.ini' in /etc/supervisor/conf.d

I.e. in your dockerfile:

```
FROM 24hoursmedia/pfpm74trift:latest
COPY conf/supervisor/worker.ini /etc/supervisor/conf.d/worker.ini
```

worker.ini:
```
[program:app-worker]
command=/bin/sleep 10
stdout_logfile=/dev/stdout
stdout_logfile_maxbytes=0
stderr_logfile=/dev/stderr
stderr_logfile_maxbytes=0
autostart=true
autorestart=true
startretries=1999999999
```


