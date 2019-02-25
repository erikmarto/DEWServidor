var express = require('express');
var router = express.Router();

var db = require('../lib/db');
var md5 = require('md5');

/* GET login */
router.get('/', (req, res, next) => {
  res.render('login');
});

/* POST auth */
router.post('/', (req, res, next) => {
  var username = req.body.usuario;
  var password = req.body.password;

  db.query('select token ' +
    'FROM usuarios ' +
    'WHERE usuario = ? AND password = ?', [username, md5(password)], (err, resultado, fields) => {
      if (err) res.render('error', { message: 'error', error: err });
      if (typeof resultado !== 'undefined') {
        if (resultado.length < 1) {
          res.json({ msg: "Incorrecto" });
        } else {
          res.json(resultado);
        }
      }
    });
});

module.exports = router;
