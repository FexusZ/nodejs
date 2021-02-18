const express = require('express');
const app = express();

var db = require('./init/init');

app.use(function(req, res, next) {
	console.log('accept origin');
	res.setHeader('Access-Control-Allow-Origin', '*');
	res.setHeader('Access-Control-Allow-Headers', 'Origin, X-Requested-With, Content, Accept, Content-Type, Authorization');
	res.setHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
	next();
});

app.get('/', function(req, res, next) {
	db.connect(function(error) {
		db.query("SELECT * FROM object", function(err, result, fields) {
			if (err) throw err;
			res.status(200).json(result);
		});
	});
});

module.exports = app;