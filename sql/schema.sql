create table users(
	id bigint unsigned not null auto_increment primary key,
	username varchar(255) not null,
	email varchar(255) not null,
	password text not null,
	gender varchar(255) not null,
	date_of_birth datetime,
	access_token text not null,
	token_expired datetime not null,
	deleted_at datetime,
	updated_at datetime,
	created_at timestamp default current_timestamp 
);
create table category(
	id bigint unsigned not null auto_increment primary key,
	name varchar(255) not null,
	deleted_at datetime,
	updated_at datetime,
	created_at timestamp default current_timestamp 
);
create table expense(
	id bigint unsigned not null auto_increment primary key,
	user_id bigint unsigned not null,
	category_id bigint unsigned not null,
	amount decimal(8,4),
	deleted_at datetime,
	updated_at datetime,
	created_at timestamp default current_timestamp 
);