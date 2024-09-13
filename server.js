const express = require('express');
const { createProxyMiddleware } = require('http-proxy-middleware');
const app = express();
const { users } = require('./data');
const projectRouter = require('./routes/projects');

app.use(express.json());
app.use(setUser);
app.use('/projects', projectRouter);

// Redirige las solicitudes de archivos PHP a Apache (asumiendo que Apache está en el puerto 80)
app.use('/*.php', createProxyMiddleware({
  target: 'http://localhost:3000/index.php', // Apache o tu servidor PHP
  changeOrigin: true
}));

app.get('/', (req, res) => {
  res.redirect('/index.php');
});

app.get('/dashboard', (req, res) => {
  res.send('Dashboard Page');
});

app.get('/admin', (req, res) => {
  res.send('Admin Page');
});

function setUser(req, res, next) {
  const userId = req.body.userId;
  if (userId) {
    req.user = users.find(user => user.id === userId);
  }
  next();
}

app.listen(3000, () => {
  console.log('Server is running on port 3000');
});
