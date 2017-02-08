# Internal MediaWiki

This wiki is designed to work as an internal-only corporate, general purpose wiki. It should be robust enough to be reused by most companies who want to deploy an internal wiki quickly with all the normal business features. It's based on [benhutchins/mediawiki](https://hub.docker.com/r/benhutchins/mediawiki/), with the addition of:

 - [LDAP](https://www.mediawiki.org/wiki/Extension:LDAP_Authentication)
 - [Parsoid](https://www.mediawiki.org/wiki/Parsoid) (uses [benhutchins/parsoid](https://hub.docker.com/r/benhutchins/parsoid/))
 - [SemanticForms](https://www.mediawiki.org/wiki/Extension:Semantic_Forms)
 - [SemanticMediaWiki](https://semantic-mediawiki.org/)
 - [SemanticResultFormats](https://www.mediawiki.org/wiki/Extension:Semantic_Result_Formats)
 - [Slack](https://github.com/grundleborg/mediawiki-slack)
 - [VisualEditor](https://www.mediawiki.org/wiki/VisualEditor)

# How to use this image

The guidance on this image is intentionally short. It is run very similarly to [benhutchins/mediawiki](https://github.com/benhutchins/docker-mediawiki/blob/master/README.md) which this is extends, but has more the additional dependent link of a `parsoid` service.

## Docker Compose

I highly recommend you use [Docker Compose](https://docs.docker.com/compose/) to manage this service. It will start all the dependent services quickly. To get started, simply copy the files provided in the [example](example/) directory in this repository, configure it as you'd like and run:

    docker-compose up

## Using plain Docker Engine

```bash
# Pull dependent services and then this
docker pull mysql
docker pull benhutchins/parsoid
docker pull milcord/internal-mediawiki

# Start up mysql and parsoid
docker run --name interwiki-mysql -e MYSQL_ROOT_PASSWORD=mypassword -d mysql
docker run --name interwiki-parsoid -p 8000:8000 -e MW_URL="http://wiki.company.net" -d benhutchins/parsoid

# Now start the wiki
docker run \
  --name interwiki \
  -p 80:80 \
  --link interwiki-mysql:mysql \
  --link interwiki-parsoid:parsoid \
  -e MEDIAWIKI_SITE_SERVER="http://wiki.company.net" \
  -e MEDIAWIKI_SITE_NAME="Company Internal Wiki" \
  -v /local/data/dir:/data:rw \
  -d \
  milcord/internal-mediawiki
```
