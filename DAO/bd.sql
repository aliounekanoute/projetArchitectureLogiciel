create database news;

use news;

create table category(
  id int auto_increment,
  nom varchar(255),
  constraint primary_key primary key(id)
);

create table article(
  id int auto_increment,
  titre varchar(255) not null,
  contenu text not null,
  date_de_creation date not null,
  id_category int not null,
  constraint primary_key primary key(id),
  constraint foreign_key foreign key(id_category) references category(id)
);
