const mysql = require('mysql');

var db = mysql.createConnection({
  	host: "localhost",
  	user: "root",
  	password: "",
  	database: "go-fullstack"
});

module.exports = db;