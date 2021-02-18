var db = require('../init/init');

exports.updateObject = function(object) {
	db.connect(function(err) {
		var sql = "update object SET price = ? WHERE _id = ?";

		db.query(sql , [object.price, object.id], function(err, result) {
			if (err) return err;
		});
	});
	return object;
}