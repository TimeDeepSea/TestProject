create table t_user
(
    user_id  int auto_increment
        primary key,
    username varchar(255) not null,
    password varchar(255) not null,
    phone    varchar(255) not null,
    email    varchar(255) not null,
    constraint t_user_user_id_uindex
        unique (user_id)
);

