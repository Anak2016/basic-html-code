create table if not exists babynames (
  id int(11) not null auto_increment,
  name varchar(20) not null,
  gender varchar(1) not null,
  votes int(11) default null,
  primary key (id)
);

insert into babynames (id, name, gender, votes)
values(null, 'shit', 'm', 1);

insert into babynames (id, name, gender, votes)
values(null, 'piss', 'm', 2);

insert into babynames (id, name, gender, votes)
values(null, 'cock', 'm', 3);

insert into babynames (id, name, gender, votes)
values(null, 'bitch', 'f', 1);

insert into babynames (id, name, gender, votes)
values(null, 'tits', 'f', 2);

insert into babynames (id, name, gender, votes)
values(null, 'coochy', 'F', 3);

select * from babynames where name like '%s%';


drop table babynames;