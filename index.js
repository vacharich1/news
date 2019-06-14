
/**
 * Copyright 2017-present, Facebook, Inc. All rights reserved.
 *
 * This source code is licensed under the license found in the
 * LICENSE file in the root directory of this source tree.
 *
 * Messenger Platform Quick Start Tutorial
 *
 * This is the completed code for the Messenger Platform quick start tutorial
 *
 * https://developers.facebook.com/docs/messenger-platform/getting-started/quick-start/
 *
 * To run this code, you must do the following:
 *
 * 1. Deploy this code to a server running Node.js
 * 2. Run `npm install`
 * 3. Update the VERIFY_TOKEN
 * 4. Add your PAGE_ACCESS_TOKEN to your environment vars
 *
 */

var mysql = require('mysql');


//sql6.freemysqlhosting.net

var mysql      = require('mysql');
var con = mysql.createConnection({
  host     : 'sql6.freemysqlhosting.net',
  user     : 'sql6157803',
  password : 'XErmELW5R3',
  database : 'sql6157803'
});
      
var hoonname = "aot";
var room ="2223176154445588";

con.connect(function(err) {
		var sql = "INSERT INTO hoon_check (id, hoonname, room, timeframe, type) VALUES ('', 'hoonname', 'room' , 'aaa', 'old')";
		//$sql = "INSERT INTO hoon_check (id, hoonname, room)
		//		VALUES ('', '$hoonname', '$room')";
		con.query(sql, function (err, result) {
		  if (err) throw err;
		  console.log("1 record inserted");
		});

		var check ="check1";
		var sql = "INSERT INTO `check_capture`(`id`, `check1`) VALUES ('','check')";
		con.query(sql, function (err, result) {
		  if (err) throw err;
		  console.log("1 record inserted");
		});

});
