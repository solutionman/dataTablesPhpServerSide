
create table datatables_demo
(
    id         int auto_increment
        primary key,
    firstname  varchar(255) null,
    lastname   varchar(255) null,
    middlename varchar(255) null
);

INSERT INTO datatables_demo values ( 1,'firstname', 'lastname', 'middlename');
INSERT INTO datatables_demo values ( 2,'firstname2', 'lastname2', 'middlename2');
INSERT INTO datatables_demo values ( 3,'John', 'Stevenson', 'Mark');

SELECT * FROM datatables_demo;
