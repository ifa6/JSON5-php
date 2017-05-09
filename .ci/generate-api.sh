#!/bin/bash

set -eu

if [ $TRAVIS_PHP_VERSION = '7.0' ] && [ $TRAVIS_BRANCH = 'master' ] && [ $TRAVIS_PULL_REQUEST = 'false' ];then

  echo "Download 'apigen.phar'."
  wget -O apigen.phar http://www.apigen.org/apigen.phar

  echo "Generate documents to '../docs' directory."
  yes | php apigen.phar generate -s src -d ../docs --title=JSON5-php --google-analytics=UA-73752623-2

  echo "Set identity."
  git config --global user.email "hiro.yo.yo1610@gmail.com"
  git config --global user.name "Hiroto Kitazawa"

  echo "Clone the 'gh-pages' branch from GitHub."
  git clone https://${GH_TOKEN}@github.com/Hiroto-K/JSON5-php.git ../gh-pages --branch gh-pages >/dev/null 2>&1

  echo "Copy '../docs' files."
  \cp -f -r ../docs/* ../gh-pages

  echo "Commit generated files."
  cd ../gh-pages
  git add .
  d=`date +"%Y/%m/%d %k:%M:%S"`
  git diff --cached --exit-code --quiet || git commit -m "Document update at ${d}"

  echo "Push generated files to GitHub."
  git push origin gh-pages -fq >/dev/null 2>&1

  echo "Successfully completed."
fi
