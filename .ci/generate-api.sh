if [ $TRAVIS_PHP_VERSION = '7.0' ] && [ $TRAVIS_BRANCH = 'master' ] && [ $TRAVIS_PULL_REQUEST = 'false' ];then
  # Get ApiGen.phar
  wget http://www.apigen.org/apigen.phar

  # Generate Api
  yes | php apigen.phar generate -s src -d ../docs --title=JSON5-php --google-analytics=UA-73752623-2

  # Set identity
  git config --global user.email "hiro.yo.yo1610@gmail.com"
  git config --global user.name "Hiroto Kitazawa"

  # Clone via github
  git clone https://${GH_TOKEN}@github.com/Hiroto-K/JSON5-php.git ../gh-pages --branch gh-pages >/dev/null 2>&1

  # Copy doc files
  \cp -f -r ../docs/* ../gh-pages

  # Push generated files
  cd ../gh-pages
  git add .
  d=`date +"%Y/%m/%d %k:%M:%S"`
  git diff --cached --exit-code --quiet || git commit -m "Document update at ${d}"
  git push origin gh-pages -fq >/dev/null 2>&1

fi
