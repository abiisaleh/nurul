{ pkgs ? import <nixpkgs> {} }:
pkgs.stdenv.mkDerivation {
  name = "my-ci4-app";
  src = ./.;
  buildInputs = [
    pkgs.php
    pkgs.phpPackages.composer
    pkgs.postgresql
  ];
  buildCommand = ''
    composer install
    cp env.railway .env
  '';
  installPhase = ''
    mkdir -p $out/www
    cp -r ./* $out/www/
  '';
}