<?php

function connect() {
	
	return new SQLite3('../db/regtest.db');
}
