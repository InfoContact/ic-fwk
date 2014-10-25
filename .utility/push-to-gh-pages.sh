#!/bin/bash

if [ "$TRAVIS_REPO_SLUG" == "InfoContact/ic-fwk" ] && [ "$TRAVIS_PULL_REQUEST" == "false" ] && [ "$TRAVIS_BRANCH" == "master" ]; then

  echo -e "Generating new API docs...\n"

  php apigen.phar generate

  echo -e "Pushing docs\n"

  cp -R ./doc $HOME/doc-latest

  cd $HOME
  git config --global user.email "travis@travis-ci.org"
  git config --global user.name "travis-ci"
  git clone --quiet --branch=gh-pages https://${GH_TOKEN}@github.com/InfoContact/ic-fwk gh-pages > /dev/null

  cd gh-pages
  git rm -rf ./doc
  cp -Rf $HOME/doc-latest ./doc
  git add -f .
  git commit -m "Lastest API doc on successful travis build $TRAVIS_BUILD_NUMBER auto-pushed to gh-pages"
  git push -fq origin gh-pages > /dev/null

  echo -e "Published API docs to gh-pages.\n"

fi
