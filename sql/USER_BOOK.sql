DROP TABLE user_book;

create table user_book{
	userid int not null,
	bookid int not null,
	date_borrowed int not null,
	date_overdue int,
	date_returned int,
	constraint USER_BOOK_book_bookid_fk
		foreign key (bookid) references library.book (bookid),
	constraint USER_BOOK_user_table_userid_fk
		foreign key (userid) references library.user_table (userid)
);

INSERT INTO user_book (userid,bookid,date_borrowed,date_overdue,date_returned) VALUES
	(2,1,20190401, NuLL, NULL),
	(2,4,20190326,NuLL,20190402),
	(2,13,20190226,20190314,NULL),
	(4,20,20190401,NULL,NULL),
	(4,2,20190401,NULL,NULL),
	(6,15,20190322,20190402,NULL),
	(9,3,20190301,NULL,20190322),
	(9,28,20190301,NULL,20190322),
	(10,21,20190325,NULL,NULL);