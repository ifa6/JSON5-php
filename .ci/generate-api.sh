if [ $TRAVIS_PHP_VERSION = '5.6' ] && [ $TRAVIS_BRANCH = 'master' ] && [ $TRAVIS_PULL_REQUEST = 'false' ];then
  # Get ApiGen.phar
  wget http://www.apigen.org/apigen.phar

  # Generate Api
  php apigen.phar generate -s src -d ../gh-pages --title=JSON5-php --google-analytics=UA-73752623-2
  cd ../gh-pages

  # Set identity
  git config --global user.email "hiro.yo.yo1610@gmail.com"
  git config --global user.name "Hiroto Kitazawa"

  # Add branch
  git init
  git remote add origin https://${GH_TOKEN}@github.com/Hiroto-K/JSON5-php.git > /dev/null
  git checkout -B gh-pages

  # Push generated files
  git add .
  d=`date +"%Y/%m/%d %k:%M:%S"`
  git commit -m "Document update at ${d}"
  git push origin gh-pages -fq > /dev/null
fi