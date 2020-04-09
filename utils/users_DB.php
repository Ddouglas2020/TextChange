<?php

function connect() {
	
	return new SQLite3('../db/users.db');
}
