<?php

function connect_books() {
	
	return new SQLite3('../db/books.db');
}
