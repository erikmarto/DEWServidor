var mysql = require('mysql');

var con = mysql.createConnection({
  host: "localhost",
  user: "root",
  password: "",
  database: "eranko",
});

con.connect(function(err) {
  if (err) throw err;
  console.log("Connected!");
  con.query("select * from modelos", (err, res) => {
    if (err) throw err;
    for (r of res) {
      console.log(r.nombre);
    }
  });
});