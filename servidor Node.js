const express = require('express');
const { Client } = require('pg');
const app = express();
const port = 3000;

// Middleware para servir arquivos estáticos (HTML)
app.use(express.static('public'));

// Conexão com o PostgreSQL
const client = new Client({
    host: 'devotedly-discrete-gator.data-1.use1.tembo.io',
    user: 'postgres',
    password: 'uaZ8UZhoFgvcQ2Cd',
    database: 'teste_funcionamento',
    port: 5432,
});

// Conectar ao banco de dados
client.connect()
  .then(() => console.log("Conectado ao banco de dados!"))
  .catch(err => console.error("Erro ao conectar ao banco de dados:", err));

// Endpoint para buscar os dados dos clientes
app.get('/clientes', async (req, res) => {
    try {
        const result = await client.query('SELECT * FROM clientes');
        res.json(result.rows);
    } catch (err) {
        console.error(err);
        res.status(500).json({ error: 'Erro ao buscar dados.' });
    }
});

// Iniciar o servidor
app.listen(port, () => {
    console.log(`Servidor rodando em http://localhost:${port}`);
});
