const http = require('http');
const express = require ('express');
const path = require ('path');
// const { setSocketInstance } = require('./socketio');

const app = express();
const port = process.env.PORT || "5005";

const server = http.Server(app);
// setSocketInstance(server);

app.get("/", (req, res) => {
    res.status(200).send("200.OK");
})

server.listen(port, () => {
    console.log(`Slusamo request na http://localhost:${port}`)
})

 