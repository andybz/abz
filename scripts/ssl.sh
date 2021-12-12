#!/bin/bash

FILE=~/.hank/localhost.crt

if [ -f "$FILE" ]; then
  exit;
else 
  echo "Making SSL certificate...";
  mkdir -p ~/.hank;
  openssl req -x509 -days 5000 -out ~/.hank/localhost.crt -keyout ~/.hank/localhost.key \
    -newkey rsa:2048 -nodes -sha256 \
    -subj '/CN=localhost' -extensions EXT -config <( \
   printf "[dn]\nCN=localhost\n[req]\ndistinguished_name = dn\n[EXT]\nsubjectAltName=DNS:localhost\nkeyUsage=digitalSignature\nextendedKeyUsage=serverAuth");
  if [ -d "/Library/Keychains" ]; then
    sudo security add-trusted-cert \
      -k /Library/Keychains/System.keychain \
      -d ~/.hank/localhost.crt;
  fi
fi
