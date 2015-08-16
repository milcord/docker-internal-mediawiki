# Internal MediaWiki Example

This folder provides an example setup using [Docker Compose](https://docs.docker.com/compose/).

## Configuring

All the MediaWiki configuration can be found inside [data/CustomSettings.php](data/CustomSettings.php). You'll want to edit this file and insert configuration where needed.

### Use external database

I recommend you setup a database that is not within a its own docker container. The example `docker-compose.yml` file does setup a `mysql` database container for you, but it's extremely easily to lose data in a docker container. That's why by default the MediaWiki container sets up a shared volume so all uploaded files and images to the wiki are outside of the docker container itself, allowing you to destroy and recreate the wiki container as needed. To configure an external database, simply remove the `db` object from your `docker-compose.yml` file and add the database environment variables, [described here](https://github.com/benhutchins/docker-mediawiki#using-database-server), to the `environment` section of your `web` object.

## Run

After you update your `data/CustomSettings.php` file, run your MediaWiki instance with:

    docker-compose up
