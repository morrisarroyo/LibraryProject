create table USER_BOOK
(
	userid int not null,
	bookid int not null,
	date_borrowed int not null,
	date_overdue int not null,
	date_returned int not null,
	title linestring not null,
	constraint USER_BOOK_book_bookid_fk
		foreign key (bookid) references library.book (bookid),
	constraint USER_BOOK_user_table_userid_fk
		foreign key (userid) references library.user_table (userid)
);

