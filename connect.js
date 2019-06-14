
var mysql = require('mysql');


//sql6.freemysqlhosting.net

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

con.end(function(){
    // The connection has been closed
});

alert("1 record inserted");
