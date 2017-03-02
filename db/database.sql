create database if not exists gestioninfo character set utf8 collate utf8_unicode_ci;
use gestioninfo;

grant all privileges on gestioninfo.* to 'gestioninfo_user'@'localhost' identified by 'secret';