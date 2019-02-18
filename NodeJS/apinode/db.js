var mysql = require('mysql');
var express = require('express');
var app =express();

var config= require('./dconfig.json')[app.get('env')];
 
var db = mysql.createConnection(config);
 
db.connect(function(err) {
  if (err) {
    console.error('Error al conectar BD: ' + err.stack);
    return;
  }
 
  console.log('Conectado a BD ' + db.threadId);
});
 
module.exports=db;