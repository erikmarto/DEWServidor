module.exports = function (app) {
    app.use('/', 		require('./routes/index'));
    app.use('/users',	require('./routes/users'));
    app.use('/alumnos',	require('./routes/actividad'));
    app.use('/actividad',	require('./routes/actividad'));
    app.use('/actividades',	require('./routes/actividades'));
    app.use('/confirmar',	require('./routes/confirmar'));
    
  };